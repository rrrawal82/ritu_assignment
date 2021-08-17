<!DOCTYPE html>
<?php 

//include 'include/connect.php';

 ?>
<!-- jQuery 2.1.3 -->
<script  src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="  crossorigin="anonymous"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>	

<!-- Font Awesome Icons -->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<html>
  
<section class="content-header">
  <h1>
	Products
	<small>Information</small>
  </h1>
</section>
		
<!-- Main content -->
 <section class="content">
     <!-- Info boxes -->
	 <div>
		  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addModal">Add Product</button>
	 </div>
     <div id="feesmessage" style="display:none"  class="alert alert-success">
		 <span id="message"></span>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="table table-responsive">
				<table  style="cursor:pointer" id="myTable" class="table table-striped table-hover">
					<thead>
						<tr >
							<th width="7%">Sr. No.</th>
							<th>Product Image</th>
							<th>Product Name</th>
							<th>Product Description</th>
							<th>Quantity</th>
							<th>Brand</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div><!-- /.row -->

   
	<script >
	$(document).ready(function() {
	
	  var dNow = new Date();
      var currentdate = dNow.getFullYear() + '' + (dNow.getMonth() + 1) + '' + dNow.getDate() + '' + dNow.getHours() + '' + dNow.getMinutes() + '' + dNow.getSeconds();
      var filenm = "Students" +""+currentdate;
	  var table = $('#myTable').DataTable({
            autoWidth: false,
            lengthChange: false,
            pageLength: 15,
            paging: true,
            ordering: true,
			info:true,
            language: {
                "paginate": {
                    "previous": "<",
                    "next": ">",
                },
                "zeroRecords": "No applications fit these qualifications"
            },
            pagingType: "simple_numbers",
            order: [[1, 'dsc']],
            dom: 'Bfrtip',
            ajax: {
                url: 'ajax/getproducts.php?action=get_product',
                type: 'POST',
               
            },
			buttons: [
                {
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                        {
                            extend: 'excel',
                            title: filenm,
                            exportOptions: {
                            	//columns: [0,1,2,3,4,5,8,9,10,11,12,13,14,15,16,17,18,19,20,21,6,22,23,24,25,26,27,28]
                            }
							
                        },
                       
                        {
                           extend: 'pdf',
                            title: filenm,
                            exportOptions: {
                               // columns: [0,1,2,3,4,5,8,9,10,11,12,13,14,15,16,17,18,19,20,21,6,22,23,24,25,26,27,28]
                            }
                        },
                    ]
                }
            ],
        });

	//edit student button clicked----
	$(document).on("click",".edit-product",function(){
		var product_id=$(this).data('id');
		$.ajax({
            type: 'POST',
            url: "ajax/getproducts.php?action=edit_product&product_id='" + product_id + "'",
            cache: false,
            success: function (data) {
                    $("#EditModal .modal-body").html( data );
			}
        });
	});	
	
	
	$(document).on('submit','.frmproduct1',function (e) {	
			//e.preventDefault();
		
			var $form = $(this);
			// check if the input is valid using a 'valid' property
			if (!$form.valid) return false;
			var data = new FormData();
			var form_data = $('.frmproduct1').serializeArray();
			var input = document.getElementById('product_image');
			var file=input.files[0];

			data.append("product_image",file);
			$.each(form_data, function (key, input) {
				data.append(input.name, input.value);
			});

			data.append('action', 'save_edited');
			$.ajax ({
				type: 'POST',
				url: 'ajax/getproducts.php',
				processData: false,
				contentType: false,
				data: data,
				beforeSend: function(){
					//$(".loader").show();
				},
				success:function(data){
						alert(data);
					$('#addModal').modal('toggle');
					$('#myTable').DataTable().ajax.reload();
					
				},
				complete:function(data){
					// Hide image container
				 }
			});
    });
	
	$('#frmproduct').submit(function (e) {
			e.preventDefault();
			var $form = $(this);
			// check if the input is valid using a 'valid' property
			if (!$form.valid) return false;
			var data = new FormData();
			var form_data = $('#frmproduct').serializeArray();
			var input = document.getElementById('product_image');
			var file=input.files[0];

			data.append("product_image",file);
			$.each(form_data, function (key, input) {
				data.append(input.name, input.value);
			});

			data.append('action', 'save_product');
			$.ajax ({
				type: 'POST',
				url: 'ajax/getproducts.php',
				processData: false,
				contentType: false,
				data: data,
				beforeSend: function(){
					//$(".loader").show();
				},
				success:function(data){
						alert(data);
					$('#addModal').modal('toggle');
					$('#myTable').DataTable().ajax.reload();
					
				},
				complete:function(data){
					// Hide image container
				 }
			});
		});
			
			
});

