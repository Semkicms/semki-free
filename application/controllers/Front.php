<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {
    public function __construct()
        {
            parent::__construct();
            $this->load->model('Front_model');
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library(array('ion_auth','form_validation'));
        }

	public function index()
    	{
    	    // генерация установок сайта
            $settings = $this->Front_model->get_settings();
            
            // генерация меню
            $data['nav_value'] = $this->Front_model->get_navigation();
    	   
            // генерация блоков
            $my_rows = $this->Front_model->get_rows();
            foreach ($my_rows as $l) {
            $data['my_rows'][$l['r_id']][] = $l;
            }
            
            //теперь из обработанного массива достаём ключи (они же айди строк)
            //эту последовательность ключей помещаем в переменную $data['option_row']
            //и используем для выбора строки при создании блока в админке
            $a = array_keys($data['my_rows']);
            $data['option_row'] = $a;
			
			// выводим массив форм для аттача к блокам
            $all_forms = $this->Front_model->get_forms();
			//формируем массив (для дальнейшего вывода форм)
            foreach ($all_forms as $l) {
            $data['all_forms'][$l['f_form_id']][] = $l;
            }
            
            $this->load->view('front_tpl/header',$settings);
            if ($this->ion_auth->is_admin())
            { 
                $this->load->view('admin_tpl/admin_nav');
            } 
    		$this->load->view('front_tpl/front_view', $data);
            $this->load->view('front_tpl/footer');
            
            //echo "<pre>";
            //print_r($this->session->all_userdata());
			//print_r($data);
            //echo "</pre>";
    	}
		
}
