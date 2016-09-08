<!-- Modal добавить строку -->
<div class="modal fade" id="add_edit_row">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cтрока</h4>
      </div>
      
      <div class="modal-body">
          <!-- Добавить/редактировать строку, action подставится скриптом в зависимости от того редактируем либо создаём новую строку -->
          <form action="" id="my_row" method="post" accept-charset="utf-8">
              <div class="row">
                  <div class="col-md-4">
                      <label for="rows_title">Заголовок</label><br/>
                      <input name="rows_title" id="rows_title" maxlength="244" class="form-control input-sm" type="text"/>
                  </div>
                    
                  <div class="col-md-4">
                      <label for="rows_position">Позиция</label><br/>
                      <input name="rows_position" id="rows_position" maxlength="3" class="form-control input-sm" type="text"/>
                  </div>
                  
                  <!-- скрытое поле используется при редактировании -->                    
                  <input name="r_id" value="" id="r_id" maxlength="10" type="hidden"/>
                  
                  <div id="b_generation" class="col-md-4">
                      <label>Генерация блоков</label><br/>
                      <select name="data_bcount" class="form-control input-sm">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="6">6</option>
                        <option value="12">12</option>
                      </select>
                  </div>
              </div>
          </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button form="my_row" type="submit" class="btn btn-primary">Отправить!</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal добавить или редактировать блок -->
<div class="modal fade" id="add_edit_block">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Блок</h4>
      </div>
      
      <div class="modal-body">             

        <form action="" class="add_block" id="my_block" method="post" accept-charset="utf-8">
        <div class="row top-buffer-20">
            <div class="col-md-6">
                <label for="b_title">Заголовок </label><br/>
                <input name="b_title" value="" id="b_title" maxlength="244" class="form-control input-sm" type="text"/>
            </div>
            <div class="col-md-2">
                <label for="b_width">Ширина блока </label><br/>
                <select name="b_width" class="form-control input-sm" id="b_width">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            
            <div class="col-md-2">
            <label for="id_row">Номер строки </label><br/>
            <select name="id_row" class="form-control input-sm" id="id_row">
            <?php
                foreach($option_row as $key => $value) {
                $v = $key + 1; echo '<option value="' . $value . '">' . $v . '</option>'; 
                }
            ?>
            </select>
            </div>
            
            <div class="col-md-2">
            <label for="b_position">Вес блока</label><br/>
            <select name="b_position" class="form-control input-sm" id="b_position">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            </select>
            </div>
        </div>
       
        <!-- textarea -->
        <div class="row top-buffer-20">
			<div class="col-md-12">
                <label for="txt_block">Содержание</label><br/>
                <span class="right-buffer-6" ><input type="radio" name="editor_type" id="e_text" value="1" checked="checked"/> <label for="e_text"> Текст</label></span>
                <span><input type="radio" name="editor_type" id="e_html" value="2"/> <label for="e_html"> Код</label></span>
                <div id="editor" class="row">
                    <div class="col-md-12">
                        <textarea name="text" id="txt_block" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <input name="b_id" value="" class="form-control input-sm" id="b_id" maxlength="10" type="hidden"/>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button form="my_block" type="submit" class="btn btn-primary">Отправить!</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal добавить пункты меню -->
