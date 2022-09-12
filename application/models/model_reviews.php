<?
class Model_Reviews extends Model
{
	public function get_data()
	{
		
		include_once('./application/connect_db.php');
		$query = "SELECT * FROM reviews";
		$result = $conn->query($query);
		while ($reviews[] = mysqli_fetch_assoc($result));
		$reviews = array_slice($reviews, 0, -1);
		$conn->close();
		return array(
			'headerText' => 'Широко известны в узких кругах.',
			'reviews' => $reviews
		);
	}
}
