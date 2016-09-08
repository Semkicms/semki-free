<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>cms Semki</title>

        <!-- Bootstrap -->
        <link href="/bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <!-- font-awesome -->
        <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css"/>
        <style>
            .container {
                margin-top: 8%;
            }
            label 
            {
                display: block;
            }
            label[for="remember"]
            {
                display: inline-block;
                float: left;
                margin-right: 4px;
            }
        </style>

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                
                    <form action="<?php echo $config_base_url; ?>/install/new_conf_conf" method="post">
                      <div class="form-group">
                        <label for="db_domen">Домен:</label>
                        <input type="text" class="form-control" id="db_domen" name="db_domen" value="<?php echo $config_base_url; ?>"/>
                      </div>
                      
                      <div class="form-group">
                        <label for="db_domen">Имя сайта:</label>
                        <input type="text" class="form-control" id="landing_name" name="landing_name"/>
                      </div>
                    
                      <div class="form-group">
                        <label for="language">Язык:</label>
                        <select size="3" name="language" id="language">
                        <option value="ukrainean">Украинский</option>
                        <option value="russian">Русский</option>
                        <option value="english">Английский</option>
                       </select>
                      </div>

                      <button type="submit" class="btn btn-default">Дальше</button>
                    </form>
                                        
                </div>
            </div>
        </div>
    </body>
</html>