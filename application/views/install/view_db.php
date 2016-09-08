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
                
                    <?php echo validation_errors(); ?>
                    <form method="post">
                      <div class="form-group">
                        <label for="db_host">Хост:</label>
                        <input type="text" class="form-control" id="db_host" name="db_host" value="localhost"/>
                      </div>
                    
                      <div class="form-group">
                        <label for="inputEmail">Название базы данных:</label>
                        <input type="text" class="form-control" id="db_name" name="db_name"/>
                      </div>
                      
                      <div class="form-group">
                        <label for="inputEmail">Имя пользователя базой данных:</label>
                        <input type="text" class="form-control" id="db_user" name="db_user"/>
                      </div>
                      
                      <div class="form-group">
                        <label for="inputPassword">Пароль от базы данных:</label>
                        <input type="password" class="form-control" id="db_password" name="db_password"/>
                      </div>
                      <button type="submit" class="btn btn-default">Дальше</button>
                    </form>
                                        
                </div>
            </div>
        </div>
    </body>
</html>