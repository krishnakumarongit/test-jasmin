function login_validate(){
$('#login_email').hide();
$('#login_password').hide();

$('#username').css('border-bottom','1px solid #e0e0e0');
$('#password').css('border-bottom','1px solid #e0e0e0');

if ($('#username').val() =="") {
   $('#username').css('border-bottom','1px solid #FF0000');
   $('#login_email').show();
   return false;
}

if ($('#password').val() =="") {
   $('#password').css('border-bottom','1px solid #FF0000');
   $('#login_password').show();
   return false;
}

return true;

}
