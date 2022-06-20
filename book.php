<?php

include('connect.php');
session_start();

if (isset($_GET['date'])) {
    $date = $_GET['date'];
}

$customer_id = $_SESSION['user_id'];
$quote_price = $_SESSION['quotePrice'];
$quote_id = $_SESSION['quote_id'];

//creating reference
$ran1 = rand(10, 100);
$ran2 = rand(10, 100);
$ran3 = rand(10, 100);
$ref = "#Bos$ran1$ran2$ran3";
$payReceive = "pending";



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $paymentMethod = $_POST['payment'];
    mysqli_query($conn, "INSERT INTO `Booking` (bookName, bookEmail, bookDate, bookNumber, bookCusId, bookReference, bookMethod, bookPaymentReceived, bookQuoteId, bookAmount) VALUES ('$name', '$email', '$date', '$number', '$customer_id', '$ref', '$paymentMethod', '$payReceive', '$quote_id', '$quote_price')");

    $msg = "<div class='alert alert-success'>Booking Successfull</div>";
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Book Now</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>



    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1>
        <hr>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php echo isset($msg) ? $msg : ''; ?>
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Number</label>
                        <input type="text" class="form-control" name="number" required>
                    </div>
                    <div class="form-group">
                        <select id="payment" name="payment" class="form-control">
                            <option value="card">Card</option>
                            <option value="cash">Cash</option>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <div class="leave">
        <button onclick="bookingPage()" class="btn btn-primary">Go Back</button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function bookingPage() {
            window.location.href = "booking.php";
        }
    </script>
</body>

</html>