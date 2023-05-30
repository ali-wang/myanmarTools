<?php
namespace aliwang\myanmarTools\interfaces;

interface UpdateOrderInterface{
    public function updateOrderSuccess($order_id);
    public function updateOrderError($order_id,$str);
    public function updateOrderPending($order_id);
}