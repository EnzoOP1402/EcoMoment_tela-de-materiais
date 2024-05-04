<?php
	//Criando a conexão

	$con = mysqli_connect('143.106.241.3','cl202247','ENVI2224*');

	//Sample Database Connection Syntax for PHP and MySQL.

	//Connect To Database

	$hostname="143.106.241.3";
	$username="cl202247";
	$password="ENVI2224*";
	$dbname="cl202247";
	$link = mysqli_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
	
	mysqli_select_db($con ,$dbname);
	mysqli_query($link,'SET NAMES "UTF8"') or die ('Erro na SQL'.mysqli_error($link));
	mysqli_query($link, 'SET character_set_connection=UTF8') or die ('Erro na SQL'.mysqli_error($link));
	mysqli_query($link, 'SET character_set_client=UTF8') or die ('Erro na SQL'.mysqli_error($link));
	mysqli_query($link, 'SET character_set_results=UTF8') or die ('Erro na SQL'.mysqli_error($link));