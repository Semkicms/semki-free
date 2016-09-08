<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
        {
            parent::__construct();
            $this->load->model('Admin_model');
            $this->load->helper('url');
            $this->load->helper('form');
            
            //для работы с textarea - <br><p> итд
            $this->load->library('typography');
            $this->load->library('ion_auth');
        }

	public function index()
    	{
            // выводим массив навигации
            $data['nav_value'] = $this->Admin_model->get_navigation();
                        
    	    //формируем массив (для дальнейшего вывода блоков в строках)
            $my_rows = $this->Admin_model->get_rows();
            foreach ($my_rows as $l) {
            $data['my_rows'][$l['r_id']][] = $l;
            }
            
            //теперь из обработанного массива достаём ключи (они же айди строк)
            //эту последовательность ключей помещаем в переменную $data['option_row']
            //и используем для выбора строки при создании блока в админке
            $a = array_keys($data['my_rows']);
            $data['option_row'] = $a;
            
            //если админ - загружаем страничку
            if ($this->ion_auth->is_admin())
            { 
                $this->load->view('admin_tpl/header');
                $this->load->view('admin_tpl/admin_nav');
        		$this->load->view('admin_tpl/admin_index', $data);
                $this->load->view('admin_tpl/modal_forms/tpl_ed');
            } 
            else  
            { 
                 redirect('/auth', 'refresh');
            }

    	}
        
        // сортируем строки перетаскиванием - данные приходят аяксом
        public function json_sort()
    	{ 
            // формируем массив из значений айди строки
    	    $data = array(
                    '_rows' => $this->input->post('id_row')
                );
            // перебираем и пишем очерёдность после сортировки 
            // согласно position для для каждого id_row
            $pos_new = 1;
            foreach($data['_rows'] as $item){
                $this->db->where('r_id', $item);
                $this->db->update('rows', array('r_position' => $pos_new));
            	$pos_new++;
            }
            
            //возвращаем для теста
            //echo json_encode($data, JSON_UNESCAPED_UNICODE);
    	}
        
        // обработчик - добавление строки с блоком
        public function add_row()
    	{   //массив для записи строки
            $data_row = array(
                'title' => $this->input->post('rows_title'),
                'r_position' => $this->input->post('rows_position')
            );
            
            //количество создаваемых блоков - используем в цикле добавляющем блоки
            $count_blocks = $this->input->post('data_bcount');
            //по количеству блоков вычисляем ширину каждого
            $full_width = 12;
            $block_width = $full_width / $count_blocks;
            
            $this->db->trans_start(); //старт транзакции
            
            //добавим регион-строку
            $this->db->insert('rows', $data_row);
            
            //массив для записи блоков
            $data_block = array(
                // айди вновь созданной строки - пишем в поле 'id_row' блока для связки блок-строка
                'id_row' => $this->db->insert_id(),
                'col_width' => $block_width,
            );
            
            //добавим блоки в цикле
            for ($x=0; $x<$count_blocks; $x++)
            {
                $this->db->insert('blocs', $data_block);
            }
            
            $this->db->trans_complete(); //финиш транзакции
			
			//заносим сообщение об успешном создании строки - в сессию
            $message_data = array('message_type' => "alert alert-success", 'message' => 'Строка <strong>"' . $data_row['title'] . '"</strong> с блоками успешно создана');
            $this->session->set_flashdata($message_data);
            
            redirect('/admin', 'refresh');
    	}
        
        // обработчик - добавление пунктов меню
        public function add_nav_li()
    	{
            $data = array(
                'items' => $this->input->post('items'),
            );
            
            foreach($data['items'] as $value){
                $this->db->insert('navigation', $value);
            }
            //заносим сообщение об успешном добавлении пункта меню - в сессию
            $message_data = array('message_type' => "alert alert-success", 'message' => 'Пункт(ы) меню успешно добавлен(ы)');
            $this->session->set_flashdata($message_data);
            
            redirect('/admin', 'refresh');
    	}
        
        //обработчик - редактируем пункт меню
        public function edit_nav_li()
    	{
           $data = array(
                'li_name' => $this->input->post('li_name'),
                'visible' => $this->input->post('visible'),
                'id' => $this->input->post('li_id'),
                'veight' => $this->input->post('veight')
            );

            $this->db->where('id', $data['id']);
            $this->db->update('navigation', $data);
            
            //заносим сообщение об успешном редактировании пункта меню - в сессию
            $message_data = array('message_type' => "alert alert-success", 'message' => 'Пункт <strong>"' . $data['li_name'] . '"</strong> отредактирован (id: ' . $data['id'] . ')');
            $this->session->set_flashdata($message_data);
            
            redirect('/admin', 'refresh');
            //print_r ($data);

    	}
        
        // обработчик - удаляем пункт меню
        public function delete_nav_li($id)
    	{
            $this->db->delete('navigation', array('id' => $id));
            
            //заносим сообщение об успешном удалении пункта меню - в сессию
            $message_data = array('message_type' => "alert alert-success", 'message' => 'Пункт меню удалён (id: ' . $id . ')');
            $this->session->set_flashdata($message_data);
            
            redirect('/admin', 'refresh');
    	}
        
        // обработчик - добавление одного блока
        public function add_block()
    	{
            //массив для записи блока
            $data = array(
                'b_title' => $this->input->post('b_title'),
                'text' => $this->input->post('text'),
                'col_width' => $this->input->post('b_width'),
                'b_position' => $this->input->post('b_position'),
                'id_row' => $this->input->post('id_row')
            );
            
            //узнаем какой тип обработки textarea выбран
            $editor_type = $this->input->post('editor_type');
            if($editor_type == 1){
            //если выбран редактор текста, преобразуем текст используя библиотеку 'typography'
            $data['text'] = $this->typography->auto_typography($data['text']);
            }
            
            $this->db->insert('blocs', $data);
			
			//заносим сообщение об успешном создании блока - в сессию
            $message_data = array('message_type' => "alert alert-success", 'message' => 'Блок <strong>' . $data['b_title'] . '</strong> успешно создан');
            $this->session->set_flashdata($message_data);
			
            redirect('/admin', 'refresh');
    	}
        
                
        // обработчик - редактирование блока
        function edit_block()
        {
            $data = array(
                'b_title' => $this->input->post('b_title'),
                'text' => $this->input->post('text'),
                'col_width' => $this->input->post('b_width'),
                'id_row' => $this->input->post('id_row'),
                'b_position' => $this->input->post('b_position'),
                'b_id' => $this->input->post('b_id')
            );
            
            //узнаем какой тип обработки textarea выбран
            $editor_type = $this->input->post('editor_type');
            if($editor_type == 1){
            //если выбран редактор текста, преобразуем текст используя библиотеку 'typography'
            $data['text'] = $this->typography->auto_typography($data['text']);
            }
            
            $this->db->where('b_id', $data['b_id']);
            $this->db->update('blocs', $data);
			
			//заносим сообщение об успешном редактировании блока - в сессию
            $message_data = array('message_type' => "alert alert-success", 'message' => 'Блок <strong>' . $data['b_title'] . '</strong> успешно отредактирован');
            $this->session->set_flashdata($message_data);
            
            redirect('/admin', 'refresh');
        }
        
        // обработчик - редактирование строки
        function edit_row()
        {
            $data = array(
                'title' => $this->input->post('rows_title'),
                'r_id' => $this->input->post('r_id'),
                'r_position' => $this->input->post('rows_position')
            );
            
            $this->db->where('r_id', $data['r_id']);
            $this->db->update('rows', $data);
			
			//заносим сообщение об успешном редактировании строки - в сессию
            $message_data = array('message_type' => "alert alert-success", 'message' => 'Строка <strong>"' . $data['title'] . '"</strong> успешно отредактирована');
            $this->session->set_flashdata($message_data);
            
            redirect('/admin', 'refresh');
        }
        
        // обработчик - удаление блока
        function delete_block($b_id)
        {
            $this->db->delete('blocs', array('b_id' => $b_id));
			
			//заносим сообщение об успешном удалении блока - в сессию
            $message_data = array('message_type' => "alert alert-success", 'message' => 'Блок удалён');
            $this->session->set_flashdata($message_data);
			
            redirect('/admin', 'refresh'); 
        }
                
        // обработчик - удаление ряда с блоками внутри (каскадное удаление в mysql)
        function delete_row($r_id)
        {
            $this->db->delete('rows', array('r_id' => $r_id));
			
			//заносим сообщение об успешном удалении ряда - в сессию
            $message_data = array('message_type' => "alert alert-success", 'message' => 'Строка удалена (row-id:' . $r_id . ')');
            $this->session->set_flashdata($message_data);
			
            redirect('/admin', 'refresh');
        }
        
        //страница редактирования настроек сайта
        public function settings()
    	{
    	    $this->load->model('Front_model');
    	    // генерация установок сайта
            $settings = $this->Front_model->get_settings();
            //print_r ($settings);
            
            //echo "<pre>";
            //print_r ($data);
            //echo "</pre>";
            
            //если админ - загружаем страничку
            if ($this->ion_auth->is_admin())
            { 
                $this->load->view('admin_tpl/admin_nav');
                $this->load->view('admin_tpl/header');
        		$this->load->view('admin_tpl/settings', $settings);
                $this->load->view('admin_tpl/footer');
            } 
            else  
            {
                redirect('/auth', 'refresh');
            }
    	}
        
        // обработчик - редактирование настроек сайта - запись в базу
        public function settings_post()
    	{
            $data['sitename'] = $this->input->post('sitename');
            $data['email'] = $this->input->post('email');
            $data['phone'] = $this->input->post('tel');
            $data['adress'] = $this->input->post('adress');
            $data['description'] = $this->input->post('description');
            $data['yandex_metrika'] = $this->input->post('yandex_metrika');
            $data['google_analytics'] = $this->input->post('google_analytics');
            
            $this->db->update('settings', $data);
			
			//заносим сообщение об успешном редактировании настроек сайта - в сессию
            $message_data = array('message_type' => "alert alert-success", 'message' => 'Настройки сайта успешно отредактированы');
            $this->session->set_flashdata($message_data);
			
            redirect('admin/settings', 'refresh');
            
    	}

}