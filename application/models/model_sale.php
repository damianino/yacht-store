<?
class Model_Sale extends Model
{
	public function get_data()
	{	
		include_once('./application/connect_db.php');
		$query = "SELECT id, name, port, price,image_path FROM yachts_sale";
		$result = $conn->query($query);
		while ($items[] = mysqli_fetch_assoc($result));
		$items = array_slice($items, 0, -1);
		$conn->close();
		return array(
			'headerText' => 'Вам нужно только сделать выбор.',
			'items' => $items
		);
	}
	public function custom_query($table, $all, $minLength, $maxPrice, $minCapacity, $minPower)
	{	
		include_once('./application/connect_db.php');
		if ($all){
			$query = "SELECT id, name, port, price, image_path FROM $table";
		}else{
			$query = "SELECT id, name, port, price, image_path FROM $table WHERE 	length > $minLength 
																				AND price > $maxPrice 
																				AND capacity > $minCapacity 
																				AND power > $minPower";
		}
		$result = $conn->query($query);
		
		while ($items[] = mysqli_fetch_assoc($result));
		$items = array_slice($items, 0, -1);
		$conn->close();
		return $items;
	}
	public function get_itemData($table, $id){
		include_once('./application/connect_db.php');
		$query = "SELECT * FROM $table WHERE id = $id";
		$result = $conn->query($query);
		$conn->close();
		return $result;
	}
}