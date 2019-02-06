//trim & first to upper function
function MyFirstUpper(str){
	str.value =str.value.toLowerCase().trim();
	str.value = str.value.charAt(0).toUpperCase()+ str.value.slice(1);
}
//all capital letters for postal code
function MyCapitalAll(text) {
    text.value=text.value.toUpperCase().trim();
}
//this is the button's submit events.
function ValidateForm() {
	alert("validate ");
    var errorBox="";
	//assign value to names
    var customerName =document.getElementById("name").value;
    var Address=document.getElementById("address").value;
    var proCode=document.getElementById("pCode").value;
    var postalCode=document.getElementById("code").value;
    var cityName=document.getElementById("city").value;
    var phone=document.getElementById("phone").value;
    var qty=document.getElementById("qty").value;
	var product=document.getElementById("product").value;
	var qty1=document.getElementById("qty1").value;
	var product1=document.getElementById("product1").value;
	var qty2=document.getElementById("qty2").value;
	var product2=document.getElementById("product2").value;
	//Required fields must be filled.

        if (customerName === "" || postalCode === "" )
        {
            errorBox += '<pre>'+"* Required fields must be filled! "+'<pre>';
        }
        if(qty === "0")
        {
            errorBox += "*select the number"+'<pre>';
        }
		if(product === "Select")
		{
			errorBox += "*please select on product at least"+'<pre>';
		}
        //validate postal Code
    	var validPostalCode=/^[A-Za-z]\d[A-Za-z][ ]?\d[A-Za-z]\d$/;
		var validCode=postalCode.match(validPostalCode);
		if (postalCode!=="")
        {
           if(!(validCode))
           {
				errorBox += "Enter a valid postal Code!"+'<pre>';
           }
           else
           {
                errorBox="";
           }
        }
		else
		{
			errorBox += "* postal code is a required fields must be filled! "+'<pre>';
        }
		//test phone number
		var validPhone = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
		var valid = phone.match(validPhone);
		if (phone!=="")
		{
			if (!valid)
			{
				errorBox += "Enter a valid Phone Number!"+'<pre>';
			}
		}
		else
		{
			errorBox += "* Phone number is a required fields must be filled! "+'<pre>';
		}
            document.getElementById("error").innerHTML=errorBox;
		//if the form validated with no errors go to the form action to print the recepit
        if(errorBox==="")
        {
            document.newForm.submit();
        }
        else{
			//show the error and display the hidden div
            var y = document.getElementById("errorMsg");
            y.style.display = "block";
            document.getElementById("error").innerHTML=errorBox;
        }
}
//function to print the recepit
function print_pdf()
{
    window.print();
}
//autocomplete city 
$( function() {
    var cityArray = ["Airdrie","Grande Prairie","Red Deer","Beaumont","Hanna","St. Albert","Bonnyville","Hinton","Spruce Grove","Brazeau","Irricana","Strathcona County","Breton","Lacombe","Strathmore","Calgary","Leduc","Sylvan Lake","Camrose","Lethbridge","Swan Hills","Canmore","McLennan","Taber","Didzbury","Medicine Hat","Turner Valley","Drayton Valley", "Olds","Vermillion","Edmonton","Onoway","Wood Buffalo","Ft. Saskatchewan","Provost"
    ];
    $( "#city" ).autocomplete({
      source: cityArray
    });
  } );
//hide  div on page load using it on php file when error found
function HideMyDiv(){
   // $("button").hide();
    var x = document.getElementById("myDiv");
        x.style.display = "none";
}
//hide div which contains error message on page load
$(document).ready(function(){
     $("#errorMsg").hide();
     });