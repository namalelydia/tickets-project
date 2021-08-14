<!DOCTYPE html>
<?php
require 'mysqli_connection.php';
?>
<html> 
	<head>
		<meta charset="utf-8">
		<title> ~Buy Tickets~ </title>
		<link rel="stylesheet" type="text/css" href="css/app.css">
	</head>
	<body>

		<span id="app"></span>

		<?php
		   
		   $id = $_GET['TICKET_ID'];

    	   $tickets = "SELECT * FROM tickets WHERE TICKET_ID = $TICKET_ID";

    	   $records = $mysqli_Connection->query($tickets); 

    	   foreach ($records as $key => $value) {

    		  	$TICKET_ID = $value['TICKET_ID'];
    		  	$TICKET_NAME = $value['TICKET_NAME'];
    		  	$TICKET_AMOUNT = $value['TICKET_AMOUNT'];

	        }


    	 ?>

	    <main class="py-4">
	        <div class="container">

	        	<h1>TOURISM TICKETS FOR DIFFERENT NATIONAL PARKS IN THE PEARL OF AFRICA</h1><br>
	        	<h4><?php echo $TICKET_NAME ?> @ <?php echo $TICKET_AMOUNT ?></h4>

	        	<hr>

	        	

	        	<div class="row">
	        		 
	        		 <div class="col-md-6 col-sm-12">

	        		 	<img src="images/airtelmoney.png" width="100px" height="100px">

	        		 	<img src="images/mtn.png" width="100px" height="100px">

	        		 	<img src="images/credit_card.png" width="100px" height="100px">

	        		 	<hr>

	        		 	<form>
						  <script src="https://checkout.flutterwave.com/v3.js"></script>
						  <label>~Name~</label>
						  <input type="text" id="name" class="form-control">

						  <input type="hidden" id="TICKET_ID" value="<?php echo $ID ?>">

						  <input type="hidden" id="AMOUNT" value="<?php echo $price ?>">

						  <label>~Phone number~</label>
						  <input type="text" id="PHONE_NUMBER" class="form-control">

						  <label>~Email address~</label>
						  <input type="text" id="EMAIL_ADDRESS" class="form-control">

                           MAKE A CHOICE FROM THE AVAILABLE NATIONAL PARKS
                           <br>
                           <input type ="checkbox" name="Muchisionfalls N.P" value ="yes"/>Muchisionfalls N.P
                           <input type ="checkbox" name="Lakemburo N.P" value ="yes"/>Lakemburo N.P
                           <input type ="checkbox" name="Ngahinga N.P" value ="yes"/>Ngahinga N.P
                           <input type ="checkbox" name="Mtrwenzori N.P" value ="yes"/>Mtrwenzori N.P
                           <br>
						  <hr>

						  <button type="button" id="make_payment" class="btn btn-success">Pay Now</button>
						</form>

						1. save the data but set it to pending [status]<br>
					    2. launch the payment widget<br>
					    3. After payment return the staus and verify the trasaction<br>
					    4. Send the SMS to the customer<br>
	        		 	
	        		 </div>	        	 
	        		
	        	</div>

	                

	        </div>
	    </main>

	    <script src="js/app.js"></script>

	    <script>  	
           $(document).ready( function(){

           	  $("#make_payment").click(function(){

           	  	$.ajax({

			            type: "POST",

			            url: "ininiate_payment.php",

			        data: {  

			          tx_ref: "<?php echo "Tour-".time() ?>",

			          plan_id: $("#TICKET_ID").val(), 

			          amount: $("#AMOUNT").val(),	

			          name: $("#TICKET_NAME").val(),	

			          phone_number: $("#PHONE_NUMBER").val(),			            


			        },
			          success: function(tx_ref){

			          	console.log(tx_ref);

			          	makePayment(tx_ref);

			        }
			    });
           	  })
           })


           function makePayment(tx_ref){

           	 FlutterwaveCheckout({
			      public_key: "",
			      tx_ref: tx_ref,
			      amount: $("#amount").val(),
			      currency: "UGX",
			      country: "UG",
			      payment_options: "credit card,mobilemoneyuganda",
			      redirect_url:  
			        "verify_payment.php",
			      meta: {
			         
			      },
			      customer: {
			        email: $("#EMAIL_ADDRESS").val(),
			        phone_number: $("#PHONE_NUMBER").val(),
			        name: $("#NAME").val(),
			      },
			      callback: function (data) {
			        console.log(data);
			      },
			      onclose: function() {
			        // close modal
			      },
			      customizations: {
			        title: "TOURISM TICKETS TO THE PEARL OF AFRICA ",
			        description: "Payment for tourism",
			        logo: "https://assets.piedpiper.com/logo.png",
			      },
			    });


           }

	    </script>





	</body>
</html>