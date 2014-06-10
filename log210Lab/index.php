<?php
require('app/core/autoloader.php');

//define routes

// first page to display <index>:
Router::get('/', 'welcome@index');
Router::get('/(:any)', 'welcome@index');

// lang management and routing
Router::get('/lang', 'LangRouter@index');
Router::get('/lang/(:any)', 'LangRouter@index');
Router::get('/lang/(:any)/(:all)', 'LangRouter@index');

// router for Back office
//-- Bigen admin 
Router::get('/admin', 'bo/admin/admin@index');
Router::get ('/admin/login', 'bo/admin/admin@login');
Router::post('/admin/login', 'bo/admin/admin@login');

Router::get('/admin/logout', 'bo/admin/admin@logout');

Router::get('/admin/test/(:any)', 'bo/admin/admin@test');
//-- End Admin
// End routers for Back office


// router for front office:
Router::get('/user', 'fo/user/user@index');
Router::get('/user/login', 'bo/user/user@login');
Router::get('/user/logout', 'bo/user/user@logout');



//if no route found
Router::error('error@index');

//execute matched routes
Router::dispatch();
ob_flush();
