<?
class Model_Main extends Model
{
	public function get_data()
	{	
		require_once('./application/connect_db.php');

		$query = "SELECT id, name, port, price, image_path from yachts_sale ORDER BY RAND () LIMIT 6";
		$result = $conn->query($query);
		while($items[] = mysqli_fetch_assoc($result));
		array_splice($items,-1,1);

		$query = "SELECT name, city, text from reviews LIMIT 6";
		$result = $conn->query($query);
		while($reviews[] = mysqli_fetch_assoc($result));
		array_splice($reviews,-1,1);

		$query = "SELECT header, body, image_path from news LIMIT 3";
		$result = $conn->query($query);
		while($news[] = mysqli_fetch_assoc($result));
		array_splice($news,-1,1);
		
		$conn->close();

		return array(
			'headerText'=>'Ваше приключение начинается у нас.',
			'items'=>$items,
			'reviews'=>$reviews,
			'news'=>$news
		);
	}
}