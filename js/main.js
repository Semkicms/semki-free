$(document).ready(function() {
                
              //МОДАЛЬНОЕ ОКНО ДОБАВЛЕНИЯ БЛОКА
              $('body').on('click','#block_add',function(){
                
                //открыть модальное окно id="add_edit_block" с формой добавл/редакт блока
                $("#add_edit_block").modal('show');
                
                //инициализируем codemirror
                var textArea = document.getElementById('txt_block');
                var editor = CodeMirror.fromTextArea(textArea, {
                  lineNumbers: true,
                  theme: "base16-light",
                  mode: "text/html"
                });
                                
                //при закрытии модального окна
                $('#add_edit_block').on('hidden.bs.modal', function () {
                    //уничтожаем codemirror
                    editor.toTextArea();
                    //очистим textarea (что необязательно, всё равно перезапишется editor.setValue(block_text))
                    $('textarea#txt_block').val('');
                });
                
                //обработка селектов(текст или html)
                $('input[name=editor_type]').change(function() {
                    var e_type = $('input[name=editor_type]:checked').val();
                    //если выбираем редактирование кода_html, подключим к CodeMirror тему blackboard
                    if (e_type == '2') {
                        editor.setOption("theme", "base16-dark");
                        editor.setOption("mode", "text/html");
                     };
                     //если выбираем редактирование кода_markdown, подключим к CodeMirror тему default
                     if (e_type == '1') {         
                        editor.setOption("theme", "base16-light");
                        editor.setOption("mode", "text/html");
                     };
                    
                });

                //заносим данные атрибута action
                $("form#my_block").attr("action","/index.php/admin/add_block");
                
              });
              
              //МОДАЛЬНОЕ ОКНО ДОБАВЛЕНИЯ СТРОКИ
              $('body').on('click','#row_add',function(){
                $("#add_edit_row").modal('show');

                //заносим данные атрибута action
                $("form#my_row").attr("action","/index.php/admin/add_row");
                //покажем если #b_generation скрыт
                $("#b_generation").css({"display":"block"});
                
              });
                
              //МОДАЛЬНОЕ ОКНО РЕДАКТИРОВАНИЯ БЛОКА
              $('body').on('click','.block_edit',function(){
                
                //открыть модальное окно id="editblock" с формой редакт блока
                $("#add_edit_block").modal('show');
                //кнопка вызова модального окна имеет атрибут data с данными - эти данные заносим в переменные
                var block_id = $(this).data('block_id');
                var block_title = $(this).data('block_title');
                var block_text = $(this).data('block_text');
                var block_width = $(this).data('block_width');
                var r_id = $(this).data('r_id');
                var b_position = $(this).data('b_position');

                //заносим данные в поля формы - для редактирования блока
                $("form#my_block").attr("action","/index.php/admin/edit_block");
                $("input#b_title").val(block_title);
                $("input#b_id").val(block_id);
                $("textarea#txt_block").text(block_text);
                $("select#b_width").val(block_width);
                $("select#id_row").val(r_id);
                $("select#b_position").val(b_position);
                
                //инициализируем codemirror
                var textArea = document.getElementById('txt_block');
                var editor = CodeMirror.fromTextArea(textArea, {
                  lineNumbers: true,
                  theme: "base16-light",
                  mode: "text/html"
                });
                
                //при закрытии модального окна
                $('#add_edit_block').on('hidden.bs.modal', function () {
                    //уничтожаем codemirror
                    editor.toTextArea();
                    //очистим textarea (что необязательно, всё равно перезапишется editor.setValue(block_text))
                    $('textarea#txt_block').val('');
                });
                
                //заносим данные в textarea CodeMirror
                editor.setValue(block_text);
                //editor.refresh
                $('#add_edit_block').on('shown.bs.modal', function() { editor.refresh() });
                
                //обработка селектов(текст или html)
                $('input[name=editor_type]').change(function() {
                    var e_type = $('input[name=editor_type]:checked').val();
                    //если выбираем редактирование кода_html, подключим к CodeMirror тему blackboard
                    if (e_type == '2') {
                        editor.setOption("theme", "base16-dark");
                        editor.setOption("mode", "text/html");
                     };
                     //если выбираем редактирование кода_markdown, подключим к CodeMirror тему default
                     if (e_type == '1') {         
                        editor.setOption("theme", "base16-light");
                        editor.setOption("mode", "text/html");
                     };
                    
                });
                
              });
                         
              //МОДАЛЬНОЕ ОКНО РЕДАКТИРОВАНИЯ СТРОКИ
              $('body').on('click','.row_edit',function(){
                //открыть модальное окно id="add_edit_row" с формой редакт
                $("#add_edit_row").modal('show');
                //кнопка вызова модального окна имеет атрибут data с данными - эти данные заносим в переменные
                var r_title = $(this).data('r_title');
                var r_position = $(this).data('r_position');
                var r_id = $(this).data('r_id');

                //заносим данные в поля формы - для редактирования блока
                $("form#my_row").attr("action","/index.php/admin/edit_row");
                //скрываем поле - не участвует в редактировании, используется при создании строки
                $("#b_generation").css({"display":"none"});
                $("input#rows_title").val(r_title);
                $("input#rows_position").val(r_position);
                $("input#r_id").val(r_id);
              });
              
              //Сортировка перетаскивание строк
              Sortable.create(simpleList, {animation: 200,
                store: {
                // Получение сортировки (вызывается при инициализации)
                get: function (sortable) {
                var order = sortable.toArray();
                return order;
                },
                // Сохранение сортировки (вызывается каждый раз при её изменении)
                set: function (sortable) {
                var order = sortable.toArray();
                //console.log(order);
                    jQuery.ajax({
                        type: "POST",
                        url: "/index.php/admin/json_sort",
                        data: {id_row: order},
                        success: function(rows){
                        //console.log(rows);
                        }
                    });
                 }
                 }
              });
              
              //МОДАЛЬНОЕ ОКНО добавления пунктов навигации
              $('body').on('click','#nav_add',function(){
                //открыть модальное окно id="editblock" с формой редакт блока
                $("#add_nav_items").modal('show');
              });
                
              //МОДАЛЬНОЕ ОКНО РЕДАКТИРОВАНИЯ пунктов навигации
              $('body').on('click','#nav_del_edit',function(){
                //открыть модальное окно id="editblock" с формой редакт блока
                $("#edit_nav_items").modal('show');
              });
              
              //МОДАЛЬНОЕ ОКНО РЕДАКТИРОВАНИЯ определённого пункта навигации
              $('body').on('click','#nav_one_edit',function(){
                //открыть модальное окно id="editblock" с формой редакт блока
                $("#edit_nav_one_item").modal('show');
                //кнопка вызова модального окна имеет атрибут data с данными - эти данные заносим в переменные
                var nav_one_id = $(this).data('nav_one_id');
                var nav_one_name = $(this).data('nav_one_name');
                var nav_one_veight = $(this).data('nav_one_veight');
                var nav_one_visible = $(this).data('nav_one_visible');
                var nav_one_url = $(this).data('nav_one_url');
                //заносим данные в поля формы - для редактирования пункта навигации
                $("input#li_id").val(nav_one_id);
                $("input#li_name").val(nav_one_name);
                $("input#li_url").val(nav_one_url);
                $("select#li_veight").val(nav_one_veight);
                $("select#li_visible").val(nav_one_visible);
              });
            
            //Раскрыть или свернуть все блоки
            $('#all_collapse').on('click', function () {
                $('.collapse').collapse('toggle');
            });
            
            //навигационная форма - добавляем поля для создания пунктов меню
            (function(){
            var a = 0;
            $("body").on('click', '#addd', function() {
                            a = a + 1;
                            //помещаем атрибуты полей формы в переменную
                            var b = 'items[' + a + '][url]';
                            var c = 'items[' + a + '][li_name]';
                            var d = 'items[' + a + '][visible]';
                            var e = 'items[' + a + '][veight]';
                            //клонируем div с полями
                            $("#nav_field").clone().attr('id', 'nav_field_' + a).appendTo("#clon_place");
                            //переписываем атрибут склонированных полей
                            $('#nav_field_' + a + ' select.url').attr("name", b);
                            $('#nav_field_' + a + ' input.li_name').attr("name", c);
                            $('#nav_field_' + a + ' input.visible').attr("name", d);
                            $('#nav_field_' + a + ' select.veight').attr("name", e);
            });
            })();//end of navigation form


}); 