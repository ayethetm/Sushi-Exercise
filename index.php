	<?php
	require 'header.php';
	?>
	<header class="bg-danger">
		<div class="container text-white py-5">
			<div class="row">
				<div class="col-2 col-lg-1 py-2">
					<img src="photo/sumo.jpg" class="img-fluid w-100 h-100">
				</div>
				<div class="col-10 col-lg-11">
					<h1>相撲寿司</h1>
					<p class="m-0">メニューリスト</p>
				</div>
				<div class="col-md-2 ml-auto">
					<a href="menu.php"><button class="btn btn-info ml-auto">
					Show Menu List</button></a>
				</div>
			</div>
		</div>
	</header>

	<div class="container-fluid">
		<div class="row mx-2">
			<div class="col-md-7 shadow-lg p-3 mb-5 bg-white rounded">
				<div class="">
					<ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="pills-sushi-tab" data-toggle="pill" href="#pills-sushi" role="tab" aria-controls="pills-sushi" aria-selected="true">Sushi</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="bento" data-toggle="pill" href="#pills-bento" role="tab" aria-controls="pills-bento" aria-selected="false">Bento Boxes</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-ramen-tab" data-toggle="pill" href="#pills-ramen" role="tab" aria-controls="pills-ramen" aria-selected="false">Ramen</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-appet-tab" data-toggle="pill" href="#pills-appet" role="tab" aria-controls="pills-appet" aria-selected="false">Appetizers</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-rice-tab" data-toggle="pill" href="#pills-rice" role="tab" aria-controls="pills-rice" aria-selected="false">Rice</a>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-sushi" role="tabpanel" aria-labelledby="pills-sushi-tab">
							<div class="row" id="menu">
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-5" id="voucher-div">
				<div class="shadow-lg p-3 mb-5 bg-white rounded text-center ml-2">
					<h4>Payment</h4>
					<table class="table table-bordered text-left">
						<thead class="thead-light">
							<tr>
								<th>Name</th>
								<th>Qty</th>
								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody id="tbody_div">
							
						</tbody>
						<tfoot></tfoot>
					</table>
				</div>
			</div>
			
		</div>
			


		</div>

	</div>

	</div>
	

	<?php
	require 'footer.php';
	?>	
