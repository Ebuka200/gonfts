<?php
use Phppot\Order;

require_once  './Model/Order.php';
$orderModel = new Order();
$result = $orderModel->getPdfGenerateValues($_GET["invoice"]);
$orderItemResult = $orderModel->getOrderItems($result[0]["invoice"]);
if (! empty($result)) {
    require_once  "./lib/PDFService.php";
    $pdfService = new PDFService();
    $pdfService->generatePDF($result, $orderItemResult);
}