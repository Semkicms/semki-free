<div id="nav_top_edit">
    <div class="container">
		<div style="margin:10px 0 0;" class="my_breadcrumb"><a href="/">Главная</a> » Настройки сайта</div>
		<h1>Настройки сайта</h1>
    </div>
</div>
<div class="container">
	<!-- сюда приходят сообщения "message" из сессии (одноразовые сообщения формируем с помощью set_flashdata в контроллере Admin.php перед редиректом) -->
	<?php
	if ($this->session->flashdata('message')){
	echo "<br/><div class='".$this->session->flashdata('message_type')."' id='flashdata'>  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$this->session->flashdata('message')."</div>";
	} ?>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<?php 
						$attributes = array('id' => 'site_conf');
						echo form_open('admin/settings_post', $attributes);
						?>
						
							<div class="form-group">
							<label for="sitename">Имя сайта</label><br/>
							<input class="form-control" type="text" name="sitename" id="sitename" value="<?php echo $sitename ?>"/>
							</div>
							
							<div class="form-group">
							<label for="email">E-mail сайта</label><br/>
							<input class="form-control" type="text" name="email" id="email" value="<?php echo $email ?>"/>
							</div>
							
							<div class="form-group">
							<label for="tel">Телефон сайта</label><br/>
							<input class="form-control" type="text" name="tel" id="tel" value="<?php echo $phone ?>"/>
							</div>
							
							<div class="form-group">
							<label for="adress">Адрес</label><br/>
							<input class="form-control" type="text" name="adress" id="adress" value="<?php echo $adress ?>"/>
							</div>
							
							<div class="form-group">
							<label for="description">Description (SEO)</label><br/>
							<input class="form-control" type="text" name="description" id="description" value="<?php echo $description ?>"/>
							</div>
							
							<div class="form-group">
							<label for="yandex_metrika">Yandex metrika</label><br/>
							<textarea class="form-control" name="yandex_metrika" id="yandex_metrika"><?php echo $yandex_metrika ?></textarea>
							</div>
							
							<div class="form-group">
							<label for="google_analytics">Google analytics</label><br/>
							<textarea class="form-control" name="google_analytics" id="google_analytics"><?php echo $google_analytics ?></textarea>
							</div>
				
						</form>
				  
					</div>
					<div class="panel-footer">
						<button form="site_conf" type="submit" class="btn btn-default">Изменить</button>
					</div>
				</div>
			</div>
		</div>

</div>