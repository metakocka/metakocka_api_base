
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
    "localization":[
      {
         "language":"en",
         "name":"en name",
         "name_desc":"en desc"
      },
      {
         "language":"de",
         "name":"de name",
         "name_desc":"de desc"
      }
   ],
    "categories" :[
      {"category":"Sadje"},
      {"category":["Sadje", "Hruška"]}
    ],
    "pricelist" :[
      {
         "count_code" : "CENIK_001",
         "price_def": [
            {
              "amount_from" : "0",
              "amount_to" : "6",
              "discount" : "5",
              "tax" : "220",
              "price" : "8",
              "price_with_tax" : "10"
            },
            {
              "amount_from" : "6",
              "amount_to" : null,
              "discount" : "5",
              "tax" : "220",
              "price" : "8",
              "price_with_tax" : "10"
            }
         ]
      }
    ]
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

## 1.1 Localization
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
    "localization":[
    {
        "language":"en",
        "name":"en name",
        "name_desc":"en desc"
    },
    {
        "language":"de",
        "name":"de name",
        "name_desc":"de desc"
    }
   ]    
}
```

## 1.2 Categories (simple form)
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
    "categories" :[
        {"category":"Sadje"},
        {"category":"Hruška"}
    ]    
}
```

## 1.3 Categories (advance form)
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
    "categories" :[    
        {"category":["Sadje", "Hruška"]}
    ]    
}
```
## 1.4 Product partner info
Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "count_code":"part_sifra_test",
    "code":"part_sifra_test",
    "name":"Partner šifra test REST",
    "unit":"kos",
    "sales":"true",
    "product_partner_info": [
        {
          "product_code": "t12345",
          "product_name": "sifra_partner",
          "partner_id": "1600113924"
        }, 
        {
          "product_code": "asd",
          "product_name": "pp_partner",
          "partner_id": "1600106702"
        }
      ]    
}
```
Respond : 
```javascript
{
  "opr_code": "0",
  "opr_time_ms": "247",
  "mk_id": "1600444917",
  "count_code": "part_sifra_test",
  "product_partner_info_mk_id": [
    "1600444918",
    "1600444919"
  ]
}
```

## 1.5 Intrastat values
Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "count_code":"part_sifra_test",
    "customs_fee" : "100200300",
    "country" : "Italy",
    "weight" : "125"
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
