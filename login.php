<?php

include("connect.php");
session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select_users = mysqli_query($conn, "SELECT * FROM `customers` WHERE cusEmail = '$email' AND cusPassword = '$pass'") or die('query failed!');

    if (mysqli_num_rows($select_users) > 0) {
        $row = mysqli_fetch_assoc($select_users);

        if ($row['user_type'] == 'admin') {

            $_SESSION['admin_name'] = $row['cusName'];
            $_SESSION['admin_email'] = $row['cusEmail'];
            $_SESSION['admin_id'] = $row['cusId'];
            header('location:admin_page.php');
        } else {

            $_SESSION['user_name'] = $row['cusName'];
            $_SESSION['user_email'] = $row['cusEmail'];
            $_SESSION['user_id'] = $row['cusId'];
            $_SESSION['user_number'] = $row['cusNumber'];
            header('location:home.php');
        }
    } else {
        $message[] = 'incorrect password or email entered!';
    }
}

?>

<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login</title>

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
            <h3>login northcliff auto</h3>
            <input type="email" name="email" placeholder="enter in your email" required class="box">
            <input type="password" name="password" placeholder="enter in your password" required class="box">
            <input type="submit" name="submit" value="login now" class="btn">
            <p>don't have an account ? <a href="register.php">register now</p>
        </form>
    </div>

</body>

</html>