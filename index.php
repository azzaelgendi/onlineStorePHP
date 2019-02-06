<!DOCTYPE html>
<html>
<!--A4 AZZA ELGENDY DUE MONDAY APRIL 9,2018-->
<head>
	<title>A4AZZAELGENDY</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="javaValidate.js"></script>
</head>
<body>
	<div id="photos">
		<h1>Select the product</h1>
		<nav>
			<ul>
			<li class="img1"><a href="#product"> <img src="1.jpg" width="70">Head Phones</a></li>
			<li class="img1"><a href="#product"> <img src="2.jpg" width="70">Bluetooth</a></li>
			<li class="img1"><a href="#product"> <img src="3.jpg" width="70">speakers</a></li>
		</ul>
		</nav>
	</div>
	<br><br>
	<br><br>
			<?php
		echo "Today is " . date("Y/m/d") . "<br>";
		?>
	<br><br>
	<br><br>
	<div id="content">
	<form name="newForm" method="post" action="response.php">
		<fieldset>
			<legend><h2>Select The product</h2></legend>
				Product1:
				<select id="product" name="product">
					<option id="select" name="select" value="Select">Select</option>
					<option id="headPhones" name="headPhones">Head Phones</option>
					<option id="bluetooth" name="bluetooth">bluetooth headphones</option>
					<option id="speakers" name="speakers">Speakers</option>
				</select>
				Quantity:
				<select id= "qty" name="qty">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
				<br><br>
				Product2:
				<select id="product1" name="product1">
					<option id="select" name="select">Select</option>
					<option id="headPhones" name="headPhones">Head Phones</option>
					<option id="bluetooth" name="bluetooth">bluetooth headphones</option>
					<option id="speakers" name="speakers">Speakers</option>
				</select>
				Quantity:
				<select id= "qty1" name="qty1">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
				<br></br>
				Product3:
				<select id="product2" name="product2">
					<option id="select" name="select">Select</option>
					<option id="headPhones" name="headPhones">Head Phones</option>
					<option id="bluetooth" name="bluetooth">bluetooth headphones</option>
					<option id="speakers" name="speakers">Speakers</option>
				</select>
				Quantity:
				<select id= "qty2" name="qty2">
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
		</fieldset>
			<br><br>
		<fieldset>
			<p><span class="error">* required field.</span></p>
			<legend><h2>Enter Your Mailing Information</h2></legend>
				Name: <input type="text" name="name" id="name"  onfocusout="MyFirstUpper(this);"><span class="error">*</span>
				<br><br>
				Address: <input type="text" name="address" id="address" onfocusout="MyFirstUpper(this);">
				<br><br>
				Province  Code:
						<select  id="pCode" name="pCode" required>
							<option value="AB">AB</option>
							<option value="BC">BC</option>
							<option value="MB">MB</option>
							<option value="NB">NB</option>
							<option value="NL">NL</option>
							<option value="NT">NT</option>
							<option value="NS">NS</option>
							<option value="NU">NU</option>
							<option value="ON">ON</option>
							<option value="PE">PE</option>
							<option value="QC">QC</option>
							<option value="SK">SK</option>
							<option value="YT">YT</option>
						</select>	  	
				<br><br>
				Postal Code: <input type="text" id="code" name="code"  onfocusout="MyCapitalAll(this);"><span class="error">*</span>
				<br><br>
				city: <input type="text" id ="city" name="city" onfocusout="MyFirstUpper(this);">
				<br><br>
				Phone Number:<input type="text" id ="phone" name="phone" ><span class="error">*</span>
				<br><br>	
		</fieldset>
		<br><br><br><br>
		<input onclick="ValidateForm();" type="button" id="button" value="Submit">
		<input id ="button" type="reset" value="Reset">
		<br><br>
	</form>
	</div>
	<div id="errorMsg"><span class="error" id="error">errorhere</span></div>
</body>
<footer></footer>
</html>
