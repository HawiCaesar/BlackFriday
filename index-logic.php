<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
//select a database to work with
$selected = mysql_select_db("blackfriday",$conn) 
  or die("Could not select examples");

if($_GET['brand']!="" && $_GET['category']){

	session_start();
	$brand = $_GET['brand'];
	$category = $_GET['category'];

	get_brand_products($brand,$category);
	get_other_brand_interests($brand,$category);

	header('Location: second-page.php');
}else{
	echo "no";
}

function get_brand_products($brand,$category){

		$brand_array = array();
		$query = "SELECT * FROM products WHERE brand = '".$brand."' AND category = '".$category."' ";

		$brands_results = mysql_query($query);


		if($brands_results){
			while($brand=mysql_fetch_assoc($brands_results)){

				$brand_array[] = $brand;
			}
		}

		$_SESSION['selected_brand'] = $brand_array;

	}
function get_other_brand_interests($brand,$category){
		$other_brand_array = array();
		$category_picture = "";
		$query = "SELECT * FROM products WHERE brand != '".$brand."' AND category = '".$category."' ORDER BY brand ASC";

		$other_brands_results = mysql_query($query);


		if($other_brands_results){
			while($obrand=mysql_fetch_assoc($other_brands_results)){

				$other_brand_array[] = $obrand;
			}
		}
		//echo $category;die;
		if($category=="Fashion"){
			$category_picture = 'header-fbu.png';
		}else if($category=="Smartphone"){
			$category_picture = 'header-sbu.png';
		}

		$_SESSION['category_picture'] = $category_picture;
		$_SESSION['other_brands'] = $other_brand_array;

}
?>