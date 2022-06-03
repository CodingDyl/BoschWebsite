<?php

include("connect.php");

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $select_users = mysqli_query($conn, "SELECT * FROM `customers` WHERE cusEmail = '$email' AND cusPassword = '$pass'") or die('query failed!');

    if (mysqli_num_rows($select_users) > 0) {
        $message[] = 'user already exists';
    } else {
        if ($pass != $cpass) {
            $message[] = 'passwords do not match';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message[] = 'invalid email entered';
        } else {
            mysqli_query($conn, "INSERT INTO `customers` (cusName, cusEmail , cusPassword) VALUES ('$name', '$email', '$pass')") or die('query failed');
            $message[] = 'registered successfully!';
            header('location:login.php');
        }
    }
}

?>

<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>register</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php

    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message">
                      <span>' . $message . '</span>
                      <i class="fas fa-times" onclick="this.parentElement.remove()"></i>
                    </div>
                   ';
        }
    }

    ?>

    <div class="formContainer">
        <form action="" method="post">
            <h3>register now</h3>
            <input type="text" name="name" placeholder="enter in your name" required class="box">
            <input type="email" name="email" placeholder="enter in your email" required class="box">
            <input type="password" name="password" placeholder="enter in your password" required class="box">
            <input type="password" name="cpassword" placeholder="confirm your password" required class="box">
            <input type="submit" name="submit" value="register now" class="btn">
            <p>already have an account ? <a href="login.php">login now</p>
        </form>
    </div>

</body>

</html>