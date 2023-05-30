<?php
namespace aliwang\myanmarTools;

use aliwang\myanmarTools\interfaces\UpdateOrderInterface;
class MyanmarUpdateOrder{
    protected $service;

    public function __construct(UpdateOrderInterface $service)
    {
         $this->service = $service;
    }

     /**
     * 判断当前充值状态
     * @param $res
     */
    public function rechargeStatus($res,$order_id){
        if (empty($res)){//可能充值失败 无返回数据
            return false;
        }

        $result_json = json_decode($res,true);
        if ($result_json['status'] == 0){ //参数错误
            $this->service->updateOrderError($order_id,'参数或者签名的等错误');
            return false;
        }

        if ($result_json['data']=="Fail"){ //充值失败
            if (array_key_exists("msg",$result_json)){
                $remark=$result_json['msg'];
            }else{
                $remark="充值失败";
            }
            $this->service->updateOrderError($order_id,$remark);
            //更新失败订单
            return  false;
        }elseif ($result_json['data']=="Pending"){ //充值等待
            $this->service->updateOrderPending($order_id);
            return  true;
        }elseif($result_json['data']=="Success"){ //充值成功
            $this->service->updateOrderSuccess($order_id);
            return  true;
        }else{//无返回数据
            return  false;
        }

    }
 

}