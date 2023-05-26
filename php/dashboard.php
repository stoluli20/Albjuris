<?php

require '../html/header.php';

// Check if the user is logged in

if (!isset($_SESSION['email'])) {
    header('Location: ./php/login.php');
    exit();
}

// Get the user's name from the session
$email = $_SESSION['email'];

$con = mysqli_connect('localhost', 'root', '', 'albjuris');
// Fetch the user's first name from the database
$query = "SELECT firstname FROM users WHERE email = '$email'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $firstname = $row['firstname'];
} else {
    $firstname = ''; // Default value if the first name is not found
}

// Simulated user orders (replace with actual order retrieval logic)
// $userOrders = array(
//     array('order_id' => 1, 'product' => 'Product A', 'quantity' => 2),
//     array('order_id' => 2, 'product' => 'Product B', 'quantity' => 1),
//     array('order_id' => 3, 'product' => 'Product C', 'quantity' => 3)
// );
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
  
</head>

<body>
    <div class="container" style="  margin-top: 80px;
            margin-bottom: 80px;">
        <h1>Welcome, <?php echo $firstname; ?>!</h1>
        <h3>Your Orders:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userOrders as $order) : ?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['product']; ?></td>
                        <td><?php echo $order['quantity']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p><a href="logout.php">Log Out</a></p>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php require '../html/footer.html'; ?>
</body>

</html>

