<?php
// app/models/UserModel.php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getUsers() {
        return $this->db->get('users');
    }


    public function getUserByid($id) {
        return $this->db->where('id', $id)->getOne('users');
    }


    public function addUser($data) {
        
        return $this->db->insert('users', $data);
    }

    
    public function updateUser($id, $data)
    {     
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function deleteUser($id) {
        $condition = $this->db->where('id' ,$id);
        return $this->db->delete('users', $condition);
    }

    public function searchUsers($searchTerm) {
        $this->db->where('username', $searchTerm, 'LIKE');
        return $this->db->get('users');
    }

}
?>
