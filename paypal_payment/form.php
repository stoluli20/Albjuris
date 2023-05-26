<title>Shipping & Adress</title>
<?php
session_start();
include __DIR__. "/../php/db.php";
include __DIR__. "/../html/header.php";

$_SESSION['item'] = $_GET['item'];

class Pay{

    private $con;

    public function __construct($con){
        $this->con = $con;
    }

    public function check(): bool
    {
        if($_REQUEST['country'] == '') return False;
        $country = $_REQUEST['country'];
        if($_REQUEST['first_name'] == '') return false;
        $first_name = $_REQUEST['first_name'];
        if($_REQUEST['last_name'] == '') return false;
        $last_name = $_REQUEST['last_name'];
        if($_REQUEST['address_1'] == '') return false;
        $address_line1 = $_REQUEST['address_1'];
        $address_line2 = $_REQUEST['address_2'];
        if($_REQUEST['city'] == '') return false;
        $city = $_REQUEST['city'];
        if($_REQUEST['zip_code'] == '') return false;
        $zip_code = $_REQUEST['zip_code'];
        if($_REQUEST['telephone'] == '') return false;
        $telephone = $_REQUEST['telephone'];
        if($_REQUEST['email'] == '') return false;
        $email = $_REQUEST['email'];

        $query = "INSERT INTO `Purchases` (country, first_name, last_name, adress_line1, adress_line2, city, zip_code, telephone, email) 
                  VALUES ('$country', '$first_name', '$last_name', '$address_line1', '$address_line2', '$city', '$zip_code', $telephone, '$email');";
                
        $result = mysqli_query($this->con, $query);

        if($result) return True;

        return False;
    }
}


$payment = new Pay($con);
if(isset($_REQUEST['continue'])){
    $check = $payment->check();
    if($check){
        $_SESSION['purchase'] = "paid";
        header("location: paypal_form.php");
    }
}

include('payment_form.html');

?>

<div class="summary">
    <h3>Order Summary</h3>
    <table width="100%">
        <tr>
            <td class="item">Items (<?php echo $_GET['item']; ?>)</td>
            <td class="price">$<?php echo $_GET['plan']; ?></td>
        </tr>
        <tr>
            <td>Shipping</td>
            <td class="price">$0</td>
        </tr>
        <tr class="end-row">
            <td>Tax</td>
            <td class="price">$0</td>
        </tr>

        <tr>
            <td>Estimated Cost</td>
            <td>$<?php 
                $price = $_GET['item'] * $_GET['plan'];
                echo $price;
            ?></td>
        </tr>
    </table>
</div>
