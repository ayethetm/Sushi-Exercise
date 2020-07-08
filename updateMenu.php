<?php
	$name=$_POST['edit_name'];
	$price=$_POST['edit_price'];
	$id=$_POST['edit_id'];
	$oldphoto=$_POST['edit_oldphoto'];
	$newphoto=$_FILES['edit_newphoto'];
	$newphotoname=$newphoto['name'];

	echo "ID=>".$id."<br>".
	"Name=>".$name."<br>".
	"Price=>".$price."<br>".
	"Old Photo=>".$oldphoto."<br>".
	"New Photo=>".$newphotoname."<br>";
	console.log($newphotoname);

	if($newphoto['size']>0)
	{
		$basepath="photo/";
	$fullpath=$basepath.$newphotoname;
	move_uploaded_file($newphoto['tmp_name'], $fullpath);
	}
	else
	{
		$fullpath=$oldphoto;
	}

	$menu=array(
				"name"=>$name,
				"price"=>$price,
				"photo"=>$fullpath);

	//get jsonData from jsonfile

	$jsonData=file_get_contents('menulist.json');

	if(!$jsonData)
	{
		$jsonData='[]';
	}

	//convert into array from json

	$data_arr=json_decode($jsonData);
	$data_arr[$id]=$menu;

	$jsonData=json_encode($data_arr,JSON_PRETTY_PRINT);

	file_put_contents('menulist.json', $jsonData);
	
	header("location:index.php");



?>