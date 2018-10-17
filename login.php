<?php
session_start();

$fname = $lname = $email = $pwd = $pwdcheck = $pno = $address = $dob = $verify = $hash ="";
$pwdErr = "";
$tempid = "";
$con=mysqli_connect("localhost", "id1404423_yashagrawal", "yash12321","id1404423_rdbms") ;
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  
    $email = test_input($_POST["email"]);
    $pwd = md5(test_input($_POST["pwd"]));
    
    if($email=="root@admin.com" && $pwd == md5("admin"))
    {
      $_SESSION["uid"]="admin";
      header('Location: admin.php');
    }  
    else
    {
      $search = "SELECT email FROM temp_user WHERE email='".$email."'"; 
      $result = mysqli_query($con,$search);
      $rowcount = mysqli_num_rows($result);
      if($rowcount > 0)
      {
        $search = "SELECT email FROM temp_user WHERE email='".$email."' AND verify='1'"; 
        $result = mysqli_query($con,$search);
        $rowcount = mysqli_num_rows($result);
        if($rowcount > 0)
        {
            $abc="SELECT pass,id FROM temp_user WHERE email='".$email."' "; 
            $result = mysqli_query($con,$abc);
            while( $row = $result->fetch_assoc())
            {
              $pwdcheck = $row["pass"];
              $tempid = $row["id"];
            }
            if ($pwd == $pwdcheck) 
            {
               $_SESSION["uid"] = $tempid;
                header('Location: welcome.php');
            }
            else
            {
               $pwdErr = "Password is incorrect.";
            }
        }
        else 
        {
          $search = "SELECT email FROM temp_user WHERE email='".$email."' AND verify='0'"; 
          $result = mysqli_query($con,$search);
          $rowcount = mysqli_num_rows($result);
          if($rowcount > 0)
          {
            $pwdErr = "Please verify your account via the link in your email.";
          }
        }
      }
      else
      {
        $pwdErr = "Email not found. Please signup first if you are a new user.";
      }

    mysqli_close($con);
    $cookie_name = "pwdErr";
    $cookie_value = $pwdErr;
    setcookie($cookie_name,$cookie_value, time() + 86400, "/");
    header("Location: index.php");
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
