<?php
namespace NethServer\Module\PhpAdjustableValues;

use Nethgui\System\PlatformInterface as Validate;

/**
 * Implement gui module for php settings
 */

class PhpDefault extends \Nethgui\Controller\AbstractController
{


    public function initialize()
    {
    $executiontime = $this->createValidator()->memberOf('0','30','60','120','180','240','300','360','420','480','540','600');
    $inputtime = $this->createValidator()->memberOf('60','120','180','240','300','360','420','480','540','600');

    $this->declareParameter('AllowUrlFopen', $this->createValidator()->memberOf('On','Off'), array('configuration', 'php', 'AllowUrlFopen'));
    $this->declareParameter('MaxExecutionTime',  $executiontime , array('configuration', 'php', 'MaxExecutionTime'));
    $this->declareParameter('MemoryLimit', Validate::POSITIVE_INTEGER, array('configuration', 'php', 'MemoryLimit'));
    $this->declareParameter('PostMaxSize', Validate::POSITIVE_INTEGER, array('configuration', 'php', 'PostMaxSize'));
    $this->declareParameter('UploadMaxFilesize', Validate::POSITIVE_INTEGER, array('configuration', 'php', 'UploadMaxFilesize'));
    $this->declareParameter('MaxFileUpload', Validate::POSITIVE_INTEGER , array('configuration', 'php', 'MaxFileUpload'));
    $this->declareParameter('MaxInputTime',  $inputtime , array('configuration', 'php', 'MaxInputTime'));

    parent::initialize();
    }

   public function validate(\Nethgui\Controller\ValidationReportInterface $report)
    {
        if ( ! $this->getRequest()->isMutation()) {
            return;
        }

        elseif  ($this->parameters['MemoryLimit'] <= $this->parameters['PostMaxSize']) {
            $report->addValidationErrorMessage($this, 'PhpMemoryLimit', 'MemoryLimitLabelMustBeSuperiorThanPostMaxSize');
        }
        elseif  ($this->parameters['PostMaxSize'] <= $this->parameters['UploadMaxFilesize']) {
            $report->addValidationErrorMessage($this, 'PhpPostMaxSize', 'PostMaxSizeMustBeSuperiorThanUpMaxFileSize');
        }

        parent::validate($report);
    }


    public function prepareView(\Nethgui\View\ViewInterface $view)
    {
        parent::prepareView($view);
        $view['MaxExecutionTimeDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
		'30' => $view->translate('${0} seconds', array(30)),
                '60' => $view->translate('${0} seconds', array(60)),
                '120' => $view->translate('${0} seconds', array(120)),
                '180' => $view->translate('${0} seconds', array(180)),
                '240' => $view->translate('${0} seconds', array(240)),
                '300' => $view->translate('${0} seconds', array(300)),
                '360' => $view->translate('${0} seconds', array(360)),
                '420' => $view->translate('${0} seconds', array(420)),
                '480' => $view->translate('${0} seconds', array(480)),
                '540' => $view->translate('${0} seconds', array(540)),
                '600' => $view->translate('${0} seconds', array(600)),
                '0' => $view->translate('unlimited'),
        ));

        $view['MemoryLimitDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                '128' => $view->translate('${0} MB', array(128)),
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
                '8' => $view->translate('${0} MB', array(8)),
                '10' => $view->translate('${0} MB', array(10)),
                '20' => $view->translate('${0} MB', array(20)),
                '30' => $view->translate('${0} MB', array(30)),
                '40' => $view->translate('${0} MB', array(40)),
                '50' => $view->translate('${0} MB', array(50)),
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

        $view['UploadMaxFilesizeDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                '2' => $view->translate('${0} MB', array(2)),
                '5' => $view->translate('${0} MB', array(5)),
                '10' => $view->translate('${0} MB', array(10)),
                '20' => $view->translate('${0} MB', array(20)),
                '30' => $view->translate('${0} MB', array(30)),
                '40' => $view->translate('${0} MB', array(40)),
                '50' => $view->translate('${0} MB', array(50)),
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

       $view['MaxInputTimeDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                '60' => $view->translate('${0} seconds', array(60)),
                '120' => $view->translate('${0} seconds', array(120)),
                '180' => $view->translate('${0} seconds', array(180)),
                '240' => $view->translate('${0} seconds', array(240)),
                '300' => $view->translate('${0} seconds', array(300)),
                '360' => $view->translate('${0} seconds', array(360)),
                '420' => $view->translate('${0} seconds', array(420)),
                '480' => $view->translate('${0} seconds', array(480)),
                '540' => $view->translate('${0} seconds', array(540)),
                '600' => $view->translate('${0} seconds', array(600)),
        ));


        $view['MaxFileUploadDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                '5' => $view->translate('${0} files', array(5)),
                '10' => $view->translate('${0} files', array(10)),
                '20' => $view->translate('${0} files', array(20)),
                '30' => $view->translate('${0} files', array(30)),
                '40' => $view->translate('${0} files', array(40)),
                '50' => $view->translate('${0} files', array(50)),
                '100' => $view->translate('${0} files', array(100)),
                '200' => $view->translate('${0} files', array(200)),
                '300' => $view->translate('${0} files', array(300)),
                '400' => $view->translate('${0} files', array(400)),
                '500' => $view->translate('${0} files', array(500)),
                '750' => $view->translate('${0} files', array(750)),
                '1000' => $view->translate('${0} files', array(1000)),
                '2000' => $view->translate('${0} files', array(2000)),
                '3000' => $view->translate('${0} files', array(3000)),
                '4000' => $view->translate('${0} files', array(4000)),
                '5000' => $view->translate('${0} files', array(5000)),
        ));

    }

    public function onParametersSaved($changes)
    {
        $this->getPlatform()->signalEvent('nethserver-php-update@post-process');
    }

}

