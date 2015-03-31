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
class  PhpSettings  extends \Nethgui\Controller\Table\RowPluginAction
{

    protected function initializeAttributes(\Nethgui\Module\ModuleAttributesInterface $base)
    {
        return \Nethgui\Module\SimpleModuleAttributesProvider::extendModuleAttributes($base, 'PhpSettings', 20);
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
                '75M' => $view->translate('${0} MB', array(75)),
                '100M' => $view->translate('${0} MB', array(100)),
                '125M' => $view->translate('${0} MB', array(125)),
                '150M' => $view->translate('${0} MB', array(150)),
                '175M' => $view->translate('${0} MB', array(175)),
                '200M' => $view->translate('${0} MB', array(200)),
                '250M' => $view->translate('${0} MB', array(250)),
                '300M' => $view->translate('${0} MB', array(300)),
                '400M' => $view->translate('${0} MB', array(400)),
                '500M' => $view->translate('${0} MB', array(500)),
                '600M' => $view->translate('${0} MB', array(600)),
                '700M' => $view->translate('${0} MB', array(700)),
                '800M' => $view->translate('${0} MB', array(800)),
                '900M' => $view->translate('${0} MB', array(900)),
                '1000M' => $view->translate('${0} MB', array(1000)),
                '1100M' => $view->translate('${0} MB', array(1100)),
                '1200M' => $view->translate('${0} MB', array(1200)),
                '1300M' => $view->translate('${0} MB', array(1300)),
                '1400M' => $view->translate('${0} MB', array(1400)),
                '1500M' => $view->translate('${0} MB', array(1500)),
                '1600M' => $view->translate('${0} MB', array(1600)),
                '1700M' => $view->translate('${0} MB', array(1700)),
                '1800M' => $view->translate('${0} MB', array(1800)),
                '1900M' => $view->translate('${0} MB', array(1900)),
                '2000M' => $view->translate('${0} MB', array(2000)),
        ));

        $view['UpMaxFileSizeDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                'disabled' => $view->translate('default'),
                '8M' => $view->translate('${0} MB', array(8)),
                '16M' => $view->translate('${0} MB', array(16)),
                '32M' => $view->translate('${0} MB', array(32)),
                '64M' => $view->translate('${0} MB', array(64)),
                '75M' => $view->translate('${0} MB', array(75)),
                '100M' => $view->translate('${0} MB', array(100)),
                '125M' => $view->translate('${0} MB', array(125)),
                '150M' => $view->translate('${0} MB', array(150)),
                '175M' => $view->translate('${0} MB', array(175)),
                '200M' => $view->translate('${0} MB', array(200)),
                '250M' => $view->translate('${0} MB', array(250)),
                '300M' => $view->translate('${0} MB', array(300)),
                '400M' => $view->translate('${0} MB', array(400)),
                '500M' => $view->translate('${0} MB', array(500)),
                '600M' => $view->translate('${0} MB', array(600)),
                '700M' => $view->translate('${0} MB', array(700)),
                '800M' => $view->translate('${0} MB', array(800)),
                '900M' => $view->translate('${0} MB', array(900)),
                '1000M' => $view->translate('${0} MB', array(1000)),
                '1100M' => $view->translate('${0} MB', array(1100)),
                '1200M' => $view->translate('${0} MB', array(1200)),
                '1300M' => $view->translate('${0} MB', array(1300)),
                '1400M' => $view->translate('${0} MB', array(1400)),
                '1500M' => $view->translate('${0} MB', array(1500)),
                '1600M' => $view->translate('${0} MB', array(1600)),
                '1700M' => $view->translate('${0} MB', array(1700)),
                '1800M' => $view->translate('${0} MB', array(1800)),
                '1900M' => $view->translate('${0} MB', array(1900)),
                '2000M' => $view->translate('${0} MB', array(2000)),
        ));

        $view['PostMaxSizeDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                'disabled' => $view->translate('default'),
                '16M' => $view->translate('${0} MB', array(16)),
                '32M' => $view->translate('${0} MB', array(32)),
                '64M' => $view->translate('${0} MB', array(64)),
                '75M' => $view->translate('${0} MB', array(75)),
                '100M' => $view->translate('${0} MB', array(100)),
                '125M' => $view->translate('${0} MB', array(125)),
                '150M' => $view->translate('${0} MB', array(150)),
                '175M' => $view->translate('${0} MB', array(175)),
                '200M' => $view->translate('${0} MB', array(200)),
                '250M' => $view->translate('${0} MB', array(250)),
                '300M' => $view->translate('${0} MB', array(300)),
                '400M' => $view->translate('${0} MB', array(400)),
                '500M' => $view->translate('${0} MB', array(500)),
                '600M' => $view->translate('${0} MB', array(600)),
                '700M' => $view->translate('${0} MB', array(700)),
                '800M' => $view->translate('${0} MB', array(800)),
                '900M' => $view->translate('${0} MB', array(900)),
                '1000M' => $view->translate('${0} MB', array(1000)),
                '1100M' => $view->translate('${0} MB', array(1100)),
                '1200M' => $view->translate('${0} MB', array(1200)),
                '1300M' => $view->translate('${0} MB', array(1300)),
                '1400M' => $view->translate('${0} MB', array(1400)),
                '1500M' => $view->translate('${0} MB', array(1500)),
                '1600M' => $view->translate('${0} MB', array(1600)),
                '1700M' => $view->translate('${0} MB', array(1700)),
                '1800M' => $view->translate('${0} MB', array(1800)),
                '1900M' => $view->translate('${0} MB', array(1900)),
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

