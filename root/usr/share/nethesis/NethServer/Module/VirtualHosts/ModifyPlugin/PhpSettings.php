<?php
namespace NethServer\Module\VirtualHosts\ModifyPlugin;

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
        return \Nethgui\Module\SimpleModuleAttributesProvider::extendModuleAttributes($base, 'phpsettings', 20);
    }


    public function initialize()
    {
     
        $schema = array(
            array('Status', Validate::SERVICESTATUS, Table::FIELD, 'status'),
            array('AllowUrlfOpen', Validate::SERVICESTATUS, Table::FIELD, 'PhpAllowUrlfOpen'),
            array('MemoryLimit',Validate::ANYTHING, Table::FIELD, 'PhpMemoryLimit'),
            array('UpMaxFileSize',Validate::ANYTHING, Table::FIELD, 'PhpUpMaxFileSize'),
            array('PostMaxSize',Validate::ANYTHING, Table::FIELD, 'PhpPostMaxSize'),
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


    
   public function validate(\Nethgui\Controller\ValidationReportInterface $report)
    {
        if ( ! $this->getRequest()->isMutation()) {
            return;
        }

        elseif  ($this->parameters['MemoryLimit'] < $this->parameters['PostMaxSize']) {
            $report->addValidationErrorMessage($this, 'MemoryLimit', 'MemoryLimitLabelMustBeSuperiorThanUpPostMaxSize');
        }
        elseif  ($this->parameters['PostMaxSize'] < $this->parameters['UpMaxFileSize']) {
            $report->addValidationErrorMessage($this, 'PostMaxSize', 'PostMaxSizeMustBeSuperiorThanUpMaxFileSize');
        }

        parent::validate($report);
    }
    
    public function prepareView(\Nethgui\View\ViewInterface $view)
    {
        parent::prepareView($view);


        $view['MemoryLimitDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                '0' => $view->translate('default', array(0)),
                '64' => $view->translate('${0} MB', array(64)),
                '75' => $view->translate('${0} MB', array(75)),
                '100' => $view->translate('${0} MB', array(100)),
                '125' => $view->translate('${0} MB', array(125)),
                '150' => $view->translate('${0} MB', array(150)),
                '175' => $view->translate('${0} MB', array(175)),
                '200' => $view->translate('${0} MB', array(200)),
                '250' => $view->translate('${0} MB', array(250)),
                '300' => $view->translate('${0} MB', array(300)),
                '400' => $view->translate('${0} MB', array(400)),
                '500' => $view->translate('${0} MB', array(500)),
                '600' => $view->translate('${0} MB', array(600)),
                '700' => $view->translate('${0} MB', array(700)),
                '800' => $view->translate('${0} MB', array(800)),
                '900' => $view->translate('${0} MB', array(900)),
                '1000' => $view->translate('${0} MB', array(1000)),
                '1100' => $view->translate('${0} MB', array(1100)),
                '1200' => $view->translate('${0} MB', array(1200)),
                '1300' => $view->translate('${0} MB', array(1300)),
                '1400' => $view->translate('${0} MB', array(1400)),
                '1500' => $view->translate('${0} MB', array(1500)),
                '1600' => $view->translate('${0} MB', array(1600)),
                '1700' => $view->translate('${0} MB', array(1700)),
                '1800' => $view->translate('${0} MB', array(1800)),
                '1900' => $view->translate('${0} MB', array(1900)),
                '2000' => $view->translate('${0} MB', array(2000)),
                '3000' => $view->translate('${0} G', array(3)),
                '4000' => $view->translate('${0} G', array(4)),
                '5000' => $view->translate('${0} G', array(5)),
                '6000' => $view->translate('${0} G', array(6)),
                '7000' => $view->translate('${0} G', array(7)),
                '8000' => $view->translate('${0} G', array(8)),
                '9000' => $view->translate('${0} G', array(9)),
                '10000' => $view->translate('${0} G', array(10)),
                '11000' => $view->translate('${0} G', array(11)),
                '12000' => $view->translate('${0} G', array(12)),
                '13000' => $view->translate('${0} G', array(13)),
                '14000' => $view->translate('${0} G', array(14)),
                '15000' => $view->translate('${0} G', array(15)),
                '16000' => $view->translate('${0} G', array(16)),
                '17000' => $view->translate('${0} G', array(17)),
                '18000' => $view->translate('${0} G', array(18)),
                '19000' => $view->translate('${0} G', array(19)),
                '20000' => $view->translate('${0} G', array(20)),
        ));

        $view['UpMaxFileSizeDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(

                '0' => $view->translate('default', array(0)),
                '8' => $view->translate('${0} MB', array(8)),
                '16' => $view->translate('${0} MB', array(16)),
                '32' => $view->translate('${0} MB', array(32)),
                '64' => $view->translate('${0} MB', array(64)),
                '75' => $view->translate('${0} MB', array(75)),
                '100' => $view->translate('${0} MB', array(100)),
                '125' => $view->translate('${0} MB', array(125)),
                '150' => $view->translate('${0} MB', array(150)),
                '175' => $view->translate('${0} MB', array(175)),
                '200' => $view->translate('${0} MB', array(200)),
                '250' => $view->translate('${0} MB', array(250)),
                '300' => $view->translate('${0} MB', array(300)),
                '400' => $view->translate('${0} MB', array(400)),
                '500' => $view->translate('${0} MB', array(500)),
                '600' => $view->translate('${0} MB', array(600)),
                '700' => $view->translate('${0} MB', array(700)),
                '800' => $view->translate('${0} MB', array(800)),
                '900' => $view->translate('${0} MB', array(900)),
                '1000' => $view->translate('${0} MB', array(1000)),
                '1100' => $view->translate('${0} MB', array(1100)),
                '1200' => $view->translate('${0} MB', array(1200)),
                '1300' => $view->translate('${0} MB', array(1300)),
                '1400' => $view->translate('${0} MB', array(1400)),
                '1500' => $view->translate('${0} MB', array(1500)),
                '1600' => $view->translate('${0} MB', array(1600)),
                '1700' => $view->translate('${0} MB', array(1700)),
                '1800' => $view->translate('${0} MB', array(1800)),
                '1900' => $view->translate('${0} MB', array(1900)),
                '2000' => $view->translate('${0} MB', array(2000)),
                '3000' => $view->translate('${0} G', array(3)),
                '4000' => $view->translate('${0} G', array(4)),
                '5000' => $view->translate('${0} G', array(5)),
                '6000' => $view->translate('${0} G', array(6)),
                '7000' => $view->translate('${0} G', array(7)),
                '8000' => $view->translate('${0} G', array(8)),
                '9000' => $view->translate('${0} G', array(9)),
                '10000' => $view->translate('${0} G', array(10)),
                '11000' => $view->translate('${0} G', array(11)),
                '12000' => $view->translate('${0} G', array(12)),
                '13000' => $view->translate('${0} G', array(13)),
                '14000' => $view->translate('${0} G', array(14)),
                '15000' => $view->translate('${0} G', array(15)),
                '16000' => $view->translate('${0} G', array(16)),
                '17000' => $view->translate('${0} G', array(17)),
                '18000' => $view->translate('${0} G', array(18)),
                '19000' => $view->translate('${0} G', array(19)),
                '20000' => $view->translate('${0} G', array(20)),
        ));

        $view['PostMaxSizeDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                '0' => $view->translate('default', array(0)),
                '16' => $view->translate('${0} MB', array(16)),
                '32' => $view->translate('${0} MB', array(32)),
                '64' => $view->translate('${0} MB', array(64)),
                '75' => $view->translate('${0} MB', array(75)),
                '100' => $view->translate('${0} MB', array(100)),
                '125' => $view->translate('${0} MB', array(125)),
                '150' => $view->translate('${0} MB', array(150)),
                '175' => $view->translate('${0} MB', array(175)),
                '200' => $view->translate('${0} MB', array(200)),
                '250' => $view->translate('${0} MB', array(250)),
                '300' => $view->translate('${0} MB', array(300)),
                '400' => $view->translate('${0} MB', array(400)),
                '500' => $view->translate('${0} MB', array(500)),
                '600' => $view->translate('${0} MB', array(600)),
                '700' => $view->translate('${0} MB', array(700)),
                '800' => $view->translate('${0} MB', array(800)),
                '900' => $view->translate('${0} MB', array(900)),
                '1000' => $view->translate('${0} MB', array(1000)),
                '1100' => $view->translate('${0} MB', array(1100)),
                '1200' => $view->translate('${0} MB', array(1200)),
                '1300' => $view->translate('${0} MB', array(1300)),
                '1400' => $view->translate('${0} MB', array(1400)),
                '1500' => $view->translate('${0} MB', array(1500)),
                '1600' => $view->translate('${0} MB', array(1600)),
                '1700' => $view->translate('${0} MB', array(1700)),
                '1800' => $view->translate('${0} MB', array(1800)),
                '1900' => $view->translate('${0} MB', array(1900)),
                '2000' => $view->translate('${0} MB', array(2000)),
                '3000' => $view->translate('${0} G', array(3)),
                '4000' => $view->translate('${0} G', array(4)),
                '5000' => $view->translate('${0} G', array(5)),
                '6000' => $view->translate('${0} G', array(6)),
                '7000' => $view->translate('${0} G', array(7)),
                '8000' => $view->translate('${0} G', array(8)),
                '9000' => $view->translate('${0} G', array(9)),
                '10000' => $view->translate('${0} G', array(10)),
                '11000' => $view->translate('${0} G', array(11)),
                '12000' => $view->translate('${0} G', array(12)),
                '13000' => $view->translate('${0} G', array(13)),
                '14000' => $view->translate('${0} G', array(14)),
                '15000' => $view->translate('${0} G', array(15)),
                '16000' => $view->translate('${0} G', array(16)),
                '17000' => $view->translate('${0} G', array(17)),
                '18000' => $view->translate('${0} G', array(18)),
                '19000' => $view->translate('${0} G', array(19)),
                '20000' => $view->translate('${0} G', array(20)),
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