function deleteProduct(id)
{
	var ControllerURL="ajax/getproducts.php?action=deleteProduct&id=" + id ;
	$.ajax({
			type:'POST',
			url:ControllerURL,
			success:function(data){
				if (id != "")
				{
					alert(data);
					//toastr.success('Product deleted Successfully!');
					$('#myTable').DataTable().ajax.reload();
				}
			}
	});
}

</script>
<script>
function active(obj)
 {

    obj.class="active";
}
</script>



<!--view Modal -->
<div id="viewModal" class="modal fade modal-success" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" id="modal-title-HoldResch">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"  id="modal-title" >Student Details </h4>
      </div>
      <div class="modal-body">
      			
		</div>
			
			 <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <input type="button" class="btn btn-outline" value="Print" onclick="printContent('page-inner')" /> 			</div>
		</form>	
     </div>
</div>
</div>
<!---->

<!--Edit Modal -->
<div id="EditModal" class="modal fade modal-info" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
		<div class="modal-header" id="modal-title-HoldResch">
			
			<span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"  id="modal-title" >Edit Product Details </h4>
		</div>
		<div class="modal-body"></div>
		<div class="modal-footer">
			
		</div>
    </div>
</div>
</div>

  <div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Product</h4>
        </div>
        <div class="modal-body">
         <form action="#" method="post"  enctype="multipart/form-data" id="frmproduct" >
				<fieldset>
					
						<div class="row">
							<div class="col-sm-4"><b> Product Name:</b><span class="error" required>*</span></div>
							<div class="col-sm-8">
								<input type="text" placeholder="Product Name..." class="form-control" name="pname" data-value-missing=”Translate(‘Required’)”  required=" " >
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4"><b> Product Description:</b><span class="error" required>*</span></div>
							<div class="col-sm-8">
								<input type="textarea" placeholder=" Product Description..." class="form-control" name="pdescription" data-value-missing=”Translate(‘Required’)”  required=" " >
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4"><b> Quantity:</b><span class="error" required>*</span></div>
							<div class="col-sm-2">
								<input type="number" placeholder="Quantity..." class="form-control" name="pquantity" data-value-missing=”Translate(‘Required’)”  required=" " >
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4"><b> Brand:</b><span class="error" required>*</span></div>
							<div class="col-sm-8">
								<input type="textarea" placeholder="Brand..." class="form-control" name="pbrand" data-value-missing=”Translate(‘Required’)”  required=" " >
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4"><b> Price:</b><span class="error" required>*</span></div>
							<div class="col-sm-3">
								<input type="textarea" placeholder="Price.." class="form-control" name="pprice" data-value-missing=”Translate(‘Required’)”  required=" " >
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4"><b> Image:</b><span class="error" required>*</span></div>
							<div class="col-sm-8">
								<input type='file' id="product_image" name='product_image' accept=".png,.jpeg,.jpg" multiple >
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="col-sm-5"></div>
							<div class="col-sm-2">
							  <button type="submit" name="Save" id="Save" value="Save"   class="btn btn-primary btn-block btn-flat form-control btn_submit">Save</button>
							</div><!-- /.col -->
						</div>
						
					</div>
				</div>
				<br>
	</fieldset>
	</form>
 </div>
</div>

<!-- /.content-wrapper -->
<!---->
 </section><!-- /.content -->
    
