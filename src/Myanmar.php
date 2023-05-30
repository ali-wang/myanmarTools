<?php
namespace aliwang\myanmarTools;
use aliwang\myanmarTools\tools\CurlsTools;

class Myanmar{

   protected $config;

   public function __construct(MyanmarConfig $config)
   {
        $this->config = $config;
   }


   private function sign($data)
   {
        ksort($data);
        $str = "";
        foreach ($data as $key => $value) {
            $str .= $value;
        }
        $beforeSign = $this->config->getKey() . $str;
        return md5($beforeSign);
   }


   /**
    * 充值查询
    */
   public function rechargeQuery($order_id)
   {
        $url = $this->config->getDomain()."api/third/query";
        $params = array(
            "order_no" => $order_id,
            "user" => $this->config->getUser(),
            "timestamp" => time(),
        );
        $params['sign'] = $this->sign($params);
        $answer = CurlsTools::httpPost($url,$params);
        return $answer;
   }




   /**
    * 话费充值
    *
    */
   public function rechargePost($order_id, $phone, $amount)
    {
        $url = $this->config->getDomain()."api/third/topup";
        $params = array(
            "phone" => $phone,
            "amount" => $amount,
            "order_no" => $order_id,
            "user" => $this->config->getUser(),
            "timestamp" => time(),
        );
        $params['sign'] = $this->sign($params);
        $result = CurlsTools::httpPost($url, $params);
        return $result;
    }
   


    /**
     *流量充值
     */
    public function rechargeTrafficPost($order_id, $phone, $code)
    {

        $url = $this->config->getDomain()."api/third/topup-package";
        $params = array(
            "phone" => $phone,
            "code" => $code,
            "order_no" => $order_id,
            "user" => $this->config->getUser(),
            "timestamp" => time(),
        );
        $params['sign'] = $this->sign($params);
        
        $result = CurlsTools::httpPost($url, $params);
        return $result;
    }


    /**
     * 获取最新流量
     */
    public function getTraffic(){
        $url = $this->config->getDomain()."api/third/all-package-config";
        $params = array(
            "user" => $this->config->getUser(),
            "timestamp" => time(),
        );
        $params['sign'] = $this->sign($params);
        $result = CurlsTools::httpPost($url, $params);
        return $result;
    }

}


