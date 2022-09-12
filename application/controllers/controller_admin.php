<?
class Controller_Admin extends Controller
{
    function __construct()
    {
        session_start();
        $this->model = new Model_Admin();
    }

    function admin_view($loggedin){
        include_once('./application/views/view_admin.php');
    }

    function action_login(){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == '1' && $password == '1'){
            $_SESSION['username'] = $username;
            echo 'success';
            return;
        }
        echo 'fail';
        die();
    }

    function action_isauth(){
        if (isset($_SESSION['username'])) {
            //echo 'auth_ok'; 
            return true;
        }
        //echo 'auth_err';
        return false;
    }

    function action_logout()
    {
        session_destroy();
        session_unset();
        header('yacht.com');
    }

    function action_query(){
        if (!$this->action_isauth()){
            echo 'not logged in';
            die();
        };
        
        $table = $_POST['table'];
        $query = $_POST['query'];
        
        if(!isset($query) || $query == '')$query = "SELECT * FROM $table";
        $data = $this->model->query($query);
        echo json_encode($data);
    }

    function action_index()
    {

        $this->admin_view($this->action_isauth());
    }
}
