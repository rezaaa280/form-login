<?php
    require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
    <div class="div-content">
        <h1>Register</h1>
        <div class="div-box">
            <form action="" method="post">
                <div>
                    <label for="email">email</label>
                    <input type="email" name="email" id="email">
                </div>

                <div>
                    <label for="password">password</label>
                    <input type="password" name="password" id="password">
                </div>

                <div>
                    <input type="submit" name="submit" value="Register">
                </div>
            </form>

            <?php
                if(isset($_POST['submit'])){
                    $email  = htmlspecialchars($_POST['email']);
                    $password  = htmlspecialchars($_POST['password']);
                    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $query = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
                    $count = mysqli_num_rows($query);

                    if($count > 0){
                        echo "cannot register. this email is existed in database";
                    }
                    else {
                        $queryInsert = mysqli_query($con, "INSERT INTO users (email, password) VALUES
                        ('$email', '$encryptedPassword')");

                        if($queryInsert) {
                            echo "Register Success";
                        }
                    }
                }
            ?>
        </div>
    </div>
    </div>
</body>
</html>