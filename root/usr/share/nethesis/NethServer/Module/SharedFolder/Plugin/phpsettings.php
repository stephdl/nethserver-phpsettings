<?php
namespace NethServer\Module\SharedFolder\Plugin;

use Nethgui\System\PlatformInterface as Validate;
use Nethgui\Controller\Table\Modify as Table;

/**
 * Httpd SharedFolder plugin
 *
 * @author stephane de labrusse <stephdl@de-labrusse.fr>
 * 
 */
class  phpsettings  extends \Nethgui\Controller\Table\RowPluginAction
{

    protected function initializeAttributes(\Nethgui\Module\ModuleAttributesInterface $base)
    {
        return \Nethgui\Module\SimpleModuleAttributesProvider::extendModuleAttributes($base, 'phpsettings', 20);
    }


    public function initialize()
    {
     
        $schema = array(
            array('Status', Validate::SERVICESTATUS, Table::FIELD, 'HttpStatus'),
            array('AllowUrlfOpen', Validate::SERVICESTATUS, Table::FIELD, 'PhpAllowUrlfOpen'),
            array('MemoryLimit',Validate::NOTEMPTY, Table::FIELD, 'PhpMemoryLimit'),
            array('UpMaxFileSize',Validate::NOTEMPTY, Table::FIELD, 'PhpUpMaxFileSize'),
            array('PostMaxSize',Validate::NOTEMPTY, Table::FIELD, 'PhpPostMaxSize'),
            array('MaxExecTime',Validate::NOTEMPTY, Table::FIELD, 'PhpMaxExecTime'),
            array('MaxFileUploads',Validate::NOTEMPTY, Table::FIELD, 'PhpMaxFileUploads'),
        );

        $this
            ->setDefaultValue('Status', 'enabled')
            ->declareParameter('AllowUrlfOpen')->setDefaultValue('AllowUrlfOpen', 'enabled')
            ->declareParameter('MemoryLimit')->setDefaultValue('MemoryLimit', 'disabled')
            ->declareParameter('UpMaxFileSize')->setDefaultValue('UpMaxFileSize', 'disabled')
            ->declareParameter('PostMaxSize')->setDefaultValue('PostMaxSize', 'disabled')
            ->declareParameter('MaxExecTime')->setDefaultValue('MaxExecTime', 'disabled')
            ->declareParameter('MaxFileUploads')->setDefaultValue('MaxFileUploads', 'disabled')
        ;

        $this->setSchemaAddition($schema);
        parent::initialize();
    }


    public function prepareView(\Nethgui\View\ViewInterface $view)
    {
        parent::prepareView($view);


        $view['MemoryLimitDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                'disabled' => $view->translate('default'),
                '64M' => $view->translate('${0} MB', array(64)),
                '128M' => $view->translate('${0} MB', array(128)),
                '256M' => $view->translate('${0} MB', array(256)),
                '512M' => $view->translate('${0} MB', array(512)),
                '768M' => $view->translate('${0} MB', array(768)),
                '1024M' => $view->translate('${0} MB', array(1024)),
                '1500M' => $view->translate('${0} MB', array(1500)),
                '2000M' => $view->translate('${0} MB', array(2000)),
        ));

        $view['UpMaxFileSizeDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                'disabled' => $view->translate('default'),
                '8M' => $view->translate('${0} MB', array(8)),
                '16M' => $view->translate('${0} MB', array(16)),
                '32M' => $view->translate('${0} MB', array(32)),
                '64M' => $view->translate('${0} MB', array(64)),
                '128M' => $view->translate('${0} MB', array(128)),
                '256M' => $view->translate('${0} MB', array(256)),
                '512M' => $view->translate('${0} MB', array(512)),
                '768M' => $view->translate('${0} MB', array(768)),
                '1024M' => $view->translate('${0} MB', array(1024)),
                '1500M' => $view->translate('${0} MB', array(1500)),
                '2000M' => $view->translate('${0} MB', array(2000)),
        ));

        $view['PostMaxSizeDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                'disabled' => $view->translate('default'),
                '16M' => $view->translate('${0} MB', array(16)),
                '32M' => $view->translate('${0} MB', array(32)),
                '64M' => $view->translate('${0} MB', array(64)),
                '128M' => $view->translate('${0} MB', array(128)),
                '256M' => $view->translate('${0} MB', array(256)),
                '512M' => $view->translate('${0} MB', array(512)),
                '768M' => $view->translate('${0} MB', array(768)),
                '1024M' => $view->translate('${0} MB', array(1024)),
                '1500M' => $view->translate('${0} MB', array(1500)),
                '2000M' => $view->translate('${0} MB', array(2000)),
        ));

       $view['MaxExecTimeDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                'disabled' => $view->translate('default'),
                '60S' => $view->translate('${0} seconds', array(60)),
                '120S' => $view->translate('${0} seconds', array(120)),
                '180S' => $view->translate('${0} seconds', array(180)),
                '240S' => $view->translate('${0} seconds', array(240)),
                '300S' => $view->translate('${0} seconds', array(300)),
                '360S' => $view->translate('${0} seconds', array(360)),
                '420S' => $view->translate('${0} seconds', array(420)),
                '480S' => $view->translate('${0} seconds', array(480)),
                '540S' => $view->translate('${0} seconds', array(540)),
                '600S' => $view->translate('${0} seconds', array(600)),
                '0S' => $view->translate('unlimited'),

        ));

        $view['MaxFileUploadsDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                'disabled' => $view->translate('default'),
                '50F' => $view->translate('${0} files', array(50)),
                '100F' => $view->translate('${0} files', array(100)),
                '200F' => $view->translate('${0} files', array(200)),
                '300F' => $view->translate('${0} files', array(300)),
                '400F' => $view->translate('${0} files', array(400)),
                '500F' => $view->translate('${0} files', array(500)),
                '750F' => $view->translate('${0} files', array(750)),
                '1000F' => $view->translate('${0} files', array(1000)),
                '2000F' => $view->translate('${0} files', array(2000)),
                '3000F' => $view->translate('${0} files', array(3000)),
                '4000F' => $view->translate('${0} files', array(4000)),
                '5000F' => $view->translate('${0} files', array(5000)),
        ));
    }
}
