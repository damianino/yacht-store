<?
class Controller_Reviews extends Controller
{
	function __construct()
	{
		$this->model = new Model_Reviews();
		$this->view = new View();
	}
	function action_index()
	{	
		$data = $this->model->get_data();
		$this->view->generate('view_reviews.php', 'view_template.php', $data , 'reviews');
	}
	function action_post(){
		require_once('./application/connect_db.php');

		$query = "INSERT INTO reviews VALUES(NULL,'".$_POST['name']."','".$_POST['city']."','".$_POST['text']."')";
		$conn->query($query);
		$conn->close();
		//echo $query;
	}
}  