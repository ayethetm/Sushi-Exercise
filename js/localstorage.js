$(function()
{
	showTable();// call 'showTable' function
	$('.addtocart').click(function()
	{
		var id = $(this).data('id');
		var name = $(this).data('name');
		var price = $(this).data('price');
		var menu = {
			id : id,
			name : name,
			price : price,
			qty:1
		}
		//console.log(menu);

		var menuString = localStorage.getItem("menulist");
		var menuArray;

		if(menuString == null)
		{
			menuArray = Array();
		}
		else
		{
			menuArray = JSON.parse(menuString);
		}
		console.log(menuArray);

		//check item exists or not
		var status = false;

		$.each(menuArray,function(i,v)
		{
			if(id == v.id)
			{
				status = true;
				v.qty++;
			}
		})


		if(!status)
		{
			menuArray.push(menu);
		}

		var menuData = JSON.stringify(menuArray);

		localStorage.setItem('menulist',menuData);
		showTable();

	});


	//show tale function

	function showTable()
	{
		var menuString = localStorage.getItem('menulist');
		if(menuString)
		{
			$('#voucher-div').show();
			var menuArray = JSON.parse(menuString);
			var total = 0;
			var tbodyData = '';//for html code
			var tfootData = '';//for html code
			if(menuArray != 0)
			{
				//looping localstorage
				$.each(menuArray,function(i,v)
				{
					var name = v.name;
					var price = v.price;
					var qty = v.qty;
					var subtotal = price * qty;
					total += subtotal;

				tbodyData += `<tr>
						<td>
							${name}
						<span class="font-weight-lighter d-block">
						${price}
						</span>
						</td>

						<td>
						<button class="btn btn-secondary btn-sm plusBtn"
						data-id="${i}"> + </button>
						<span class="mx-2">${qty}</span>
						<button class="btn btn-secondary btn-sm minusBtn"
						data-id="${i}">-
						</button>
						</td>

						<td>
						${subtotal}</td>

						<td>
						<button class="btn btn-danger 
						btn-sm removeBtn" data-id="${i}">
						X
						</button>
						</td>
						</tr>`;
				});

				tfootData += `<tr>
								<td colspan="4">
								  <button class="btn btn-light 
								  btn-block" id="checkoutBtn">
								    Check Out
								    </button>
								</td>
							</tr>`;

				 $('tbody').html(tbodyData);
				 $('tfoot').html(tfootData);

			}
			else
			{
				//array is empty
				$('#voucher-div').hide();
			}
		}
		else
		{
			$('#voucher-div').hide();
		}
	}

	//Add quantity
	$('tbody').on('click','.plusBtn',function()
	{
		var id = $(this).data('id');

		var menuString = localStorage.getItem("menulist");

		var menuArray = JSON.parse(menuString);

		$.each(menuArray,function(i,v)
		{
			if(i == id)
			{
				v.qty++;
			}
		});

		var menuData = JSON.stringify(menuArray);
		localStorage.setItem('menulist',menuData);
		showTable();
	});


	//Minus quantity
	$('tbody').on('click','.minusBtn',function()
	{
		var id = $(this).data('id');
		var menuString = localStorage.getItem("menulist");
		var menuArray = JSON.parse(menuString);
		$.each(menuArray,function(i,v)
		{
			if(i == id)
			{
				v.qty--;
			}
		});
		var menuData = JSON.stringify(menuArray);
		localStorage.setItem('menulist',menuData);
		showTable();

	})

	//Remove item
	$('tbody').on('click','.removeBtn',function()
	{
		var id = $(this).data('id');

		console.log(id);
		var menuString = localStorage.getItem('menulist');
		var menuArray = JSON.parse(menuString);

		$.each(menuArray,function(i,v)
		{
			if (i == id) {
				menuArray.splice(id, 1);			

		}
		console.log(menuArray);
		});

		var menuData = JSON.stringify(menuArray);
		localStorage.setItem('menulist',menuData);

		showTable();
		});

		//checkout button
		$('tfoot').on('click','#checkoutBtn',function()
		{	
			localStorage.clear();
			showTable();

		})
})