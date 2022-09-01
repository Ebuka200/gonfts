<?php
use Phppot\Order;
require_once __DIR__ . '/../Model/Order.php';
function getHTMLPurchaseDataToPDF($result, $orderItemResult, $orderedDate, $due_date)
{
ob_start();
?>
<html>
<head>Receipt of Purchase - <?php  echo $result[0]["invoice"]; ?>
</head>
<body>
<div style="text-align:right;">
        <h2 style="text-align: center">SHIPMENT INVOICE FOR <?php echo $result[0]["invoice"]; ?></h2>
    </div>
    <div style="text-align: left;border-top:1px solid #000;">
        <!-- <div style="font-size: 24px;color: #666;">INVOICE</div> -->
    </div>
<table style="line-height: 1.5;">
    <tr><td><b style="color: orange">Invoice:</b> #<?php echo $result[0]["invoice"]; ?>
        </td>
        <!-- <td style="text-align:right;"><b>Receiver:</b></td> -->
    </tr>
    <tr>
        <td><b style="color: orange">Date:</b> <?php echo $orderedDate; ?></td>
        <!-- <td style="text-align:right;"><?php echo $result[0]["fullname"] . ' ' . $result[0]["customer_last_name"]; ?></td> -->
    </tr>
    <tr>
        <td><b style="color: orange">Payment Due:</b><?php echo $due_date; ?>
        </td>
        <!-- <td style="text-align:right;"><?php echo $result[0]["customer_company"]; ?></td> -->
    </tr>
<tr>
<td></td>
<!-- <td style="text-align:right;"><?php echo $result[0]["customer_address"]; ?></td> -->
</tr>
</table>



<?php
$total = 0;
$productModel = new Order();
foreach ($orderItemResult as $k => $v) {
    // $price = $orderItemResult[$k]["item_price"] * $orderItemResult[$k]["quantity"];
    // $total += $price;
    $productResult = $productModel->getReceiver($orderItemResult[$k]["invoice"]);
    $senderResult = $productModel->getSender($orderItemResult[$k]["invoice"]);
    ?>

<div class="container" style="display: flex">
<p><b>Sender</b>: <br/>
Full Name: <?php echo $senderResult[0]["fullname"] ?><br/>
Phone : <?php echo $senderResult[0]["phone"]  ?><br/>
Address: <?php echo $senderResult[0]["location"] ?><br/>
</p>


    <p style="text-align: right"><b>Receiver</b>:<br/>
FullName: <?php echo $productResult[0]["fullname"] ?><br/>
Phone: <?php echo $productResult[0]["phone"]; ?><br/>
Address: <?php echo $productResult[0]["location"]; ?><br/>
</p>
<?php
}
?>

</div>




<div></div>
    <div style="border-bottom:1px solid #000;">
        <table style="line-height: 2;">
            <tr style="font-weight: bold;border:1px solid #cccccc;background-color:#f2f2f2;">
                <td style="border:1px solid #cccccc;width:200px; background-color: orange; color: white">Consignment</td>
                <td style = "text-align:right;border:1px solid #cccccc;width:85px; background-color: orange; color: white">Shipment</td>
                <td style = "text-align:right;border:1px solid #cccccc;width:75px; background-color: orange; color: white">Quantity</td>
                <td style = "text-align:right;border:1px solid #cccccc; background-color: orange; color: white">Weight</td>
            </tr>
<?php
$total = 0;
$productModel = new Order();
foreach ($orderItemResult as $k => $v) {
    // $price = $orderItemResult[$k]["item_price"] * $orderItemResult[$k]["quantity"];
    // $total += $price;
    $productResult = $productModel->getProduct($orderItemResult[$k]["invoice"]);
    ?>
    <tr> <td style="border:1px solid #cccccc;"><?php echo $productResult[0]["consignment"]; ?></td>
                    <td style = "text-align:right; border:1px solid #cccccc;"><?php echo $orderItemResult[$k]["shipment"]; ?></td>
                    <td style = "text-align:right; border:1px solid #cccccc;"><?php echo $orderItemResult[$k]["quantity"]; ?></td>
                    <td style = "text-align:right; border:1px solid #cccccc;"><?php echo $orderItemResult[$k]["weight"]; ?></td>
               </tr>
<?php
}
?>
<!-- <tr style = "font-weight: bold;">
    <td></td><td></td>
    <td style = "text-align:right;">Total ($)</td>
    <td style = "text-align:right;"><?php echo number_format($total, 2); ?></td>
</tr> -->
</table></div>
<p><u>Contact Details</u>:<br/>
Bank: American Bank of Commerce<br/>
A/C: 05346346543634563423<br/>
BIC: 23141434<br/>
</p>
<p><i>Note: Please send a remittance advice by email to vincy@phppot.com</i></p>
</body>
</html>

<?php
return ob_get_clean();
}
?>