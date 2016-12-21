<?php

/* @var $view \Nethgui\Renderer\Xhtml */
echo "<div id='bc_module_warning' class='ui-state-highlight'><span class='ui-icon ui-icon-info'></span>".$T('default_php_warning_label')."</div>";

echo $view->fieldsetSwitch('Status', 'enabled', $view::FIELDSETSWITCH_CHECKBOX)->setAttribute('uncheckedValue', 'disabled')
->insert($view->checkbox('AllowUrlfOpen', 'enabled')->setAttribute('uncheckedValue', 'disabled'))

->insert($view->slider('MemoryLimit', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Php memory limit (${0})')))

->insert($view->slider('PostMaxSize', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Maximum post size (${0})')))

->insert($view->slider('UpMaxFileSize', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Maximum upload file size (${0})')))

->insert($view->slider('MaxExecTime', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Maximum execution time (${0})')))

->insert($view->slider('MaxFileUploads', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Maximum file uploads (${0})')));

$view->includeCSS("
  #bc_module_warning {
     margin-bottom: 8px;
     padding: 8px;
  }

  #bc_module_warning .ui-icon {
     float: left;
     margin-right: 3px;
  }
");
