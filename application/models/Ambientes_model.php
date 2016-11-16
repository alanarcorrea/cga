<?php 

class Ambientes_Model extends CI_Model {
    
    public function select() {        
        $sql = "SELECT a.id AS id, a.descricao AS descricao, a.sigla AS sigla FROM ambientes a ";
        $sql .= "WHERE a.ativo=1 ";
        $sql .= "ORDER BY a.descricao";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function select_desativados() {        
        $sql = "SELECT a.id AS id, a.descricao AS descricao, a.sigla AS sigla FROM ambientes a ";
        $sql .= "WHERE a.ativo=0 ";
        $sql .= "ORDER BY a.descricao";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function ativar($id){
        $sql = "UPDATE ambientes SET ativo=1 WHERE id=$id";
        $this->db->query($sql); 
    }
    
     public function desativar($id){
        $sql = "UPDATE ambientes SET ativo=0 WHERE id=$id";
        $this->db->query($sql); 
    }
    
    public function insert($ambiente) {
         return $this->db->insert('ambientes', $ambiente);
    }
    
    public function update($ambiente) {  
       $this->db->where('id', $ambiente['id']);
       return $this->db->update('ambientes', $ambiente);   
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('ambientes'); 
    }

    public function find($id) {        
        $sql = "SELECT * FROM ambientes WHERE id = $id";
        $query = $this->db->query($sql);
        return $query->row();        
    }
    
    public function find_sigla($id){
        $sql = "SELECT sigla FROM ambientes WHERE id=$id";
        $query = $this->db->query($sql);
        return $query->row();
    }
}