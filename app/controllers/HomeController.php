<?php

    class HomeController extends Controller
    {
        public function index($name = '')
        {
            $user = $this->model('User');
            $users = $user->All();
            $this->view('home/index', ['users' => $users]);
        }

        public function login()
        {
            if(isset($_POST['action'])){
                //login logic
                $username = $_POST['username'];
                $password = $_POST['password'];
                $user_type = $_POST['user_type'];
                $user = $this->model('User')->getUser($username);
                if($user!=null && $user_type == $user->user_type && password_verify($password, $user->password_hash)){
                    session_start();
                    $_SESSION['user_id'] = $user->user_id;
                    //echo "You should be logged in!";
                    //if user is a site :- header('location:/Home/Site')
                    //if user is a customer :- header('location:/Home/Customer')
                     //header('location:/Home/Secure');
                }
                else{
                echo 'INVALID LOGIN';

                }
            }else{
                $this->view('home/login');
            }
        }

        public function Secure(){
            if(!isset($_SESSION['user_id']) || $_SESSION['user_id']==null)
                return header('location:/Home/Login');
            echo "This is secure!<a href='/Home/Logout'>Logout!!</a>";
        }

        public function Logout(){
            session_destroy();
            header('location:/Home/Login');
        }

        public function register()
        {

            if(isset($_POST['action'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $user_type = $_POST['user_type'];
                $password_confirmation = $_POST['password_confirmation'];


                if($password == $password_confirmation & isset($_POST['user_type'])){
                    $user = $this->model('User');
                    $user->username = $username;
                    $user->password_hash = password_hash($password, PASSWORD_DEFAULT);//
                    $user->user_type = $user_type;
                    $user->insert();//

                    $user = $this->model('User')->getUser($username);
                    session_start();
                    
                    $_SESSION['user_id'] = $user->user_id;
                    //RedirectToAction
                    if($user_type == 'Customer')
                        header('location:/Customer/Register');
                    elseif ($user_type == 'Site')
                        header('location:/Site/Register');
                        # code...
                    
                    //header('location:/Home/Login');
                }else{
                    //provide an error message

                }
            }else{
                $this->view('home/register');
            }
        }


        public function output($name = '')
        {
           $user = $this->model('User');
           $user->name = $name;
           $this->view('home/indexJSON', ['name' => $user->name]);
        }
        
    }

?>