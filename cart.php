
<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title>6th String App </title>
	
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
   
    <!-- Font Awesome Icons -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Ionicons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   
    <!-- Bootstrap 3.3.2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" type="text/javascript"></script>
	<script  src="https://code.jquery.com/jquery-3.6.0.min.js"  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="  crossorigin="anonymous"></script>
 	
	 </head>
      <!-- Right side column. Contains the navbar and content of the page -->
     <br><br>
	 <style>
.item {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
}

.btn-pay {
  background-color: #C800Da;
  border: 0;
  color: #fff;
  font-weight: 600;
}

.fa-ticket {
  color: #0e1fa1;
}
	 </style>
	 <script>
	 

	 
	 </script>
 <div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-xl-7 col-lg-8 col-md-7">
      <div class="border border-gainsboro p-3">
		
        <h2 class="h6 text-uppercase mb-0">Cart Total (2 Items): <strong class="cart-total">300.38</strong> <select  class="form-control" id="converter" style="width:30%;">
					<option value="Rs">Rs</option>
					<option value="Dollar">Dollar</option>
					<option value="Pound">Pound</option>
					<option value="Euro">Euro</option>
					<option value="Yen">Yen</option>
					<option value="Yuan">Yuan</option>
		</select> </h2> 
		
      </div>

      <div class="border border-gainsboro p-3 mt-3 clearfix item">
        <div class="text-lg-left col-md-3">
          <img src="images/product1.jpg"  class="img-thumbnail"> 
        </div>
        <div class="col-lg-5 col-5 text-lg-left">
          <h3 class="h6 mb-0">Rice<br>
            <small>Cost:
			
			200.00/ea</small>
			<h3 class="h6 mb-0"> <br><small><small>Disscount:10%</small></small></h3>
		 
          </h3>
        </div>
        <div class="product-price d-none">200</div>
        <div class="pass-quantity col-lg-1 col-md-2 col-sm-2">
          <label  class="">Quantity</label>
          <input class="form-control" name="quantity" class="quantity" type="number" value="1" min="1">
        </div>
        <div class="col-lg-2 col-md-1 col-sm-2 product-line-price pt-4">
          <span class="product-line-price">200
          </span>
		</div>
		 <div class="col-lg-2 col-md-1 col-sm-2 product-line-discount pt-4">
          
		  <span   style="display:none" class="product-line-discount">10
          </span>
        </div>
        <div class="remove-item pt-4">
          <button class="remove-product btn-light">
            Delete
          </button>
        </div>
      </div>

      <div class="border border-gainsboro p-3 mt-3 clearfix item">
        <div class="text-lg-left col-md-3">
          <img src="images/product2.jpg"  class="img-thumbnail"> 
        </div>
        <div class="col-lg-5 col-5 text-lg-left">
          <h3 class="h6 mb-0">Juice<br><small><small>Cost: $45.00/ea</small></small></h3>
		  
        </div>
        <div class="product-price d-none">45.00</div>
        <div class="pass-quantity col-lg-1 col-md-2 col-sm-1">
          <label  >Quantity</label>
          <input class="form-control" name="quantity" type="number" value="1" min="1">
        </div>
        <div class="col-lg-2 col-md-1 col-sm-2 product-line-price pt-4">
          <span class="product-line-price">45.00</span>
		 
          </span>
        </div>
		 <div class="col-lg-2 col-md-1 col-sm-2 product-line-discount pt-4">
          
		  <span  style="display:none" class="product-line-discount">0
          </span>
        </div>
        <div class="remove-item pt-4">
          <button class="remove-product btn-light">
            Delete
          </button>
        </div>
      </div><!-- item -->
	  
	  <div class="border border-gainsboro p-3 mt-3 clearfix item">
        <div class="text-lg-left col-md-3">
          <img src="images/product3.jpg"  class="img-thumbnail"> 
        </div>
        <div class="col-lg-5 col-5 text-lg-left">
          <h3 class="h6 mb-0">Pen<br><small><small>Cost: 46.00/ea</small></small></h3>
		  <h3 class="h6 mb-0"> <br><small><small>Disscount:50%</small></small></h3>
		 
        </div>
        <div class="product-price d-none">46.00</div>
	
        <div class="pass-quantity col-lg-1 col-md-2 col-sm-1">
          <label  >Quantity</label>
          <input class="form-control"  name="quantity" type="number" value="1" min="1">
        </div>
		
        <div class="col-lg-3 col-md-2 col-sm-1 product-line-price pt-4">
          <span class="product-line-price">46.00</span>
		   
        </div>
		 <div class="col-lg-2 col-md-1 col-sm-2 product-line-discount ">
          
		  <span  style="display:none" class="product-line-discount">50
          </span>
        </div>
		
        <div class="remove-item pt-4">
          <button class="remove-product btn-light">
            Delete
          </button>
        </div>
      </div><!-- item -->
    </div>

    <div class="col-xl-3 col-lg-4 col-md-5 totals">
      <div class="border border-gainsboro px-3">
        <div class="border-bottom border-gainsboro">
          <p class="text-uppercase mb-0 py-3"><strong>Order Summary</strong></p>
        </div>
        <div class="totals-item d-flex align-items-center justify-content-between mt-3">
          <p class="text-uppercase">Subtotal</p>
          <p class="totals-value" id="cart-subtotal">291.00</p>
        </div>
        <div class="totals-item d-flex align-items-center justify-content-between">
          <p class="text-uppercase">Estimated Tax</p>
          <p class="totals-value" id="cart-tax">52.38</p>
        </div>
		  <div class="totals-item d-flex align-items-center justify-content-between">
          <p class="text-uppercase">Discount</p>
          <p class="totals-value" id="cart-discount">43.00
           
			</p>
        </div>
		
        <div class="totals-item totals-item-total d-flex align-items-center justify-content-between mt-3 pt-3 border-top border-gainsboro">
          <p class="text-uppercase"><strong>Total</strong></p>
          <p class="totals-value font-weight-bold cart-total">300.38</p>
        </div>
      </div>
      <a href="#" class="mt-3 btn btn-pay w-100 d-flex justify-content-between btn-lg rounded-0">Pay Now <span class="totals-value cart-total">300.38</span></a>
    </div>
  </div>
