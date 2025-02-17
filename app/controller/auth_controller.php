<?php
 require_once 'model/user.model.php';
 require_once 'view/auth.view.php';
class AuthController {

    private $model;
    private $view;
    private $viewConstruc;

    public function __construct($user=null){
        $this -> model = new UserModel();
        $this -> view = new autenticacionView($user); 
        $this -> viewConstruc = new construccionesView($user);
    }
    public function showLogin(){
        //muestro el formulario
        return $this->view->showLogin();
    }
    public function login(){
        if (!isset($_POST['email']) || empty ($_POST['email'])) {
            return $this->view->showLogin('falta completar el nombre de usuario');
        }
        if (!isset($_POST['password']) || empty ($_POST['password'])){
            return $this->view->showLogin('falta completar la contraseña de usuario');
        }
        $email = $_POST ['email'];
        $password = $_POST ['password'];

        //verficar que el usuario esta en la base de datos 
        $userFromDB = $this->model->getUserByEmail($email);
        if(password_verify($password, $userFromDB->password)){
            //guardo en la sesion el id del usuario
            session_start();
            $_SESSION['ID_USER'] = $userFromDB -> id;
            $_SESSION['EMAIL_USER'] = $userFromDB ->email;
            $_SESSION['LAST_ACTIVITY'] = time();
            header ('Location: ' . BASE_URL);
            die();
        
    } else {
        return $this->view->showLogin('credenciales incorrectas');
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
        die();
    }


}

