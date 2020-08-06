<?php
class User{
	
  public $connect;  
  private $host = "localhost";  
  private $username = 'root';  
  private $password = '';  
  private $database = 'user_details';
  public function __construct()  
  {  
	   $this->database_connect();  
  } 
  public function database_connect()  
  {  
	   $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);  
  }   
  public function get_user_data($query)
  {
	  $output = '';  
	  $result = mysqli_query($this->connect, $query); 
	  while($row = mysqli_fetch_array($result))
	  {
	  
	      $output .= '  
			   <tr>  
				<td>'.$row['user_uid'].'</td>  
				<td>'.$row['name'].'</td>  
				<td>'.$row['email'].'</td>  
				<td>'.$row['phone'].'</td>  
				<td>'.$row['city'].'</td>  
				<td>
				<a href="javascript:;" id="edit_link" onClick="edit_user('.$row["user_uid"].')">Edits</a> 
				<a href="javascript:;" id="delete_link" onClick="delete_user('.$row["user_uid"].')">Delete</a>
				</td>  
			  </tr>  ';
	  }
		  return $output;  
  }
  public function insert_user_data($query)
  {
	 $result = mysqli_query($this->connect, $query); 
	 if($result)
	 {
	    return true;
	 }else{
		return false;
	 }
  }
  public function edit_user_data($query)
  {
	  $output = '';  
	  $result = mysqli_query($this->connect, $query); 
	  $row = mysqli_fetch_array($result);
	  $output.= '
			<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						 <div class="form-group">
						  <label for="name">Name:</label>
						  <input type="text" class="form-control" id="name" name="name" value="'.$row['name'].'" required />
						 </div>
						 <div class="form-group">
						  <label for="email">Email:</label>
						  <input type="email" class="form-control" id="email" name="email" value="'.$row['email'].'" required />
						 </div>
						<div class="form-group">
						  <label for="phoneno">Phone No:</label>
						  <input type="text" class="form-control" id="phoneno"  name="phoneno" value="'.$row['phone'].'" required />
						</div>
						<div class="form-group">
						  <label for="dob">DOB :</label>
						  <input type="text" class="form-control" id="city"  name="city" value="'.$row['city'].'" required />
						</div>
						<div class="form-group">
						  <input type="hidden" name="userid" id="userid" value="'.$row['user_uid'].'">
						</div>
					</div>
				</div>
			</div>
	  ';  
	  return $output;
  }
  public function update_user_data($query)
  {
	   $result= mysqli_query($this->connect, $query);
	   if($result)
		 {
			return true;
		 }else{
			return false;
		 }
  }
  public function delete_user_data($query)
  {
	  $result= mysqli_query($this->connect, $query);
	   if($result)
		 {
			return true;
		 }else{
			return false;
		 }
  }
	
}
?>