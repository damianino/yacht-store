<?
class Model_News extends Model
{
	public function get_data()
	{	
		include_once('./application/connect_db.php');
		$query = 'SELECT * FROM news';
		$result = $conn->query($query);
		while($news[] = mysqli_fetch_assoc($result));
		$news = array_slice($news, 0, -1);
		$conn->close();
		return array(
			'headerText'=>'Держим нос по ветру.',
			'news'=>$news
		);
	}
}