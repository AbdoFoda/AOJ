//Problem: Hints are shown even when form is valid
//Solution: Hide and show them at appropriate times
var $password = $("#password");
var $confirmPassword = $("#confirm_password");
var $email=$("#Email");
var $handle=$("#Handle");
//Hide hints
$("form span").hide();

function isPasswordValid() {
  return $password.val().length > 8;
}
function isValidEmail() {
  return $email.val().length>10;
}
function arePasswordsMatching() {
  return $password.val() === $confirmPassword.val();
}
function isValidHandle(){
  return $handle.val().length>=4;
}

function canSubmit() {
  return isPasswordValid() && arePasswordsMatching() && isValidEmail() &&isValidHandle();
}

function passwordEvent(){
    //Find out if password is valid  
    if(isPasswordValid()) {
      //Hide hint if valid
      $password.next().hide();
    } else {
      //else show hint
      $password.next().show();
    }
}

function confirmPasswordEvent() {
  //Find out if password and confirmation match
  if(arePasswordsMatching()) {
    //Hide hint if match
    $confirmPassword.next().hide();
  } else {
    //else show hint 
    $confirmPassword.next().show();
  }
}
function emailEvent(){
  if(isValidEmail()){
    $email.next().hide();
  }else{
    $email.next().show();
  }
}

function handleEvent(){
  if(isValidHandle()){
    $handle.next().hide();
  }else{
    $handle.next().show();
  }
}


function enableSubmitEvent() {
  $("#submit").prop("disabled", !canSubmit());
}

//When event happens on password input
$password.focus(passwordEvent).keyup(passwordEvent).keyup(confirmPasswordEvent).keyup(enableSubmitEvent);

//When event happens on confirmation input
$confirmPassword.focus(confirmPasswordEvent).keyup(confirmPasswordEvent).keyup(enableSubmitEvent);

$email.focus(emailEvent).keyup(emailEvent).keyup(enableSubmitEvent);

$handle.focus(handleEvent).keyup(handleEvent).keyup(enableSubmitEvent);

enableSubmitEvent();