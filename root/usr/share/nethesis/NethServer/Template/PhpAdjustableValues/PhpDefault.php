<?php
echo $view->header()->setAttribute('template', $T('PhpDefaultAdjustableValues_Title'));

echo $view->panel()

->insert($view->checkbox('AllowUrlFopen', '1')->setAttribute('uncheckedValue', 'Off'))

->insert($view->slider('MemoryLimit', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
   ->setAttribute('label', $T('Php memory limit (${0})')))

->insert($view->slider('PostMaxSize', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Maximum post size (${0})')))

->insert($view->slider('UploadMaxFilesize', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Maximum upload file size (${0})')))

->insert($view->slider('MaxExecutionTime', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Maximum execution time (${0})')))

->insert($view->slider('MaxInputTime', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Maximum input time (${0})')))

->insert($view->slider('MaxFileUpload', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Maximum number of files (${0})')))

;
echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_HELP);
?>
