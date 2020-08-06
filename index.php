<!DOCTYPE html>
<html lang="en">
<head>
	<title>Crud Application </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-6">
		  <h2>User Data</h2>
		  <a href="javascript:;" class="btn btn-primary" id="add_link">New</a> 
		  <input type="hidden" name="load" id="load" value="load">
		</div>
    </div>
	<div class="row">
	   <div class="col-md-12">
	      <table class="table" id="userdatatable">  
		       <thead>  
				  <tr>  
					<th>id</th>  
					<th>Name</th>  
					<th>Email</th>  
					<th>Phone No</th>  
					<th>City</th>  
					<th>Action</th>  
				  </tr>  
				</thead>  
				<tbody>  
				</tbody>
		  </table> 
		</div>
   </div>  
    <!-- Add Modal -->
	  <div class="modal fade" id="addModal" role="dialog">
		<div class="modal-dialog">
		 <form action="" method="post" name="inertform" id="inertform">
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Add User Data</h4>
			</div>
			<div class="modal-body">
			     <div class="row">
					<div class="col-md-6">
						<div class="form-group">
						 <div class="form-group">
						  <label for="name">Name:</label>
						  <input type="text" class="form-control" id="name" name="name" required />
						 </div>
						 <div class="form-group">
						  <label for="email">Email:</label>
						  <input type="email" class="form-control" id="email" name="email" required />
						 </div>
						<div class="form-group">
						  <label for="phoneno">Phone No:</label>
						  <input type="text" class="form-control" id="phoneno"  name="phoneno" required />
						</div>
						<div class="form-group">
						  <label for="city">City :</label>
						  <input type="text" class="form-control" id="city" name="city" required />
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="modal-footer"> 
				<input type="hidden" name="action" id="action" value="insert">
				<input type="submit" class="btn btn-success" id="insert_btn" value="Add">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>
		  </form>
		</div>
	  </div>
   
	  <!--Edit Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
		 <form action="" method="post" name="Updateform" id="Updateform">
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h4 class="modal-title">Update User Data</h4>
			</div>
			<div class="modal-body">
			  
			</div>
			<div class="modal-footer"> 
				<input type="hidden" name="action" id="action" value="update">
				<input type="submit" class="btn btn-success" id="update_btn" value="Update">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div>
		  </form>
		</div>
	  </div>
</div>
<script tye="text/javascript">
$(document).ready(function(){

//script to show add modal
$("#add_link").click(function(){
	  $("#addModal").modal("show");
 });
 
//script for view user data
var action = "load";
$.ajax({
	type: "post",
	url: "user_action.php",
	data: {action:action},
	success: function(data){
	  $("#userdatatable tbody").html(data);
	}
	
});

//script for insert user data
$("#inertform").submit(function(e){
	e.preventDefault();
	$.ajax({
		type: "post",
		url: "user_action.php",
		data: $("#inertform").serialize(),
		success: function(data){
			if(data==1){
			  alert("User data has been inserted successfully.");
			  location.href="index.php";
			}else{
				alert("Something went wrong");
			}
			
		}
		
	});
	return true;
})

//script for update user data
$("#Updateform").submit(function(){
	$.ajax({
		type: "post",
		url: "user_action.php",
		data: $("#Updateform").serialize(),
		success: function(data){
			if(data==1){
			  //alert("User data has been inserted successfully.");
			  location.reload();
			}else{
				alert("Something went wrong");
			}
			
		}
		
	});
	
})
});

//script for edit user data
function edit_user(id)
{
	var action= "edit";
	$.ajax({
		type: "post",
		url: "user_action.php",
		data: {action:action,id:id},
		success: function(data){
		   $("#myModal").modal("show");
		   $("#myModal .modal-body").html(data);
		}
	
	});
	
}

//script for delete user
function delete_user(id)
{
	var action= "delete";
	if(confirm("Are you you want to delete this user?")){
		$.ajax({
			type: "post",
			url: "user_action.php",
			data: {action:action,id:id},
			success: function(data){
				if(data==1){
				 alert("User has been deleted successfully");
				    location.reload();
				}else{
					alert("Something went wrong");
				}
			  
			}
		
		});
	}	
}

</script>
</body>
</html>
