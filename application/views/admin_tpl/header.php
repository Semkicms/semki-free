<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
        <!-- скрываем страницу от индексации -->
        <meta name=”robots” content=”noindex, nofollow” />
        
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Semki</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="<?php echo base_url();?>bootstrap/css/admin.css" rel="stylesheet"/>
        <!-- font-google -->
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'/>
        <!-- font-awesome -->
        <link rel="stylesheet" href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css"/>
        
        <link rel="stylesheet" href="<?php echo base_url();?>js/libs/jcrop/css/jquery.Jcrop.css" type="text/css" />
        
        <!-- codemirror -->
        <link rel="stylesheet" href="<?php echo base_url();?>js/libs/codemirror/lib/codemirror.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>js/libs/codemirror/theme/base16-dark.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>js/libs/codemirror/theme/base16-light.css" />
    
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
        <!-- codemirror -->
		<script src="<?php echo base_url();?>js/libs/codemirror/lib/codemirror.js"></script>
        <script src="<?php echo base_url();?>js/libs/codemirror/mode/xml/xml.js"></script>
        
        <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
        </script>
        
    </head>
    <body <?php if ($this->ion_auth->is_admin()) echo "class='padding_top_50'"; ?>>