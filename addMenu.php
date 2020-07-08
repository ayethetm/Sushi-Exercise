<?php
	$name=$_POST['name'];
	$price=$_POST['price'];
	$photo=$_FILES['photo'];

	$photoname=$photo['name'];
	$basepath="photo/";
	$fullpath=$basepath.$photoname;
	move_uploaded_file($photo['tmp_name'], $fullpath);
	$menu=array(
				"name"=>$name,
				"price"=>$price,
				"photo"=>$fullpath);
	var_dump($menu);

	//get jsonData from jsonfile
	$jsonData=file_get_contents('menulist.json');
	if(!$jsonData){
		$jsonData='[]';
	}
	//convert into array from json

	$data_arr=json_decode($jsonData);
	array_push($data_arr, $menu);

	$jsonData=json_encode($data_arr,JSON_PRETTY_PRINT);
	file_put_contents('menulist.json', $jsonData);
	header("location:index.php");
?>
