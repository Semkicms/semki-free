<div id="nav_top_edit">
    <div class="container">
        <div style="margin:10px 0 0;" class="my_breadcrumb"><a href="/">Главная</a> » Редактирование шаблона</div>
        <h1>Редактирование шаблона</h1>
        <div id="tmpl_edit_nav">
             <!-- Small button group -->
             <div class="btn-group">
                  <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Правка меню <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#" id="nav_add">Добавить пункт</a></li>
                    <li><a href="#" id="nav_del_edit">Редактировать пункт</a></li>
                  </ul>
             </div>

             <button type="button" class="btn btn-default btn-sm" id="row_add"><i class="fa fa-plus" aria-hidden="true"></i> Строку</button>
             <button type="button" class="btn btn-default btn-sm" id="block_add"><i class="fa fa-plus" aria-hidden="true"></i> Блок</button>
             <button class="btn btn-default btn-sm pull-right" id="all_collapse"><i class="fa fa-sort" aria-hidden="true"></i> Развернуть блоки</button>
        </div>
    </div>
</div>

<div class="container">

	<!-- сюда приходят сообщения "message" из сессии (одноразовые сообщения формируем с помощью set_flashdata в контроллере Admin.php перед редиректом) -->
	<?php
	if ($this->session->flashdata('message')){
	echo "<div class='".$this->session->flashdata('message_type')."' id='flashdata'>  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$this->session->flashdata('message')."</div>";
	} ?>
	
    <!-- Static navbar -->
    <nav id="site_nav" class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Semki</a>
          </div>
          <div>
                <!--id="nav_scroll" используется в скрипте плавного скроллинга к якорю -->
                <ul id="nav_scroll" class="nav navbar-nav navbar-right">
                    <?php foreach($nav_value as $key => $value): ?>
                        <li><a href="<?php echo $value['url']?>"><?php echo $value['li_name']?></a></li>
                    <?php endforeach; ?>
                </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
 
    <!-- container for sorting blocks -->
    <div id="simpleList">
        <?php foreach($my_rows as $key => $value): ?>
            <!-- id="anchor_$key" used in navigation for scrolling to the appropriate anchor -->
            <!-- "data-id = $key" used to save the data after sorting-drag and drop rows -->
             <div id="anchor_<?php echo $key ?>" data-id="<?php echo $key ?>" class="panel panel-default sortable">
                 <!-- Default panel contents -->
                 <div class="panel-heading">
                    <table class="table mytable_null">
                        <tr>
                            <td>
                                <?=$value[0]['title']?>
                            </td>
                            <td class="text-right">
                                <a class="font-avesome" href="/index.php/admin/delete_row/<?php echo $key?>" data-toggle="tooltip" title="Удалить ряд вместе с блоками" onClick="return window.confirm('Вы уверены что хотите удалить ряд и все блоки которые с ним связаны?');"><i class="fa fa-times" aria-hidden="true"></i></a> <a class="font-avesome row_edit" href="#" data-r_id="<?php echo $value[0]['r_id']?>" data-r_title="<?php echo $value[0]['title']?>"  data-r_position="<?php echo $value[0]['r_position']?>"><i data-toggle="tooltip" title="Редактировать строку" class="fa fa-pencil" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    </table>
                  </div>
                  <div class="panel-body mupanel-body-null">
    
                      <?php foreach($value as $_block): ?>
                          <?php if (!empty($_block['b_id'])): ?>
                             <div class="col-md-<?=$_block['col_width']?>">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <table class="table mytable_null">
                                            <tr>
                                            <td>
                                                <?=$_block['b_title']?>
                                            </td>
                                            <td class="text-right">
                                                <a class="font-avesome" href="/index.php/admin/delete_block/<?php echo $_block['b_id']?>" data-toggle="tooltip" title="Удалить блок"  onClick="return window.confirm('Вы уверены что хотите удалить блок?');"><i class="fa fa-times" aria-hidden="true"></i></a> <a class="font-avesome block_edit" href="#" data-block_id="<?php echo $_block['b_id']?>" data-block_title="<?php echo $_block['b_title']?>" data-block_text='<?php echo $_block['text']?>' data-block_image="<?=$_block['image']?>" data-block_width="<?php echo $_block['col_width']?>" data-r_id="<?php echo $_block['r_id']?>" data-b_position="<?php echo $_block['b_position']?>" data-attach_form_id="<?php echo $_block['attach_form_id']?>"><i data-toggle="tooltip" title="Редактировать блок" class="fa fa-pencil" aria-hidden="true"></i></a> <a class="font-avesome" href="#" "class="btn btn-default btn-xs" data-toggle="collapse" data-target="#collapse_<?php echo $_block['b_id']?>"><i data-toggle="tooltip" title="Развернуть блок" class="fa fa-caret-square-o-down" aria-hidden="true"></i></a>
                                            </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="panel-body">
                                        <div id="collapse_<?=$_block['b_id']?>" class="collapse">
                                            <?php if (!empty($_block['text'])): ?>
                                                <div class="block_text"><?php echo $_block['text'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div> <!-- end of panel-default -->
                            </div>
                        <?php else: ?>
                                <div style="margin: 0 15px 15px;">Блоков нет</div>
                        <?php endif; ?>
                     <?php endforeach; ?>
                 </div>
            </div> <!-- end of panel-my & panel-body -->
        <?php endforeach; ?>
    </div>
    <!-- end of container for sorting blocks -->

</div>