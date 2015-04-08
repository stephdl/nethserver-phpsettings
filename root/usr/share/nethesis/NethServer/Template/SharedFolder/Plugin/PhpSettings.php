<?php

/* @var $view \Nethgui\Renderer\Xhtml */
echo $view->panel()
->insert($view->checkbox('AllowUrlfOpen', 'enabled')->setAttribute('uncheckedValue', 'disabled'))

->insert($view->slider('MemoryLimit', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Php memory limit (${0})')))

->insert($view->slider('UpMaxFileSize', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Maximum upload file size (${0})')))

->insert($view->slider('PostMaxSize', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Maximum post size (${0})')))

->insert($view->slider('MaxExecTime', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Maximum execution time (${0})')))

->insert($view->slider('MaxFileUploads', $view::SLIDER_ENUMERATIVE | $view::LABEL_ABOVE)
    ->setAttribute('label', $T('Maximum file uploads (${0})')));



