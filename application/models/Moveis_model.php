<?php 

class Moveis_Model extends CI_Model {

    public function select() {        
        $sql = "SELECT m.id AS id, m.descricao AS descricao, m.altura AS altura, m.largura AS largura, ";
        $sql .= "m.profundidade AS profundidade, m.preco AS preco, f.descricao AS foto, a.descricao AS ambiente FROM moveis m ";
        $sql .= "INNER JOIN fotografias f ON m.id = f.moveis_id ";
        $sql .= "INNER JOIN ambientes a ON m.ambientes_id = a.id ";
        $sql .= "ORDER BY m.descricao";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function select_moveis() {        
        $sql = "SELECT m.id AS id, m.descricao AS descricao, m.altura AS altura, m.largura AS largura, ";
        $sql .= "m.profundidade AS profundidade, m.preco AS preco, f.descricao AS foto, a.descricao AS ambiente FROM moveis m ";
        $sql .= "INNER JOIN fotografias f ON m.id = f.moveis_id ";
        $sql .= "INNER JOIN ambientes a ON m.ambientes_id = a.id ";
        $sql .= "WHERE m.destaque=0 AND m.ativo=1 ";
        $sql .= "ORDER BY m.descricao";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
        public function select_destaques() {        
        $sql = "SELECT m.id AS id, m.descricao AS descricao, m.altura AS altura, m.largura AS largura, ";
        $sql .= "m.profundidade AS profundidade, m.preco AS preco, f.descricao AS foto, a.descricao AS ambiente FROM moveis m ";
        $sql .= "INNER JOIN fotografias f ON m.id = f.moveis_id ";
        $sql .= "INNER JOIN ambientes a ON m.ambientes_id = a.id ";
        $sql .= "WHERE m.destaque = 1 AND m.ativo=1 ";
        $sql .= "ORDER BY m.descricao";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
        public function select_desativados() {        
        $sql = "SELECT m.id AS id, m.descricao AS descricao, m.altura AS altura, m.largura AS largura, ";
        $sql .= "m.profundidade AS profundidade, m.preco AS preco, f.descricao AS foto, a.descricao AS ambiente FROM moveis m ";
        $sql .= "INNER JOIN fotografias f ON m.id = f.moveis_id ";
        $sql .= "INNER JOIN ambientes a ON m.ambientes_id = a.id ";
        $sql .= "WHERE m.ativo=0 ";
        $sql .= "ORDER BY m.descricao";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function destacar($id){
        $sql = "UPDATE moveis SET destaque=1 WHERE id=$id";
        $this->db->query($sql); 
    }
    
    public function esconder($id){
        $sql = "UPDATE moveis SET destaque=0 WHERE id=$id";
        $this->db->query($sql); 
    }

     public function ativar($id){
        $sql = "UPDATE moveis SET ativo=1 WHERE id=$id";
        $this->db->query($sql); 
    }
    
     public function desativar($id){
        $sql = "UPDATE moveis SET ativo=0 WHERE id=$id";
        $this->db->query($sql); 
    }
    
    public function insert($movel) {
         return $this->db->insert('moveis', $movel);
    }
    
    public function update($movel) {   
        $this->db->where('id', $movel['id']);
        return $this->db->update('moveis', $movel);   
    }
    
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('moveis'); 
    }

    public function find($id) {        
        $sql = "select * from moveis where id = $id";
        $query = $this->db->query($sql);
        return $query->row();        
    }
}