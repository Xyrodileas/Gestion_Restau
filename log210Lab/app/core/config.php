<?php

set_exception_handler('logger::exception_handler');
set_error_handler('logger::error_handler');

//set timezone
date_default_timezone_set('America/Montreal');

//site address

define('SERV_NAME', 'http://localhost/');
define('DIR','http://localhost/log210Lab/');
define('APP_REP','http://localhost/log210Lab/app/');
define('TEMPLATES_REP','http://localhost/log210Lab/app/templates/');

//database details ONLY NEEDED IF USING A DATABASE
define('DB_TYPE','mysql');
define('DB_HOST','127.0.0.1');
define('DB_NAME','restau');
define('DB_USER','root');
define('DB_PASS','');
define('PREFIX',''); // in case of multiple DB having same name ex: public shared hosting 

//set prefix for sessions
define('SESSION_PREFIX','smvc_');

//optionall create a constant for the name of the site, 
//can be changed locally in controllers using $data['title'] = 'Title for the page';
define('SITETITLE','Gestio Resteau');

//set the default template
Session::set('template','default');
