<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

if (isset($_POST['update_order'])) {

    $booking_update_id = $_POST['booking_id'];
    $update_payment = $_POST['update_payment'];
    mysqli_query($conn, "UPDATE `Booking` SET bookPaymentReceived = '$update_payment' WHERE bookID = '$booking_update_id'") or die('query failed');
    $message[] = 'payment status has been updated!';
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `Booking` WHERE bookID = '$delete_id'") or die('query failed');
    header('location:admin_bookings.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookings</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="orders">

        <h1 class="title">bookings received</h1>

        <div class="box-container">
            <?php
            $select_booking = mysqli_query($conn, "SELECT * FROM `Booking`") or die('query failed');
            if (mysqli_num_rows($select_booking) > 0) {
                while ($fetch_orders = mysqli_fetch_assoc($select_booking)) {
            ?>
                    <div class="box">
                        <p> user id : <span><?php echo $fetch_orders['bookCusId']; ?></span> </p>
                        <p> booking date : <span><?php echo $fetch_orders['bookDate']; ?></span> </p>
                        <p> name : <span><?php echo $fetch_orders['bookName']; ?></span> </p>
                        <p> number : <span><?php echo $fetch_orders['bookNumber']; ?></span> </p>
                        <p> email : <span><?php echo $fetch_orders['bookEmail']; ?></span> </p>
                        <p> total price : <span>R <?php echo $fetch_orders['bookAmount']; ?>.00</span> </p>
                        <p> payment method : <span><?php echo $fetch_orders['bookMethod']; ?></span> </p>
                        <form action="" method="post">
                            <input type="hidden" name="booking_id" value="<?php echo $fetch_orders['bookID']; ?>">
                            <select name="update_payment">
                                <option value="" selected disabled><?php echo $fetch_orders['bookPaymentReceived']; ?></option>
                                <option value="pending">pending</option>
                                <option value="completed">completed</option>
                            </select>
                            <input type="submit" value="update" name="update_order" class="option-btn">
                            <a href="admin_bookings.php?delete=<?php echo $fetch_orders['bookID']; ?>" onclick="return confirm('delete this order?');" class="delete-btn">delete</a>
                        </form>
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">no bookings placed yet!</p>';
            }
            ?>
        </div>

    </section>










    <!-- custom admin js file link  -->
    <script src="javascript/admin_script.js"></script>

</body>

</html>