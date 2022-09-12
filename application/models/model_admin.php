<?
class Model_Admin extends Model
{

	public function query($query)
	{	
		require_once('./application/connect_db.php');
		if(!$result = $conn->query($query)){
			echo $conn->error;
		}
		while($data[] = mysqli_fetch_assoc($result));
		//echo $data[0]['name'];
		$data = array_slice($data, 0, -1);
		$conn->close();
		return $data;
	}
}