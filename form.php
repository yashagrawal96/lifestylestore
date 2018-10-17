<?php
// define variables and set to empty values
$fname = $lname = $email = $pwd = $pwdcheck = $pno = $address = $dob = "";
$fnameErr = $lnameErr = $emailErr = $pwdErr = $pwdcheckErr = $pnoErr = $addressErr = $dobErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "First name is required";
  } 
  else {
    $fname = test_input($_POST["fname"]);
    if (!preg_match("/^[a-zA-Z]/",$fname)) {
      $fnameErr = "Only letters allowed"; 
    }
  }
  if (empty($_POST["lname"])) {
    $lnameErr = "Last name is required";
  } 
  else {
    $lname = test_input($_POST["lname"]);
    if (!preg_match("/^[a-zA-Z]/",$lname)) {
      $lnameErr = "Only letters allowed"; 
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } 
  else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  if (empty($_POST["pwd"])) {
    $pwdErr = "Password is required";
  } 
  else {
    $pws = test_input($_POST["pwd"]);
  }
  if (empty($_POST["pwdcheck"])) {
    $pwdcheckErr = "Re enter password";
  } 
  else {
    $pwdcheck = test_input($_POST["pwdcheck"]);
    if($pwdcheck!=$pwd){
      $pwdcheckErr = "Passwords do not match";
    }
  }
  if (empty($_POST["pno"])) {
    $pnoErr = "Phone number is required";
  } 
  else {
    $pno = test_input($_POST["pno"]);
    if (!preg_match("/^[0-9]/",$lname)) {
      $lnameErr = "Only numbers allowed"; 
    }
  }
  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } 
  else {
    $address = test_input($_POST["address"]);
  }
  if (empty($_POST["dob"])) {
    $dobErr = "DOB is required";
  } 
  else {
    $dob = test_input($_POST["dob"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>