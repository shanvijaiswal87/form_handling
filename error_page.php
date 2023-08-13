<!DOCTYPE html>
<html>
<head>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f8f8;
  }

  .error-container {
    width: 80%;
    max-width: 600px;
    margin: 100px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  h2 {
    margin-bottom: 20px;
    color: #d30000;
  }

  p {
    color: #d30000;
  }

  .back-to-form {
  text-align: center;
  margin-top: 20px;
}

.back-to-form a {
  text-decoration: none;
  color: #4CAF50;
  font-weight: bold;
}

.back-to-form a:hover {
  text-decoration: underline;
}

</style>
</head>
<body>

<div class="error-container">
  <h2>Error in Submitting Form</h2>
  <p>There was an error while processing your form submission. Please try again later.</p>
  <div class="back-to-form">
    <a href="form_contact.php">Back to Form</a>
  </div>
</div>


</body>
</html>
