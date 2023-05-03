<?php

$router->get('', 'PagesController@home');
$router->post('', 'PagesController@home');
$router->get('list', 'PagesController@list');

$router->post('registration', 'RegistrationController@registration');
$router->post('shareOnSocialMedia', 'RegistrationController@shareOnSocialMedia');
$router->post('congratulations', 'RegistrationController@congratulations');
