<div class="container">
   <h1>Редактировать пункт меню</h1>
	<div class="panel panel-default">
		<div class="panel-body">

			<?php
			$attributes = array('id' => 'frm_nav');
			echo form_open('admin/edit_nav_li/' . $id, $attributes);
			?>
				<div id="nav_field" class="row">
					<div class="col-md-4">
						<label>Имя</label>
						<input type="text" name="li_name" class="form-control input-sm li_name" value="<?php echo $li_name ?>"/>
					</div>
					<div class="col-md-1">
						<label>Вес</label></br>
						 <?php

							$options = array(
											  '0' => '0',
											  '1' => '1',
											  '2' => '2',
											  '3' => '3',
											  '4' => '4',
											  '5' => '5',
											  '6' => '6',
											  '7' => '7',
											  '8' => '8',
											  '9' => '9',
											  '10' => '10',
											  '11' => '11',
											  '12' => '12',
											  '13' => '13',
											  '14' => '14',
											  '15' => '15',
											  '16' => '16',
											);
							echo form_dropdown('veight', $options, $veight);
						 ?>
					</div>

					<div class="col-md-2">
						<label>Видимость</label></br>
						<div><?php echo form_checkbox('visible', '1', $visible); ?></div>

					</div>
				</div>
			</form>

	    </div>
	    <div class="panel-footer"><input form="frm_nav" class="btn btn-default btn-sm" type="submit" value="Отредактировать пункт" /></div>
	</div>
</div>