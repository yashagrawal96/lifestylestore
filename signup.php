<?php
session_start();

$fname = $lname = $email = $pwd = $pwdcheck = $pno = $address = $dob = $verify = $hash = "";
$con=mysqli_connect("localhost", "id1404423_yashagrawal", "yash12321","id1404423_rdbms") ;
if (mysqli_connect_errno())
{
  $err = "Failed to connect to MySQL: " . mysqli_connect_error();
  $_SESSION["error"] = $err;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $email = test_input($_POST["email"]);
    $search = "SELECT email FROM temp_user WHERE email='".$email."'"; 
    $result=mysqli_query($con,$search);
    $rowcount=mysqli_num_rows($result);
    if($rowcount > 0)
    {
      $emailErr = "Email already registered"; 
      echo "<script type = \"text/javascript\"> window.alert(\"Email already exists!\") </script>";
    }

    $pwd = md5(test_input($_POST["pwd"]));
    $pno = test_input($_POST["pno"]);
    $address = test_input($_POST["address"]);
    $dob = test_input($_POST["dob"]);
  
    $hash = md5(rand(0,1000));

    $sql = "INSERT INTO temp_user (fname, lname, dob, address, pno, email, pass,hash) VALUES ('$fname', '$lname', '$dob','$address','$pno','$email','$pwd','$hash')";
    mysqli_query($con,$sql);
    


$msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';


$fromName = 'Lifestyle Store';
$fromEmail = 'lifestylestoreverify@gmail.com';
$to      = $email; 
$subject = 'Signup | Verification';
$message = "
 
Thank you for signing up!<br>
Your account has been created, you can login with the following Username: <br> $email <br>after you have activated your account by pressing the url below.<br>

 
https://lifestyle-store.000webhostapp.com/verify.php?email=$email&hash=$hash<br>
 
";
                     
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:  ' . $fromName . ' <' . $fromEmail .'>' . " \r\n" .
            'Reply-To: '.  $fromEmail . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
mail($to, $subject , $message,$headers);


mysqli_close($con);
$cookie_name = "registered";
$cookie_value = 1;
setcookie($cookie_name,$cookie_value, time() + 86400, "/");
header("Location: index.php");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
