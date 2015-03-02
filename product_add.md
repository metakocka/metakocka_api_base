
# 1. JSON Example
**URL** : https://main.metakocka.si/rest/eshop/v1/json/product_add

Request :
```javascript
{
    "secret_key":"my_secreat_key",
    "company_id":"16",
    "count_code":"eshop_001",
    "code":"eshop_001_sif",
    "name":"artikel eshop_001",
    "name_desc": "artikel eshop_001 - daljsi opis",    
    "unit":"kos",
    "service":"false",
    "sales":"true",
    "purchasing":"false",
    "height":"12.23",
    "depth":"4.12",
    "weight":"6.3",
}
```

Respond : 
```javascript
{
    "opr_code":"0",
    "opr_time_ms":"33",
    "mk_id":"1600001744",
    "count_code":"eshop_002"
}
```

# 2. PHP Example
[product\_add\_json.php](./examples_php/product_add_json.php)

```PHP
<?php
    require_once("Pest.php");
 
    $url = 'https://main.metakocka.si/rest/eshop/v1/json/product_add';
    $company_id = '16';
    $secret_key = 'my_secret_key';
 
    $requestJSON = array (
        'secret_key'=>$secret_key, 'company_id'=>$company_id, 'count_code'=>'eshop_001',
        'code'=>'eshop_001_sif', 'name'=>'artikel eshop_001', 'name_desc'=>'artikel eshop_001 - daljsi opis',    
        'unit'=>'kos', 'service'=>'false', 'sales'=>'true', 'purchasing'=>'false', 'height'=>'12.23',
        'depth'=>'4.12', 'weight'=>'6.3'
    );
 
    echo '<html><body>';
    echo '<b>URL</b> : '.$url.'<br/>';
    echo '<b>POST data</b> : '.json_encode($requestJSON).'<br/>';
    echo '<hr/>';
    echo '<b>Request start...</b><br/>';
    $pest = new Pest($url);
    $thing = $pest->post('', 'application/json', json_encode($requestJSON));
 
    echo '<b>Respond : </b>'.$thing;
    echo '</body></html>';    
?>
```
