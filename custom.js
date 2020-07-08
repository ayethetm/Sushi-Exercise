$(document).ready(function(){
	getMenulist();
	getItemList();
	$('#editMenudiv').hide();

	function getItemList(){
		$.get('menulist.json',function(response){
			if(response){
				console.log(typeof(response));
				var menuObjArray=response;
				var html='';
				var j=1;
				

			$.each(menuObjArray,function(i,v)
			{
				html+=`			
					<div class="col-md-4" id="c">
						<div class="card">
						<div class="card-img-top">
						<span class="price badge 
						badge-dark badge-pill">
						${v.price}</span>
						<img src="${v.photo}" 
						class="w-100 h-100" 
						alt="card1.jpg">
						</div>
						<div class="card-body">
						<h5 class="card-title text-center 
						text-uppercase">
						${v.name}</h5>						
						</div>
						<div class="card-footer">
						<button class="btn btn-outline-danger 
						btn-block addtocart" 
						data-id="${i}" data-name="${v.name}" 
						data-price="${v.price}">
						Add to Cart</button>
						</div>				
						</div>
					</div>`;
			})

				$('#menu').html(html);

			}
		})
	}
	function getMenulist(){
		$.get('menulist.json',function(response){
			if(response){
				console.log(typeof(response));
				//obj
				var menuObjArray=response;
				var html='';
				var j=1;
				$.each(menuObjArray,function(i,v){
					html+=`<tr>
					<td>${j++}</td>
					<td>${v.name}</td>
					<td>${v.price}</td>
					
					<td>
					<button class="btn btn-outline-primary">
					<i class="fas fa-info-circle"></i></button>
					
					<button class="btn btn-outline-warning edit " 
					data-id="${i}">
					<i class="fas fa-edit"></i></button>
					
					<button class="btn btn-outline-danger delete"  
					data-id="${i}">
					<i class="fas fa-trash-alt"></i></button></td>

							</tr>`
				})
				$('#tb').html(html);

			}
		})
	}

	$('tbody').on('click','.delete',function(){
					var id=$(this).data('id');
					console.log(id);
					var ans=confirm('Are you sure want to delete?');
					if(ans){
						$.post(
							'deletemenu.php',{id:id},function(data){
								getMenulist();
							})
					}
				})
	
	$('tbody').on('click','.edit',function()
	{
					$('#editMenudiv').show();
					$('#addMenudiv').hide();
					var id=$(this).data('id');
					$.get('menulist.json',function(response)
					{
						var menuObjArray=response;
						var name=menuObjArray[id].name;
						var price=menuObjArray[id].price;
						var photo=menuObjArray[id].photo;
						
						console.log("Name="+name);
						console.log("Price="+price);
						console.log("Name="+photo);

						$('#edit_name').val(name);
						$('#edit_price').val(price);
						
						/*img*/
						$('#edit_photo').attr('src',photo);
						$('#edit_id').val(id);
						$('#edit_oldphoto').val(photo);
						
					})
					
	})



});
