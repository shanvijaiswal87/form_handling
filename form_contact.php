<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'form_data';


$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.container {
  width: 80%;
  margin: auto;
  padding: 20px;
  align-items: center;
}

h2 {
  margin-left:35%;
  margin-bottom: 20px;
}

.errorColor {
  color: #D30000;
}

form {
  background-color: #f4f4f4;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

form label {
  display: block;
  margin-bottom: 8px;
  font-weight: bold;
}

form input[type="text"],
form input[type="number"],
form textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

form input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 20px ;
  border-radius: 3px;
  cursor: pointer;
  

}

form input[type="submit"]:hover {
  background-color: #45a049;
}

</style>
</head>
<body>

<?php

$nameError = $emailError = $phoneError = $subjectError = "";
$name = $email = $phone = $subject = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $phone = test_input($_POST["phone"]);
  $subject = isset($_POST["subject"]) ? test_input($_POST["subject"]) : "";
  $message = isset($_POST["message"]) ? test_input($_POST["message"]) : "";
 

  if (empty($name)) {
    $nameError = "Name is mandatory";
  } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
    $nameError = "Only letters allowed";
  }

  if (empty($email)) {
    $emailError = "Email is mandatory";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailError = "Invalid email format";
  }

  if (empty($phone)) {
    $phoneError = "Phone No. is mandatory";
  } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
    $phoneError = "Invalid phone format";
  }



 

  if (empty($nameError) && empty($emailError) && empty($phoneError) && empty($subjectError) ) {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $insert_query = "INSERT INTO contact_form (name, phone, email, subject, message, ip_address) VALUES ('$name', '$phone', '$email', '$subject', '$message', '$ip_address')";
    
    if ($conn->query($insert_query) === TRUE) {



      // $to = "siteowner@example.com"; 
      // $subject = "New User Registration";
      // $email_message = "A new user has registered on your website.\n\n";
      // $email_message .= "Name: $name\n";
      // $email_message .= "Email: $email\n";
      // $email_message .= "Phone: $phone\n";
      // $email_message .= "Subject: $subject\n";
      // $email_message .= "Message: $message\n";
      
      // $headers = "From: shanvijaiswal34@gmail.com"; 
      
      // mail($to, $subject, $email_message, $headers);





      header("Location: thank_you.php" );
     
      
    } else {
      header("Location: error_page.php" );
      
      
      
    }
    exit();

  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}?>


<div class="container">
  <h2><u> Form Validation using PHP</u></h2>
  <p><span class="errorColor">* mandatory field</span></p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="name">Full Name:</label>
    <input type="text" name="name">
    <span class="errorColor">* <?php echo $nameError;?></span>

    <label for="phone">Phone No.:</label>
    <input type="number" name="phone">
    <span class="errorColor">* <?php echo $phoneError;?></span>
    
    
    <label for="email">E-mail:</label>
    <input type="text" name="email">
    <span class="errorColor">* <?php echo $emailError;?></span>
    
    <label for="message">Subject:</label>
    <textarea name="message" ></textarea>
    <span class="errorColor">* <?php echo $subjectError;?></span>


    <label for="message">Message:</label>
    <textarea name="message" rows="6" cols="24"></textarea>
    
    <input type="submit" name="submit" value="Submit">
  </form>

  <?php if (isset($nameError) || isset($emailError) || isset($phoneError) || isset($subjectError)) { ?>
    <div class="errorColor">
        <?php
        if (!empty($nameError)) echo "<p>$nameError</p>";
        if (!empty($emailError)) echo "<p>$emailError</p>";
        if (!empty($phoneError)) echo "<p>$phoneError</p>";
        if (!empty($subjectError)) echo "<p>$subjectError</p>";
        ?>
    </div>
<?php } ?>
</div>

</body>
</html>
