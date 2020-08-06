<?php
include 'user.php';  
$object = new User(); 

extract($_POST);
if(isset($action))  
{
if($action == "load")
{
	$query="SELECT * FROM user_info where is_deleted='0'";
	echo $object->get_user_data($query);  
}
if($action == "insert")
{
	$created_date=date('Y-m-d');
	$modified_date=  date('Y-m-d');
	$query="INSERT INTO user_info (name,email,phone,city,created_date,modified_date) VALUES('".$name."','".$email."',".$phoneno.",'".$city."','".$created_date."','".$modified_date."')";
	$result= $object->insert_user_data($query);  
	echo $result;  
}
if($action == "edit")
{
	$query="SELECT * FROM user_info where user_uid=$id";
	echo $object->edit_user_data($query);  
}
if($action == "update")
{
	$modified_date=  date('Y-m-d');
	$query="UPDATE user_info SET name='".$name."',email='".$email."',phone='".$phoneno."',city='".$city."',modified_date='".$modified_date."' where user_uid=$userid";
	$result= $object->update_user_data($query);  
	echo $result; 
	
}
if($action == "delete")
{
	$query="UPDATE user_info SET is_deleted='1' where user_uid=$id";
	$result= $object->delete_user_data($query);  
	echo $result;  
}
}
?>