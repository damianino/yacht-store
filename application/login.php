<?
if($_SESSION)
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == '1' && $password == '1'){
        session_start();
        $_SESSION['username'] = $username;
        echo 'success';
        return;
    }
    echo 'fail';
 //die();