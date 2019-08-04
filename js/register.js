function registerValidate(){
$('#reg_name').hide();
$('#reg_email').hide();
$('#reg_password').hide();
$('#reg_cpassword').hide();
$('#reg_cpassword_confirm').hide();


$('#fullname').css('border-bottom','1px solid #e0e0e0');
$('#password').css('border-bottom','1px solid #e0e0e0');
$('#email').css('border-bottom','1px solid #e0e0e0');
$('#cpassword').css('border-bottom','1px solid #e0e0e0');

if ($('#fullname').val() =="") {
   $('#fullname').css('border-bottom','1px solid #FF0000');
   $('#reg_name').show();
   return false;
}

if ($('#email').val() =="") {
   $('#email').css('border-bottom','1px solid #FF0000');
   $('#reg_email').show();
   return false;
}

if ($('#password').val() =="") {
   $('#password').css('border-bottom','1px solid #FF0000');
   $('#reg_password').show();
   return false;
}

if ($('#cpassword').val() =="") {
   $('#cpassword').css('border-bottom','1px solid #FF0000');
   $('#reg_cpassword').show();
   return false;
}

if ($('#password').val() != $('#cpassword').val()) {
   $('#password').css('border-bottom','1px solid #FF0000');
   $('#cpassword').css('border-bottom','1px solid #FF0000'); 
   $('#reg_cpassword_confirm').show();
   return false;
}



return true;

}
