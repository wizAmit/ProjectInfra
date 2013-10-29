<?php
	$dsn = 'mysql:host=db4free.net:3306;dbname=cse10214';
	//echo $dsn;

	$user='wizamit';
	$pass='wizard10789';
	$db = new PDO($dsn, $user, $pass, array(PDO::ATTR_EMULATE_PREPARES=>false,
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
	$search = $_POST['fname'];
	$stmt = $db->prepare("SELECT * from details_stu where `Full Name` like ?");
	$stmt->bindValue(1,"$search%",PDO::PARAM_STR);
	try{
		$stmt->execute();
		echo "<table id='res_table'><tr><td><b>University Roll</b></td><td><b>Name</b></td></tr>";
		while($rows = $stmt->fetch()){
			echo '<tr><td>'.$rows[0].'</td><td>'.$rows[1].'</td>';
		}
		echo '</table>';
	} catch(PDOException $ex){
		echo $ex;
	}
	return 1;
?>