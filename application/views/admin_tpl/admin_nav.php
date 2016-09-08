<!-- Admin Navigation -->
<nav class="navbar navbar-admin navbar-fixed-top" role="navigation">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Сайт <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="/admin/settings">Настройки сайта</a></li>
				  </ul>
				</li>
                <li>
                    <a href="/admin">Шаблон</a>
                </li>
            </ul>   
            <ul class="nav navbar-nav navbar-right">
                        
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php $user_email = $this->session->userdata('email'); echo $user_email; ?> <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <li><a href="/auth/logout">Выйти</a></li>
                          </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Помощь</a></li>
            </ul>
        </div>
        
    </div>

</nav>