<?php
namespace Phppot;

use Phppot\DataSource;

class Order
{

    private $ds;

    function __construct()
    {
        require_once  'lib/DataSource.php';
        $this->ds = new DataSource();
    }

    function getAllOrders()
    {
        $query = "SELECT * FROM tbl_order";
        $result = $this->ds->select($query);
        return $result;
    }

    function getPdfGenerateValues($id)
    {
        $query = "SELECT * FROM product WHERE invoice='" . $id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getOrderItems($order_id)
    {
        // $sql = "SELECT tbl_order_items.*,tbl_product.product_title FROM tbl_order_items
        //         JOIN tbl_product ON tbl_order_items.product_id=tbl_product.id WHERE tbl_order_items.order_id='" . $order_id . "'";
        $query = "SELECT * FROM product WHERE invoice='" . $order_id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getProduct($product_id)
    {
        $query = "SELECT * FROM product WHERE invoice='" . $product_id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getReceiver($product_id)
    {
        $query = "SELECT * FROM receiver WHERE invoice='" . $product_id . "'";
        $result = $this->ds->select($query);
        return $result;
    }

    function getSender($product_id)
    {
        $query = "SELECT * FROM sender WHERE invoice='" . $product_id . "'";
        $result = $this->ds->select($query);
        return $result;
    }
}
