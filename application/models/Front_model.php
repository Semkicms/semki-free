<?php
class Front_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }
        
        public function get_rows()
        {
            $this->db->select('*');
            $this->db->from('blocs');
            $this->db->join('rows', 'rows.r_id = blocs.id_row');
            $this->db->order_by('r_position', "asc");
            $this->db->order_by("b_position", "asc");
            $query = $this->db->get();
            
            return $query->result_array();
        }
        
        public function get_navigation()
        {
            $this->db->select('*');
            $this->db->from('navigation');
            $this->db->where('visible', '1'); 
            $this->db->order_by("veight", "asc");
            $query = $this->db->get();
            
            return $query->result_array();
        }
        
        public function get_settings()
        {
            $this->db->select('*');
            $this->db->from('settings');
            $query = $this->db->get();
            
            return $query->row_array();
        }
		
		//выводим все формы с полями
		public function get_forms()
        {
            $this->db->select('*');
            $this->db->from('forms_id');
			//'left outer' выводит форму если даже она пока не имеет полей
			$this->db->join('form_fields', 'form_fields.form_id = forms_id.f_form_id', 'left outer');
			$this->db->order_by('veight', "asc");
            $query = $this->db->get();
            
            return $query->result_array();
        }
}