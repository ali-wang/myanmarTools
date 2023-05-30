# myanmarTools
myanmar topup tools

包含：话费充值，流量充值，查询，号码判断

```php
    use aliwang\myanmarTools\MyanmarUpdateOrder;
    use aliwang\myanmarTools\MyanmarConfig;
    use aliwang\myanmarTools\Myanmar as MyanmarMyanmar;
    use aliwang\myanmarTools\NumberType;

    //查询
    $config =  new MyanmarConfig();
    $config->setUser('xxxx');
    $config->setKey('xxxx');
    $config->setDomain('http://account.mmearn.com/');
    $myanmar =  new MyanmarMyanmar($config);

    $res =  $myanmar->rechargeQuery('123456789');

    //更新订单
    $order =  new MyanmarUpdateOrder(new UpdateOrder());
    $order->rechargeStatus($res,$order);

```

