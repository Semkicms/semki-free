<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//данные о дефолтном контроллере берём из конфигурационного файла
//это связано с тем что после инсталляции CMS дефолтный контроллер 
//в конфигурационном файле перезаписывается с 'install' на 'front'
$dc = $this->config->item('dflt_contr');
$route['default_controller'] = $dc;

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
