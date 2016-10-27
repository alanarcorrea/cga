<?php 

class Ambientes_Model extends CI_Model {
    
    public function select(){
        $this->db->order_by('descricao');
        return $this->db->get('ambientes')->result();
}
}