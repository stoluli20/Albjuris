<?php
  include __DIR__ . '/../database/db_connection.php';
  if(isset($_REQUEST['Submit'])){
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $message = $_REQUEST['text'];
        if($name!="" and $email!="" and $message!=""){
        $query = "INSERT INTO Contact (Name, Email, Message) VALUES ('$name', '$email', '$message')";
        mysqli_query($con, $query);
        header("Location: contact.php");
        }
      }
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php require __DIR__ . '/../html/header.html';?>
    <div style="text-align:center;" class="jumbotron bg-secondary">
      <h1 class="display-4 text-white">Contact Us</h1>
      <p class="lead text-white">If you have any particular questions you want to ask or just contact us for more information, use the form below.</p>
    </div>
    <div class="container">
      <form method="POST" action="">      
        <input name="name" type="text" class="feedback-input" placeholder="Name" required/> <br><br> 
        <input name="email" type="text" class="feedback-input" placeholder="Email" required/> <br> <br>
        <textarea name="text" class="feedback-input" placeholder="Comment" required></textarea> <br> <br>
        <input name="Submit" type="submit" value="Submit"/>
      </form>
    </div>
    </div>
  </div>
  <?php require __DIR__ . '/../html/footer.html'; ?>
</body>
</html>
<style>
form { 
    max-width:420px; margin:50px auto; 
}

.feedback-input {
  color:white;
  font-family: Helvetica, Arial, sans-serif;
  font-weight:500;
  font-size: 18px;
  color: black;
  border-radius: 5px;
  line-height: 22px;
  border:2px solid #5d5c5c;
  transition: all 0.3s;
  padding: 13px;
  margin-bottom: 15px;
  width:100%;
  box-sizing: border-box;
  outline:0;
}

.feedback-input:focus { border:2px solid #5d5c5c; }

textarea {
  height: 150px;
  line-height: 150%;
  resize:vertical;
}

[type="submit"] {
  font-family: 'Montserrat', Arial, Helvetica, sans-serif;
  width: 100%;
  background-color: blue;
  border-radius:5px;
  border:0;
  cursor:pointer;
  color:white;
  font-size:24px;
  padding-top:10px;
  padding-bottom:10px;
  transition: all 0.3s;
  margin-top:-4px;
  font-weight:700;
}
[type="submit"]:hover { background:#5d5c5c; }
</style>
