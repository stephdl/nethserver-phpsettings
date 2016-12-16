
============
Php Settings
============

Manage the Php version of Apache
================================

You can modify here the settings of php. If you want to choose several version of Php you need to install nethserver-php-scl.

Php Settings
============

For each version of Php you can set specific settings to the php.ini


Modify the Shared Folder php settings.

Allow PHP access to remote files
    When the allow_url_fopen directive is enabled, you can write php scripts
    that open remote files as if they are local files.

Maximum of available memory
    This sets the maximum amount of memory in bytes that a script is allowed 
    to allocate, memory_limit also affects file uploading. Generally speaking,
    memory_limit should be larger than post_max_size.

Maximum upload file size
    The maximum size of a file uploaded to your server (upload_max_filesize).

Maximum size of post data allowed
    Sets max size of post data allowed (post_max_size). This setting also affects file upload.
    To upload large files, this value must be larger than upload_max_filesize.
    If memory limit is enabled by your configure script, memory_limit also 
    affects file uploading. Generally speaking, memory_limit should be larger 
    than post_max_size.

Maximum execution time of scripts
    This sets the maximum time in seconds a script is allowed to run before 
    it is terminated by the parser (max_execution_time). This helps prevent poorly written scripts 
    from tying up the server.

Maximum time to parse input data
    This sets the maximum time in seconds a script is allowed to parse input data (max_input_time), like POST and GET. 
    Timing begins at the moment PHP is invoked at the server and ends when execution begins.

Maximum number of uploaded files
    The maximum number of files allowed to be uploaded simultaneously (max_file_uploads).