<div class="modal fade" id="add_nav_items">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Добавить пункты навигации</h4>
      </div>
      <div class="modal-body">

         <?php
                $attributes = array('id' => 'frm_nav');
                echo form_open('admin/add_nav_li', $attributes);
         ?>
            <div id="nav_field" class="row">
                <div class="col-md-3">
                    <?php
                            echo '<label>Якорь</label><select name="items[0][url]" class="form-control input-sm url">';
                            foreach($option_row as $key => $value) {
                            //#anchor_$value: ормируем ссылку-якорь, для скролла к строке с name="anchor_$value"
                            $v = $key + 1; echo '<option value="#anchor_' . $value . '">' . $v . '</option>';
                            }
                            echo '</select>';
                    ?>
                </div>
                <div class="col-md-3">
                    <label>Имя</label>
                    <input type="text" name="items[0][li_name]" class="form-control input-sm li_name"/>
                </div>
                <div class="col-md-3">
                    <label>Вес</label>
                    <select name="items[0][veight]" class="form-control input-sm">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    </select>
                </div>
                
                <div class="col-md-3">
        			<label>Видимость</label><br/>
                    <select name="items[0][visible]" class="form-control input-sm" id="li_visible">
                        <option value="1">Видимый</option>
                        <option value="0">Скрыый</option>
                    </select>
        		</div>
                
                <div class="clear_6"></div>
            </div>
            
            <div id="clon_place"></div>
            </form><button class="btn btn-default btn-sm" id="addd">Ещё</button>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Закрыть</button>
        <button form="frm_nav" type="submit" class="btn btn-primary btn-sm">Отправить!</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal редактировать-удалить пункты меню -->
<div class="modal fade" id="edit_nav_items">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Редактировать пункты навигации</h4>
      </div>
      <div class="modal-body">
         <table class="table table-bordered">
             <?php foreach($nav_value as $item): ?>
                <tr><td><div class="row"><div class="col-md-10"><a href="<?php echo $item['url']?>"><?php echo $item['li_name']?></a></div><div class="col-md-2 text-right"><a href="/admin/delete_nav_li/<?php echo $item['id']?>"><i class="fa fa-times" aria-hidden="true"></i></а> <a href="#" id="nav_one_edit" data-nav_one_url="<?php echo $item['url']?>" data-nav_one_id="<?php echo $item['id']?>" data-nav_one_name="<?php echo $item['li_name']?>" data-nav_one_veight="<?php echo $item['veight']?>" data-nav_one_visible="<?php echo $item['visible']?>" style="margin-left: 5px;"><i class="fa fa-pencil" aria-hidden="true"></i></a></div></div></td></tr>
             <?php endforeach ?>
         </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal редактировать пункт меню -->
<div class="modal fade" id="edit_nav_one_item">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Редактировать пункт навигации</h4>
      </div>
      <div class="modal-body">
			<?php
			$attributes = array('id' => 'frm_one_nav');
			echo form_open('admin/edit_nav_li/', $attributes);
			?>
        	<div id="nav_field" class="row">           
        		<div class="col-md-3 form-group">
        			<label>Имя</label>
        			<input type="text" id="li_name" name="li_name" class="form-control input-sm" value=""/>
        		</div>
        		<div class="col-md-2 form-group">
        			<label>Вес</label><br/>
                    <select name="veight" class="form-control input-sm" id="li_veight">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                    </select>
        		</div>
        		<div class="col-md-3">
        			<label>Видимость</label><br/>
                    <select name="visible" class="form-control input-sm" id="li_visible">
                        <option value="1">Видимый</option>
                        <option value="0">Скрыый</option>
                    </select>
        		</div>
                <div class="col-md-2 form-group" style="opacity: 0.3;">
        			<label>Id</label>
        			<input type="text" id="li_id" name="li_id" class="form-control input-sm" value=""/>
        		</div>
                <div class="col-md-2 form-group" style="opacity: 0.3;">
        			<label>Якорь</label>
        			<input type="text" id="li_url" name="li_url" class="form-control input-sm" value=""/>
        		</div> 
        	</div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Закрыть</button>
        <input form="frm_one_nav" class="btn btn-primary btn-sm" type="submit" value="Отредактировать пункт" />
     </div>
  </div>
</div>
</div>
<!-- footer -->
<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p>Время генерации страницы <strong>{elapsed_time}</strong> секунд.</p>
			</div>
		 </div>
	</div>
</div>

<script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/main.js"></script>
<script src="<?php echo base_url();?>js/scroll.js"></script>
<script src="<?php echo base_url();?>js/libs/jcrop/jquery.Jcrop.min.js"></script>
<script src="<?php echo base_url();?>js/libs/jcrop/jquery.color.js"></script>

<!-- Latest Sortable -->
<script src="/js/libs/sortable/Sortable.min.js"></script>

</body>
</html>