# myanmarTools
myanmar topup tools

包含：话费充值，流量充值，查询，号码判断

```php

    $config =  new MyanmarConfig();
    $config->setUser('xxxx');
    $config->setKey('xxxx');
    $config->setDomain('http://account.mmearn.com/');
    $myanmar =  new MyanmarMyanmar($config);

    $res =  $myanmar->rechargeQuery('123456789');

```

