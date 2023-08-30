<?php

class LoginController
{
  

    public function handleLogin()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) && isset($_POST['login'])) {

           
                $username = $_POST['username'];
                $password = $_POST['password'];

                if ($username === 'admin' && $password === 'test') {
                    $_SESSION['loggedin'] = true;
                    header("Location: index.php");
                } else {
                       
                    
                    header("Location: index.php");
                    
                    $_SESSION['error'] = "Invalid username or password";
                    exit;


                }
            
        }}
        if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
            
            $_SESSION = [];
            session_destroy();
            header("Location: index.php");
            exit;
        }

    }

    
} ?>