</div><!-- container -->
    <!-- jQuery 2.1.3 -->
  
	<script >
$(document).ready(function() {

   /* Set rates */
   var taxRate = 18;
   var fadeTime = 300;

	const old_amount= new Array(); 
	var j=0;
	$('.item').each(function() {
	var x=0;
	old_amount[j] = parseFloat($(this).children('.product-line-price').text());
	j=j+1;
	});
   
   /* Assign actions */
   $('.pass-quantity input').change(function() {
     updateQuantity(this);
   });

   $('.remove-item button').click(function() {
     removeItem(this);
   });

 $('#converter').change(function(){
	 
	Currency(); 
	Calculate();
	 
 });
   /* Recalculate cart */
   function recalculateCart() {
		 var subtotal = 0;
		 var discount = 0;
		/* Sum up row totals */
		 $('.item').each(function() {
		   subtotal += parseFloat($(this).children('.product-line-price').text());
		   
		   discountpercentage =parseFloat($(this).children('.product-line-discount').text());
		   discount +=parseFloat($(this).children('.product-line-price').text())*discountpercentage/100;
		 });

		 /* Calculate totals */
		 var tax = subtotal * taxRate/100;
		 var total = subtotal + tax- discount;

		 /* Update totals display */
		 $('.totals-value').fadeOut(fadeTime, function() {
		   $('#cart-subtotal').html(subtotal.toFixed(2));
		    $('#cart-discount').html(discount.toFixed(2));
		   $('#cart-tax').html(tax.toFixed(2));
		   
		   $('.cart-total').html(total.toFixed(2));
		   if (total == 0) {
			 $('.checkout').fadeOut(fadeTime);
		   } else {
			 $('.checkout').fadeIn(fadeTime);
		   }
		   $('.totals-value').fadeIn(fadeTime);
		 });
   }


   /* Update quantity */
   function updateQuantity(quantityInput) {
     /* Calculate line price */
     var productRow = $(quantityInput).parent().parent();
     var price = parseFloat(productRow.children('.product-price').text());
     var quantity = $(quantityInput).val();
	 var discount= parseFloat(productRow.children('.product-line-discount').text()); 
	 var discountedPrice=price * discount/100;
     var linePrice = (price) * quantity;
	
     /* Update line price display and recalc cart totals */
     productRow.children('.product-line-price').each(function() {
       $(this).fadeOut(fadeTime, function() {
         $(this).text(linePrice.toFixed(2));
         recalculateCart();
         $(this).fadeIn(fadeTime);
       });
     });
   }

   /* Remove item from cart */
   function removeItem(removeButton) {
     /* Remove row from DOM and recalc cart total */
     var productRow = $(removeButton).parent().parent();
     productRow.slideUp(fadeTime, function() {
       productRow.remove();
       recalculateCart();
     });
   }
   
   function Currency(){
		y = document.getElementById("converter").value;
		return y;
	}
 
function Calculate(){
	y = Currency();
    //var amount=0;
	var i=0;
	var amount= new Array(); 
	var quantity=0;
	switch(y){
		case "Rs":
			$('.item').each(function() {
				//quantity= $(this).children('.pass-quantity input').val();
				amount[i]=parseFloat(old_amount[i]);
				$(this).children('.product-line-price').text(amount[i].toFixed(2));
				$(this).children('.product-price').text(amount[i].toFixed(2));
				i=i+1;
			});
			
		break;
		case "Dollar":
			$('.item').each(function() {
				var quantity= $(this).find('.pass-quantity input[name=quantity]').val();
				
				amount1=(parseFloat(old_amount[i]) * 51.89);
				amount[i]=amount1*quantity;
				
				$(this).children('.product-line-price').text(amount[i].toFixed(2));
				$(this).children('.product-price').text(amount[i].toFixed(2));
				i=i+1;
			});
			
		break;

		case "Pound":
			$('.item').each(function() {
				var quantity= $(this).find('.pass-quantity input[name=quantity]').val();
				amount1=parseFloat(old_amount[i]) *72.39;
				amount[i]=amount1*quantity;
				$(this).children('.product-line-price').text(amount[i].toFixed(2));
				$(this).children('.product-price').text(amount[i].toFixed(2));
				i=i+1;
			});
			
			//document.getElementById("value2").value = x * 72.39;
		break;

		case "Euro":
			$('.item').each(function() {
				var quantity= $(this).find('.pass-quantity input[name=quantity]').val();
				amount1=parseFloat(old_amount[i]) *63.84;
				amount[i]=amount1*quantity;
				$(this).children('.product-line-price').text(amount[i].toFixed(2));
				$(this).children('.product-price').text(amount[i].toFixed(2));
				i=i+1;
			});
			//document.getElementById("value2").value = x * 63.84;
		break;

		case "Yen":
			$('.item').each(function() {
				var quantity= $(this).find('.pass-quantity input[name=quantity]').val();
				amount1=parseFloat(old_amount[i]) *0.49;
				amount[i]=amount1*quantity;
				$(this).children('.product-line-price').text(amount[i].toFixed(2));
				$(this).children('.product-price').text(amount[i].toFixed(2));
				i=i+1;
			});
			//document.getElementById("value2").value = x * 0.49;
		break;

		case "Yuan":
			$('.item').each(function() {
				var quantity= $(this).find('.pass-quantity input[name=quantity]').val();
				amount1=parseFloat(old_amount[i]) *8.20;
				amount[i]=amount1*quantity;
				$(this).children('.product-line-price').text(amount[i].toFixed(2));
				$(this).children('.product-price').text(amount[i].toFixed(2));
				i=i+1;
			});
			//document.getElementById("value2").value = x * 8.20;
		break;
	}
 recalculateCart();
} 
  
 });
</script>


<!-- /.row -->



        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
