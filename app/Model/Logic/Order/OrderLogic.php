<?php declare(strict_types=1);

namespace App\Model\Logic\Order;

/**
 * 订单服务
 */
class OrderLogic
{
    /**
     * 生成订单
     *
     * @param string $product_name 商品名字
     * @param int    $quantity     购买数量
     * @param int    $user_id      用户 ID
     *
     * @return array
     */
    public  function generateOrder($product_name, $quantity, $user_id): array
    {
        $price = 1000;
        $amount = $price * $quantity;
        $order = [
            'order_no'     => uniqid($user_id . time() . $amount), // 订单号
            'product_name' => $product_name,                       // 商品名称
            'price'        => $price,                              // 商品单价
            'quantity'     => $quantity,                           // 商品数量
            'amount'       => $amount                              // 订单总额
        ];
        return $order;
    }
}