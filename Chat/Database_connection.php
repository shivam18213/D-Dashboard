<?php

//Database_connection.php

class Database_connection
{
	function connect()
	{
		$connect = new PDO("mysql:host=localhost; dbname=test", "root", "Shivam@18213");

		return $connect;
	}
}

?>
