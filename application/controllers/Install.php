<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Install extends CI_Controller {
    public function __construct()
        {
            parent::__construct();
            $this->load->helper(array('form', 'url', 'file'));
            $this->load->library('form_validation');
        }
    //1ШАГ. Инсталляция. Загружаем форму для записи конфигурационных данных
	public function index()
    	{
    	   //достаём базовый урл и передаём его в форму
           $data['config_base_url'] = 'http://' . $_SERVER['HTTP_HOST'] . '/';
    	   $this->load->view('install/view_conf', $data);
        }
        
    //Обрабатываем данные формы, создаём запись в конфигурационный файл и редирект на 2й шаг
    public function new_conf_conf()
    	{
            $db_domen = $this->input->post('db_domen');
            $language = $this->input->post('language');

            //содержимое файла в переменную для дальнейшей записи в файл
            $conf_conf = '<?php
                defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');
                
                /*
                |--------------------------------------------------------------------------
                | Base Site URL
                |--------------------------------------------------------------------------
                */
                $config[\'base_url\'] = \'' . $db_domen . '\';
                
                /*
                |--------------------------------------------------------------------------
                | Index File
                |--------------------------------------------------------------------------
                */
                $config[\'index_page\'] = \'index.php\';
                
                /*
                |--------------------------------------------------------------------------
                | URI PROTOCOL
                |--------------------------------------------------------------------------
                */
                $config[\'uri_protocol\']	= \'REQUEST_URI\';
                
                /*
                |--------------------------------------------------------------------------
                | URL suffix
                |--------------------------------------------------------------------------
                */
                $config[\'url_suffix\'] = \'\';
                
                /*
                |--------------------------------------------------------------------------
                | Default Language
                |--------------------------------------------------------------------------
                */
                $config[\'language\']	= \'' . $language . '\';
                
                /*
                |--------------------------------------------------------------------------
                | Default Character Set
                |--------------------------------------------------------------------------
                */
                $config[\'charset\'] = \'UTF-8\';
                
                /*
                |--------------------------------------------------------------------------
                | Enable/Disable System Hooks
                |--------------------------------------------------------------------------
                */
                $config[\'enable_hooks\'] = FALSE;
                
                /*
                |--------------------------------------------------------------------------
                | Class Extension Prefix
                |--------------------------------------------------------------------------
                */
                $config[\'subclass_prefix\'] = \'MY_\';
                
                /*
                |--------------------------------------------------------------------------
                | Composer auto-loading
                |--------------------------------------------------------------------------
                */
                $config[\'composer_autoload\'] = FALSE;
                
                /*
                |--------------------------------------------------------------------------
                | Allowed URL Characters
                |--------------------------------------------------------------------------
                */
                $config[\'permitted_uri_chars\'] = \'a-z 0-9~%.:_\-\';
                
                /*
                |--------------------------------------------------------------------------
                | Enable Query Strings
                |--------------------------------------------------------------------------
                */
                $config[\'allow_get_array\'] = TRUE;
                $config[\'enable_query_strings\'] = FALSE;
                $config[\'controller_trigger\'] = \'c\';
                $config[\'function_trigger\'] = \'m\';
                $config[\'directory_trigger\'] = \'d\';
                
                /*
                |--------------------------------------------------------------------------
                | Error Logging Threshold
                |--------------------------------------------------------------------------
                */
                $config[\'log_threshold\'] = 0;
                
                /*
                |--------------------------------------------------------------------------
                | Error Logging Directory Path
                |--------------------------------------------------------------------------
                */
                $config[\'log_path\'] = \'\';
                
                /*
                |--------------------------------------------------------------------------
                | Log File Extension
                |--------------------------------------------------------------------------
                */
                $config[\'log_file_extension\'] = \'\';
                
                /*
                |--------------------------------------------------------------------------
                | Log File Permissions
                |--------------------------------------------------------------------------
                */
                $config[\'log_file_permissions\'] = 0644;
                
                /*
                |--------------------------------------------------------------------------
                | Date Format for Logs
                |--------------------------------------------------------------------------
                */
                $config[\'log_date_format\'] = \'Y-m-d H:i:s\';
                
                /*
                |--------------------------------------------------------------------------
                | Error Views Directory Path
                |--------------------------------------------------------------------------
                */
                $config[\'error_views_path\'] = \'\';
                
                /*
                |--------------------------------------------------------------------------
                | Cache Directory Path
                |--------------------------------------------------------------------------
                */
                $config[\'cache_path\'] = \'\';
                
                /*
                |--------------------------------------------------------------------------
                | Cache Include Query String
                |--------------------------------------------------------------------------
                */
                $config[\'cache_query_string\'] = FALSE;
                
                /*
                |--------------------------------------------------------------------------
                | Encryption Key
                |--------------------------------------------------------------------------
                */
                $config[\'encryption_key\'] = \'\';
                
                /*
                |--------------------------------------------------------------------------
                | Session Variables
                |--------------------------------------------------------------------------
                */
                $config[\'sess_driver\'] = \'files\';
                $config[\'sess_cookie_name\'] = \'ci_session\';
                $config[\'sess_expiration\'] = 7200;
                $config[\'sess_save_path\'] = NULL;
                $config[\'sess_match_ip\'] = FALSE;
                $config[\'sess_time_to_update\'] = 300;
                $config[\'sess_regenerate_destroy\'] = FALSE;
                
                /*
                |--------------------------------------------------------------------------
                | Cookie Related Variables
                |--------------------------------------------------------------------------
                */
                $config[\'cookie_prefix\']	= \'\';
                $config[\'cookie_domain\']	= \'\';
                $config[\'cookie_path\']		= \'/\';
                $config[\'cookie_secure\']	= FALSE;
                $config[\'cookie_httponly\'] 	= FALSE;
                
                /*
                |--------------------------------------------------------------------------
                | Standardize newlines
                |--------------------------------------------------------------------------
                */
                $config[\'standardize_newlines\'] = FALSE;
                
                /*
                |--------------------------------------------------------------------------
                | Global XSS Filtering
                |--------------------------------------------------------------------------
                */
                $config[\'global_xss_filtering\'] = FALSE;
                
                /*
                |--------------------------------------------------------------------------
                | Cross Site Request Forgery
                |--------------------------------------------------------------------------
                */
                $config[\'csrf_protection\'] = FALSE;
                $config[\'csrf_token_name\'] = \'csrf_test_name\';
                $config[\'csrf_cookie_name\'] = \'csrf_cookie_name\';
                $config[\'csrf_expire\'] = 7200;
                $config[\'csrf_regenerate\'] = TRUE;
                $config[\'csrf_exclude_uris\'] = array();
                
                /*
                |--------------------------------------------------------------------------
                | Output Compression
                |--------------------------------------------------------------------------
                */
                $config[\'compress_output\'] = FALSE;
                
                /*
                |--------------------------------------------------------------------------
                | Master Time Reference
                |--------------------------------------------------------------------------
                */
                $config[\'time_reference\'] = \'local\';
                
                /*
                |--------------------------------------------------------------------------
                | Rewrite PHP Short Tags
                |--------------------------------------------------------------------------
                */
                $config[\'rewrite_short_tags\'] = FALSE;
                
                /*
                |--------------------------------------------------------------------------
                | Reverse Proxy IPs
                |--------------------------------------------------------------------------
                */
                $config[\'proxy_ips\'] = \'\';
                
                /*
                |--------------------------------------------------------------------------
                | добавляем значение дефолтного контроллера которое перезаписывается после 
                | инсталляции, это значение используем в файле config/route.php
                |--------------------------------------------------------------------------
                */
                $config[\'dflt_contr\'] = \'front\';
                ';//the end
                         
            // и теперь перезаписываем конфигурацию в файл
            if ( ! write_file('./application/config/config.php', $conf_conf, 'w'))
            {
                 echo 'Не удалось записать данные в файл!';
            }
            else
            {
                 redirect($db_domen . 'install/new_conf_db', 'refresh');
            }    
        }

    //2ШАГ. Загружаем следующую форму для записи конфигурационных данных (конфиг базы данных)
    //с предварительной проверкой соединения с базой
    public function new_conf_db()
    	{  
            $db_host = $this->input->post('db_host');
            $db_user = $this->input->post('db_user');
            $db_name = $this->input->post('db_name');
            $db_password = $this->input->post('db_password');
            
            //отключаем вывод ошибок чтобы перекрыть своим инфо-блоком
            //ini_set('display_errors', 'Off');
            
            $this->form_validation->set_rules('db_user', 'db-User', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                    $this->load->view('install/view_db');
            }
            else
            {
                    $dsn = 'mysqli://' . $db_user . ':' . $db_password . '@' . $db_host . '/' . $db_name;

                    // Load database and dbutil
                    $this->load->database($dsn);
                    $this->load->dbutil();
                     
                    // check connection details
                    if(! $this->dbutil->database_exists($db_name))
                    {
                        // if connection details incorrect show error
                        echo 'Incorrect database information provided' . $db_name;
                        $this->load->view('install/view_db');                                      
                    }
                    else
                    {
                        //содержимое файла в переменную для дальнейшей записи в файл конфигурации
                        $db_conf ='<?php
                        defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');
                        
                        $active_group = \'default\';
                        $query_builder = TRUE;
                        
                            $db[\'default\'] = array(
                            	\'dsn\'	=> \'\',
                            	\'hostname\' => \'' . $db_host . '\',
                            	\'username\' => \'' . $db_user . '\',
                            	\'password\' => \'' . $db_password . '\',
                            	\'database\' => \'' . $db_name . '\',
                            	\'dbdriver\' => \'mysqli\',
                            	\'dbprefix\' => \'\',
                            	\'pconnect\' => FALSE,
                            	\'db_debug\' => (ENVIRONMENT !== \'production\'),
                            	\'cache_on\' => FALSE,
                            	\'cachedir\' => \'\',
                            	\'char_set\' => \'utf8\',
                            	\'dbcollat\' => \'utf8_general_ci\',
                            	\'swap_pre\' => \'\',
                            	\'encrypt\' => FALSE,
                            	\'compress\' => FALSE,
                            	\'stricton\' => FALSE,
                            	\'failover\' => array(),
                            	\'save_queries\' => TRUE
                            );';
                                     
                        // и теперь перезаписываем конфигурацию в файл
                        if ( ! write_file('./application/config/database.php', $db_conf, 'w'))
                        {
                             echo 'Не удалось записать данные в файл!';
                        }
                        else
                        {
                            //заливаем бекап базы
                            //записываем содержимое файла в переменную
                            $sql = read_file('./install_sql/semki.sql');
                            //функция $this->db->query($table) выполняет один запрос к базе
                            //у нас их много и они идут через ';' - поэтому разбиваем строку на подстроки
                            $tabls = explode(";",$sql);
                            //и в цикле перезаём запросы к базе построчно
                            foreach($tabls as $table){
                                $this->db->query($table);
                            }
                            //последний шаг - вход в систему под админом и редирект на изменение данных админа
                            $this->load->library('ion_auth');
                            $identity = 'admin@admin.com';
                    		$password = 'password';
                    		$remember = TRUE; // remember the user
                    		$this->ion_auth->login($identity, $password, $remember);
                            redirect('auth/edit_user/1', 'refresh');
                        }
                    }                                                            
            }
        }

}