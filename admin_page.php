<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

    <?php include 'admin_header.php'; ?>

    <!-- admin dashboard section starts  -->

    <section class="dashboard">

        <h1 class="title">dashboard</h1>

        <div class="box-container">

            <div class="box">
                <?php
                $total_completed = 0;
                $select_completed = mysqli_query($conn, "SELECT bookAmount FROM `Booking` WHERE bookPaymentReceived = 'True'") or die('query failed');
                if (mysqli_num_rows($select_completed) > 0) {
                    while ($fetch_completed = mysqli_fetch_assoc($select_completed)) {
                        $total_price = $fetch_completed['total_price'];
                        $total_completed += $total_price;
                    };
                };
                ?>
                <h3>R <?php echo $total_completed; ?>.00</h3>
                <p>completed payments</p>
            </div>

            <div class="box">
                <?php
                $select_quotes = mysqli_query($conn, "SELECT * FROM `quotes`") or die('query failed');
                $number_of_orders = mysqli_num_rows($select_quotes);
                ?>
                <h3><?php echo $number_of_orders; ?></h3>
                <p>quotes requested</p>
            </div>

            <div class="box">
                <?php
                $select_bookings = mysqli_query($conn, "SELECT * FROM `Booking`") or die('query failed');
                $number_of_bookings = mysqli_num_rows($select_bookings);
                ?>
                <h3><?php echo $number_of_bookings; ?></h3>
                <p>number of bookings</p>
            </div>

            <div class="box">
                <?php
                $select_users = mysqli_query($conn, "SELECT * FROM `customers` WHERE user_type = 'user' or user_type = ''") or die('query failed');
                $number_of_users = mysqli_num_rows($select_users);
                ?>
                <h3><?php echo $number_of_users; ?></h3>
                <p>normal users</p>
            </div>

            <div class="box">
                <?php
                $select_admins = mysqli_query($conn, "SELECT * FROM `customers` WHERE user_type = 'admin'") or die('query failed');
                $number_of_admins = mysqli_num_rows($select_admins);
                ?>
                <h3><?php echo $number_of_admins; ?></h3>
                <p>admin users</p>
            </div>

            <div class="box">
                <?php
                $select_account = mysqli_query($conn, "SELECT * FROM `customers`") or die('query failed');
                $number_of_account = mysqli_num_rows($select_account);
                ?>
                <h3><?php echo $number_of_account; ?></h3>
                <p>total accounts</p>
            </div>

        </div>

    </section>

    <!-- admin dashboard section ends -->









    <!-- custom admin js file link  -->
    <script src="javascript/admin_script.js"></script>

</body>

</html>