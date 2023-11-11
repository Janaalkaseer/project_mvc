<?php
// app/controllers/UserController.php
class UserController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $users = $this->model->getUsers();
        
        include 'app/views/user_list.php';
    }

    public function addUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username=$_POST['username'];
            $email=$_POST['password'];
            $data = [
                'username' =>$username ,
                'password' => $email ,
            ];

            if ($this->model->addUser($data)) {
               header('location:'.BASE_PATH);
               echo "done";
            } else {
                echo "Failed to add user.";
            }
        }
    }


    public function updateUser($id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $data = [
                'username' => $username,
                'password' => $password,
            ];

            if ($this->model->updateUser($id, $data)) {
                echo "User updated successfully!";
                header('Location:' . BASE_PATH);
            } else {
                echo "Failed to update user.";
            }
        } else {
            $user = $this->model->getUserByid($id);
            include __DIR__.'/../views/edit_list.php';
        }
    }

public function editUser($id){
    $user = $this->model->getUserByid($id);
        
    include  __DIR__. '/../views/edit_list.php';
}

    public function deleteUser($id){
     
            $id=$_GET['id'];
            if ($this->model->deleteUser($id)) {
                header('location:'.BASE_PATH);
               echo "Delete done";
            } else {
                echo "Failed to Delete user.";
            }
        }


    //  public function searchUsers($searchTerm) {
    //         $users = $this->model->searchUsers($searchTerm);
    //         include '../views/user_list.php';
    //     }
    
    //  public function showSearchedUsers($searchTerm) {
    //         $users = $this->model->searchUsers($searchTerm);
    //         include '../views/user_list.php';
    //     }  
 }

?>
