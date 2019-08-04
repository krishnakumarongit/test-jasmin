function validate(){
$('#forgot_invalid_email').hide();
$('#email').css('border-bottom','1px solid #e0e0e0');
if ($('#email').val() =="") {
   $('#email').css('border-bottom','1px solid #FF0000');
   $('#forgot_invalid_email').show();
   return false;
}

return true;
}
