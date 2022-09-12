<?
class Controller_Sale extends Controller
{
	function __construct()
	{
		$this->model = new Model_Sale();
		$this->view = new View();
	}
	function action_index()
	{	
		$data = $this->model->get_data();
		$this->view->generate('view_sale.php', 'view_template.php', $data, 'sale');
	}
	function action_updateItems(){
		$data = $this->model->custom_query($_POST['table'], $_POST['all'],$_POST['minLength'], $_POST['maxPrice'], $_POST['minCapacity'], $_POST['minPower']);
		echo json_encode($data);
		//echo sizeof($data);
	}
	function action_item(){
		$data = $this->model->get_itemData(Route::$routes[3], Route::$routes[4]);
		$item = mysqli_fetch_assoc($data);
		$item['table']=Route::$routes[3];
		$this->view->generate('view_item.php', 'view_template.php', $item, 'item');
	}
}  