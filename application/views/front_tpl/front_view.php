<div  class="row" id="my_head">
    <div class="container">
         <!-- Static navbar -->
         <nav id="site_nav" class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Semki</a>
              </div>
              <div class="collapse navbar-collapse" id="navbar">
                    <ul id="nav_scroll" class="nav navbar-nav navbar-right">
                        <?php foreach($nav_value as $key => $value): ?>
                            <li><a href="<?php echo $value['url']?>"><?php echo $value['li_name']?></a></li>
                        <?php endforeach; ?>
                    </ul>
              </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
         </nav>
    </div>
</div>
     
<div class="container">

<!-- сюда приходят сообщения "message" из сессии (одноразовые сообщения формируем с помощью set_flashdata в контроллере Admin.php перед редиректом) -->
<?php
if ($this->session->flashdata('message')){
echo "<div class='".$this->session->flashdata('message_type')."' id='flashdata'>  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$this->session->flashdata('message')."</div>";
} ?>

<?php foreach($my_rows as $key => $value): ?>
        <!-- id="anchor_$key" used in navigation for scrolling to the appropriate anchor -->
        <div id="anchor_<?php echo $key ?>" data-id="<?php echo $key?>" class="row sortable">
            
            <?php foreach($value as $_block): ?>
                    <div class="col-md-<?php echo $_block['col_width']?>">
                        <div  id="m_block_<?php echo $_block['b_id']?>" class="m_block">
                        
                            <?php if (!empty($_block['b_title'])): ?> 
                                <div class="block_title"><?php echo $_block['b_title']?></div>
                            <?php endif; ?>
                            
                            <div>
                                <?php if (!empty($_block['text'])): ?> 
                                <div class="block_text"><?php echo $_block['text']?></div>
                                <?php endif; ?>
                            </div>
                            
                        </div>
                    </div>
             <?php endforeach; ?>
        </div>
<?php endforeach; ?>
    
</div>