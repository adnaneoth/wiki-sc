<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="public/assets/css/login.css">

  <title>Document</title>
</head>

<body>
<div class="animated bounceInDown">
    <div class="container">
      <span class="error animated tada" id="msg"></span>
      <form name="form1" class="box" onsubmit="return checkStuff()"method="post" action="./index.php?route=signinaction">
        <h4><span></span></h4>
        <h5>Sign in to your account.</h5>
          <input type="text" name="email" placeholder="Email" autocomplete="off">
          <i class="typcn typcn-eye" id="eye"></i>
          <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
          <label>
            <input type="checkbox">
            <span></span>
            <small class="rmb">Remember me</small>
          </label>
          <a href="#" class="forgetpass">Forget Password?</a>
          <input type="submit" value="Sign in" class="btn1">
        </form>
          <a href="#" class="dnthave">Don’t have an account? Sign up</a>
    </div> 
         <div class="footer">
        <span>Made with <i class="fa fa-heart pulse"></i> <a href="https://www.google.de/maps/place/Augsburger+Puppenkiste/@48.360357,10.903245,17z/data=!3m1!4b1!4m2!3m1!1s0x479e98006610a511:0x73ac6b9f80c4048f"><a href="https://codepen.io/lordgamer2354">By Anees Khan</a></span>
      </div>
  </div>
</body>

<script>   
var pwd = document.getElementById('pwd');
var eye = document.getElementById('eye');



//  Validation

function checkStuff() {
  var email = document.form1.email;
  var password = document.form1.password;
  var msg = document.getElementById('msg');
  
  if (email.value == "") {
    msg.style.display = 'block';
    msg.innerHTML = "Please enter your email";
    email.focus();
    return false;
  } else {
    msg.innerHTML = "";
  }
  
   if (password.value == "") {
    msg.innerHTML = "Please enter your password";
    password.focus();
    return false;
  } else {
    msg.innerHTML = "";
  }
   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (!re.test(email.value)) {
    msg.innerHTML = "Please enter a valid email";
    email.focus();
    return false;
  } else {
    msg.innerHTML = "";
  }
}</script>

</html>