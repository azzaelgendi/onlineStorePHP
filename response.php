<!DOCTYPE html>
<head>
	<title>Response</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="javaValidate.js"></script>
</head>
<body>
	<!--This will be hidden if error happened-->
	<div id="myDiv">
		<h1>Thank You For Shopping With Us</h1>
		<h2>This is you order confimation </h2>
		<h3>To print your order press the button</h3>
		<br><br>
		<button id="button" onclick="print_pdf();"> Print the reciept </button>
	 </div>
	<main class="clear">
		<?php
		 // define variables and set to empty values
		 $nameErr = $streetErr = $cityErr = $phoneErr = $postalCodeErr = $qtyErr = $productErr =$totalErrors= $totalTaxes = $deliveryFees ="";
		 $name = $street = $city = $phone = $postalCode = $pCode = $qty = $product =  $price= $totlaPrice = $orderDate ="" ;
		 $productErr1 = $productErr2 = "";
		 $qty1 = $qty2 = $totlaPrice0 =0;
		 $price1 = $price2 = $totlaPrice1 = $totlaPrice2 =$taxes= 0;
		 
		 //using php arrays
		 $arrayTaxes = array("AB" => "0.05","BC" => "0.12", "MB" => "0.13", "NB"=> "0.15","NL"=> "0.15","NT" => "0.05", "NS" => "0.15","NU" => "0.05","ON" => "0.13","PE" => "0.15","QC" => "0.14975","SK"=> "0.11","YT" => "0.05");
		 $arrayProduct = array("Speakers"=>"20" ,"Head Phones" =>"30","bluetooth headphones"=>"50" ,"Select"=>"0");
		 //get date function
		 $orderDate="Date: " . date("m/d/Y") . "<br>";
	 //get data from the form and validate it
		 if ($_SERVER["REQUEST_METHOD"] == "POST")
		 {
			 if (empty($_POST["name"]))
			 {
			   $nameErr = "Name is required"."<br>";
			 }
			 else
			 {
				 $name = test_input($_POST["name"]);
				 // check if name only contains letters and whitespace
				 if (!preg_match("/^[a-zA-Z ]*$/",$name))
				 {
				   $nameErr = "Only letters and white space allowed"."<br>";
				 }
			 }
			//products and quantity
			 if (empty($_POST["qty"]) ||$_POST["qty"]==0 )
			 {
				 $qtyErr = "quantity is required"."<br>";
			 }
			 else
			 {
				 $qty= test_input($_POST["qty"]);
			 }
			 if (empty($_POST["product"])|| $_POST["product"]=="Select")
			 {
				 $productErr = "please select the product"."<br>";
				 
			 }
			 else
			 {
				 $product= test_input($_POST["product"]);
			 }
			if(empty($productErr) && empty($qtyErr) && $qty!=0)
			{
				if ($_POST["qty1"]==0 ||$_POST["product1"]=="Select")
				{
					$product1="";
					//$productErr1 ="";//"please select the product"."<br>";
				}
				else
				{
					$product1= test_input($_POST["product1"]);
					$qty1= test_input($_POST["qty1"]);
				}
			}
			if($qty1!=0 || $qty!=0)
			
			{
				if (empty($_POST["qty2"]) ||$_POST["qty2"]==0 ||empty($_POST["product2"])|| $_POST["product2"]=="Select")
				{
					
					//$productErr2 ="";//= "please select the product"."<br>";
					$product2 ="";
				}
				else
				{
					$qty2= test_input($_POST["qty2"]);
					$product2= test_input($_POST["product2"]);
				}
				if(!empty($product2) && $qty2==0)
				{
					$product2 ="";
				}
			}
			//validate city
			if (empty($_POST["city"]))
			{
				 $cityErr = "Name is required"."<br>";
			}
			 else
			 {
				 $city = test_input($_POST["city"]);
				 // check if name only contains letters and whitespace
				 if (!preg_match("/^[a-zA-Z ]*$/",$city))
				 {
					 $cityErr = "Only letters and white space allowed"."<br>";
				 }
			 }
			 if (empty($_POST["address"]))
			 {
			   $streetErr = "street address is required"."<br>";
			 }
			 else
			 {
			   $street = test_input($_POST["address"]);
			 }
			 //test phone
			 if (empty($_POST["phone"]))
			 {
			   $phone= "";
			 }
			 else
			 {
			   $phone = test_input($_POST["phone"]);
			   // check is valid (this regular expression )
			   if (!preg_match("/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/",$phone))
			   {
				 $phoneErr = "Invalid phone number"."<br>";
			   }
			 }
			 if (empty($_POST["code"]))
			 {
			   $postalCode = "";
			 }
			 else
			 {
			   $postalCode = test_input($_POST["code"]);
			   // check is valid (this regular expression )
			   if (!preg_match("/^[A-Za-z]\d[A-Za-z][ ]?\d[A-Za-z]\d$/",$postalCode))
			   {
				 $postalCodeErr = "Invalid postal code"."<br>";
			   }
			 }
			 if (empty($_POST["pCode"]))
			 {
			   $pCodeErr = "postal Code is required"."<br>";
			 }
			 else
			 {
			   $pCode= test_input($_POST["pCode"]);
			 }
		 }
		 //php function to manipulate strings
		 function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		 }
		 //get the taxes amount
		 foreach( $arrayTaxes as $key => $value )
		 {
			 if($pCode == $key)
			 {
				 $taxes = $value;
			 }
		 }
		 //get the price of the product
		 foreach( $arrayProduct as $key => $value )
		 {
			 if($product == $key)
			 {
				 $price = $value;
			 }
		 }
		 foreach( $arrayProduct as $key => $value )
		 {
			 if($product1 == $key)
			 {
				 $price1 = $value;
				 
			 }
		 }
		 foreach( $arrayProduct as $key => $value )
		 {
			 if($product2 == $key)
			 {
				 $price2 = $value;
			 }
		 }
		 //calculate total
		 
		
		 $totalTaxes =($price * $taxes)+($price1 * $taxes)+($price2 * $taxes);
		 $totlaPrice0=($price*$qty)+($price*$taxes);
		 $totlaPrice1=($price1*$qty1)+($price1*$taxes);
		 $totlaPrice2=($price2*$qty2)+($price2*$taxes);
		 $totlaPrice=$totlaPrice0+$totlaPrice1+$totlaPrice2;
		 
		 //add shipping cost and estimated delivery date
		 if($totlaPrice>=0.01 && $totlaPrice<=25.00)
		 {
			 $deliveryFees=3.00;
			 $totlaPrice = $totlaPrice +$deliveryFees;
			 $deliveryDate=date('m/d/Y',strtotime("+1 day", strtotime(date("m/d/Y"))));
		 }
		 if($totlaPrice>=25.01 && $totlaPrice<=50.00)
		 {
			 $deliveryFees=4.00;
			 $totlaPrice = $totlaPrice +$deliveryFees;
			 $deliveryDate=date('m/d/Y',strtotime("+1 day", strtotime(date("m/d/Y"))));
		 }
		 if($totlaPrice>=50.01 && $totlaPrice<=75.00)
		 {
			 $deliveryFees=5.00;
			 $totlaPrice = $totlaPrice +$deliveryFees;
			 $deliveryDate=date('m/d/Y',strtotime("+3 day", strtotime(date("m/d/Y"))));
		 }
		 if($totlaPrice>75.00)
		 {
			 $deliveryFees=6.00;
			 $totlaPrice = $totlaPrice +$deliveryFees;
			 $deliveryDate=date('m/d/Y',strtotime("+4 day", strtotime(date("m/d/Y"))));
		 }
			 //$totalErrors=$nameErr . $streetErr . $cityErr .$phoneErr .$postalCodeErr . $qtyErr .$productErr.$qtyErr1 .$productErr1.$qtyErr2 .$productErr2;
		 if(empty($totalErrors))
		 {
			//generate the recipet
				 echo "
				 <table>
					<tr>
						<th>$orderDate</th>
					 </tr>
					 <tr>
						 <th><h2>Shipping To</h2><th>
					 </tr>
					 <tr>
						 <th>Firstname</th>
						 <td>$name</td>
					 </tr>
					 <tr>
						 <th>Phone</th>
						 <td>$phone</td>
					 </tr>
					 <tr>
						 <th>Postal Code</th>
						 <td>$postalCode</td>
					 </tr>
					 <tr>
						 <th>provience Code</th>
						 <td>$pCode</td>
					 </tr>
					 <tr>
						 <th>Address</th>
						 <td>$street</td>
					 </tr>
					 <tr>
						 <th>City</th> 
						 <td>$city</td>
					 </tr>
					 <tr>
						 <th>Delivery Date</th> 
						 <td>$deliveryDate</td>
					 </tr>
				 <tr>
					 <th><h2>Order Details</h2></th>
				 </tr>
				 <tr>
					 <th>Product</th>
					 <th>Quantity</th>
					 <th>Unit Price</th>
				 </tr>
				 <tr>
					 <td>$product</td> 
					 <td>$qty</td>
					 <td>$price</td>
				 </tr>";
				 echo "
					<tr>
						<td>$product1</td> 
						<td>$qty1</td>
						<td>$price1</td>
					</tr>";
					echo "
					<tr>
						<td>$product2</td> 
						<td>$qty2</td>
						<td>$price2</td>
					</tr>";
				 echo"
					 <tr>
						 <th>Delivery Fees</th>
						 <th>Taxes</th>
						 <th>Total Amount</th>
					 </tr>
						 <tr>
						 <td>$deliveryFees</td> 
						 <td>$totalTaxes</td>
						 <td>$totlaPrice</td>
				 </tr>
				 <br><br>
				 "
				 ;
			 }
			 else
			 {
				  echo "$totalErrors";
				  echo "<script>HideMyDiv();</script>";
			 }
			 
		 ?>
		 
	 </main> 
</body>
</html>
