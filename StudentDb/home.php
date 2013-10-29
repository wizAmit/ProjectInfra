<?php
/*get MySQL login and db creds*/
//require "include_db.php";

//enable sessions
/*if(class_exist('PDO'))
	echo "PDO enabled";
else
	echo "NOOO";*/
echo "Hi";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Details Form</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<style type="text/css">
#res_table, th, td{
	text-align: center;
	border: 1px solid black;
}
td{
padding:5px;
}	
</style>
</head>
<body allign="center">
<h1>Please Enter the following details:-</h1>
<form id="detFrm" method="post">
Name: <input type="text" name="name" id="name"></input>
<input type="submit" value="search" id="searchBtn" />
</form>
<div id="result"><!-- <table id="res"></table> --></div>
<script type='text/javascript'>
//<![CDATA[
$(document).ready(function(){
		var done =0;
		$("#result").slideUp();
		$("#searchBtn").click(function(e){
			e.preventDefault();
			if(done){
				ajax_search();
			}
			});
		$("#name").keyup(function(e){
			done=0;
			var x = document.getElementById("name");
			x.value=x.value.toUpperCase();
			e.preventDefault();
			ajax_search();
			});
		});
function ajax_search(){
	$("#result").show();
	var name=$("#name").val();
	$("#result").html(name);
	$.post("queryExe.php", {fname : name}, function(data){
			if(data.length>0){
			$("#result").html(data);
			}	
			});
	done =1;
}
// ]]>
</script>
</body>
</html>
