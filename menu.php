	<?php
	require 'header.php';
	?>
	
	<!-- add menu div -->
	<div class="container tb1" id="addMenudiv">
		<div  class="text-center py-4 display-4">Add New Menu</div>

		<form method="POST" action="addMenu.php" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Photo</label>
				<div class="col-sm-10">
					<input type="file" name="photo" 
					class="form-control-file">
				</div>
			</div>

			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="name" name="name" class="form-control" id="name">
				</div>
			</div>

			<div class="form-group row">
				<label for="price" class="col-sm-2 col-form-label">Price</label>
				<div class="col-sm-10">
					<input type="number" name="price" 
					class="form-control" id="price">
				</div>
			</div>
			
			<div class="form-group row py-3">
				<div class="col-sm-10">
					<button type="submit"  class="btn btn-primary">
					Add Menu</button>
					<a href="index.php">
						<button class="btn btn-info ml-auto">
					Show Item List</button></a>
				</div>
			</div>
		</form>
	</div>

	<!-- edit menu div -->
	<div class="container tb2" id="editMenudiv">
		<div  class="text-center py-4 display-4" >Edit Menu</div>

		<form action="updateMenu.php" method="POST" 
		enctype="multipart/form-data">

			<input type="hidden" name="edit_id" id="edit_id">

			<input type="hidden" name="edit_oldphoto" 
			id="edit_oldphoto">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Profile</label>
				<div class="col-sm-10">
					<!-- nav tabs -->
	           		<nav>
					  <div class="nav nav-tabs" id="nav-tab" 
					  	role="tablist">
					    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Profile</a>
					    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
					    New Profile</a>
					  </div>
					</nav>

					<div class="tab-content" id="nav-tabContent">
						<!-- old profile -->
						<div class="tab-pane fade show active mt-3" 
						id="nav-home" role="tabpanel" 
						aria-labelledby="nav-home-tab">
						    <img src="" id="edit_photo" 
						    class="img-fluid w-25 h-25">
						</div>
						<!-- new profile -->
						<div class="tab-pane fade show mt-3" 
						id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						   <input type="file" name="edit_newphoto"
						   class="form-control-file">
						</div> 
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">
				Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" 
					id="edit_name" name="edit_name">
				</div>
			</div>

			<div class="form-group row">
				<label for="price" class="col-sm-2 col-form-label">Price</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="edit_price" name="edit_price">
				</div>
			</div>

			<div class="form-group row py-3">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</form>
	</div>

<!-- result table -->
<div class="container">
	
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Price</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody id="tb">
				
			</tbody>
			<tfoot></tfoot>
		</table>
</div>

	<?php
	require 'footer.php';
	?>	
