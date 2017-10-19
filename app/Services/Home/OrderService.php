<?php

namespace App\Services\Home;

use App\Repositories\CommodityRepository;
use App\Repositories\OrderRepository;
use Exception;

class OrderService
{
    protected $order, $orderDetail, $commodity;

    public function __construct(OrderRepository $order,
                                CommodityRepository $commodity)
    {
        $this->order = $order;
        $this->commodity = $commodity;
    }
    
    /**
     * 获取符合条件的订单
     *
     * @param null $status
     * @return mixed
     */
    public function get($status = null)
    {
        if (empty($status)) {
            return $this->order->getByUserAll();
        }

        return $this->order->getByUser($status);
    }

    /**
     * 通过id验证记录是否存在以及是否有操作权限
     * 通过：返回该记录
     * 否则：抛错
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function validata($id)
    {
        $first = $this->order->first($id);

        throw_if(empty($first), Exception::class, '未找到该记录！', 404);

        throw_if(!can('control', $first), Exception::class, '没有权限！', 403);

        return $first;
    }

    /**
     * 通过id获取单条订单
     *
     * @param $id
     * @return OrderService|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static[]
     */
    public function first($id)
    {
        return $this->validata($id);
    }
}