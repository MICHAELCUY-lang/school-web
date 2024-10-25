<?php
    SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <title>Login</title>
</head>
<body>
    <div class="logo">
      <a href="index.php"><em>Arth</em>mica</a>
    </div>

    <div class="container">
        <div class="box form-box">
            <?php
             include("php/config.php");
             if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['id'] = $row['Id'];
                }else{
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Go Back</button>";
         
                }
                if(isset($_SESSION['valid'])){
                    header("Location: index2.php");
                }
              }else{

             }
            ?>
            <header> Login </header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email"> Email</label>
                    <input type="text" name="email" id="email" required>
                </div>

                <div class="field input">
                    <label for="password"> Password</label>
                    <input type="text" name="password" id="password" required>
                </div>

                <div class="field">
                    <input type="submit" name="submit" value="Login" required>
                </div>

                <div class="link">
                    Don't have account? <a href="register.php"> Sign Up</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>