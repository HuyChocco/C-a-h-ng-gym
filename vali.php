<?php
// define variables and set to empty values

 $emailErr = "";


    $emailStr = $_REQUEST['e'];


 
  if ($emailStr=="") {
    $emailErr = "Email is required";
    echo $emailErr;
  } else {
    $email = test_input($emailStr);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
      echo $emailErr;
    }
  
}    
  
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>