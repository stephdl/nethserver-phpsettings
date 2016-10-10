.. --initial-header-level=3 

Php settings 
^^^^^^^^^^^^

Modify the Shared Folder php settings.

Allow PHP access to remote files
    When the allow_url_fopen directive is enabled, you can write php scripts
    that open remote files as if they are local files.

Maximum of available memory
    This sets the maximum amount of memory in bytes that a script is allowed 
    to allocate, memory_limit also affects file uploading. Generally speaking,
    memory_limit should be larger than post_max_size.

Maximum upload file size
    The maximum size of a file uploaded to your server.

Maximum size of post data allowed
    Sets max size of post data allowed. This setting also affects file upload.
    To upload large files, this value must be larger than upload_max_filesize.
    If memory limit is enabled by your configure script, memory_limit also 
    affects file uploading. Generally speaking, memory_limit should be larger 
    than post_max_size.

Maximum execution time of scripts
    This sets the maximum time in seconds a script is allowed to run before 
    it is terminated by the parser. This helps prevent poorly written scripts 
    from tying up the server.

Maximum number of uploaded files
    The maximum number of files allowed to be uploaded simultaneously.

