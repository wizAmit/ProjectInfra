<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("dbcon.php");
$fc = $_POST['t1'];
$sb=$_POST['t2'];
$aid=$_POST['t3'];
$i1 = $_FILES['ff']['name'];
$pth = 'assign/'.$i1;
$t = $_FILES['ff']['tmp_name'];
move_uploaded_file($t,$pth);
$qry = "insert into assignment(FacCode,Subject,AssId,AssFile) values('".$fc."','".$sb."','".$aid."','".$pth."')";
$rs=mysql_query($qry);
$qry2="select * from assignment";
$rs2=mysql_query($qry2);
while($r=mysql_fetch_array($rs2)){
?>
	<a href="<?php echo $r['C:\wamp\www\assign'];?>">download</a>
	
<?php
}
?>
</body>
</html>
