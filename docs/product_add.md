
# 1. JSON Example
**URL** : https://main.metakocka.si/rest/eshop/v1/json/product_add

Notes :
* Pricelist: instead of "tax" you can use "tax_factor" (Example : "tax_factor":"0.22")

Request :
```javascript
{
    "secret_key":"my_secreat_key",
    "company_id":"16",
    "count_code":"eshop_001",
    "code":"eshop_001_sif",
    "barcode": "987654321",
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

## 1.6 Attachments

**Data parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| attachment_list | Optional | Attachment object list |
| remove_not_send_attachments | Optional | Removes all attachments from product. Attachments from the same request are added |


**Attachment object parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| file_name | Required | Filename with extension |
| source_url/data_b64 | Required | Public url of the file (pdf, image,...) or base64 encoded file |

Request :
```javascript
{
    "secret_key": "8899",
    "count_code": "89693",
    "company_id": 16,
    "remove_not_send_attachments":true,
    "attachment_list" : [
          {
            "file_name" : "example.pdf", 
            "source_url" : "PUBLIC_URL_TO_PDF"
          },
          {
            "file_name" : "example.jpg", 
            "data_b64" : "BASE64_ENCODED_JPG"
          }
        ]
}
```

## 1.7 Packaging waste

- Only packaging wastes you have selected in MetaKocka will be inserted.
- Units are in grams [g].

**Data parameters**

|Parameter| Description |
|----|------
| packaging_waste_paper | Paper |
| packaging_waste_plastic | Plastic |
| packaging_waste_wood | Wood |
| packaging_waste_metal | Metal |
| packaging_waste_glass | Glass |
| packaging_waste_other | Other |
| packaging_waste_iron_steel | Iron and steel |
| packaging_waste_aluminum | Aluminum |

```javascript
{
    "secret_key": "8899",
    "count_code": "89693",
    "company_id": 16,
    "packaging_waste_metal":"150",
    "packaging_waste_glass":"20",
    "packaging_waste_wood":"13"
}
```

## 1.8 Extra column - Declaration

- To enable "Declaration" field on products, you must first enable declarations in MetaKocka company settings under "Extra fields on products".

```javascript
{
    "secret_key": "8899",
    "count_code": "89693",
    "company_id": 16,
    "extra_column": [
        {
            "name": "declaration",
            "value": "This is declaration text."
        }
    ]
}
```

## 1.9 Compound


Notes :
* Parameter count_code' or 'mk_id' must be set for add operation

**Product parameters**
|Parameter| Required/Optional | Description |
|----|------------|------
| secret_key | Required | Generated API key |
| company_id | Required | Company identification number |
| mk_id | Required/Optional(if count_code is provided) | Product Identification number |
| count_code | Required/Optional(if mk_id is provided) | Product count code |
| service | Required/Optional(if product parameter complete_set is added) | Product as a service |
| complete_set | Required/Optional(if parameter service is added) | Product as a service and compound |
| compound_type | Required | Required value = "compound" |
| confirm_save_change_product_service | Optional | To confirm if we want to change product as a service |

Note :
- if product is already in use on any document, invoice,... a warning will be shown to recalculate stock.   
   To confirm, we need to add aditional parameter confirm_save_change_product_service

**Compound parameters**

Notes :
* Parameter "product_count_code" or "product_mk_id" is required if we want to add existing product as compound.
* If "product_count_code" and "product_mk_id" is not set or no product is found, and if all valid required parameters are provided, then new product will be created and then added as a compound.

|Parameter| Required/Optional | Description |
|----|------------|------
| product_mk_id | Optional | Product id |
| product_count_code | Optional | Product count code | 
| amount | Required | add amount |
| purchase_unit_factor | Required | Purchase unit factor |
| supplier_id | Required | Supplier identification |
| purchase_price | Required | Purchase price |
| n_of_workers | Required | number of workers |
| workplace_id | Required | workplace id |
| unit | Required | Measurement unit |
| categories | optional | Categories list |


Request :

```javascript
{
    "secret_key": "8899",
    "count_code": "30888",
    "company_id": 16,
    "service": "true",
    "compound_type":"compound",
    "compounds": [
            {
                "product_count_code": "30888",
                "product_title": "Table",
                "amount": "1",
                "purchase_unit_factor": "0,5",
                "supplier_id": "1600036997",
                "purchase_price": "4",
                "n_of_workers": "2",
                "workplace_id": "1600567744",
                "unit" : "m2",
            }
    ]     
}
```
Respond :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "66",
    "mk_id": "1600386552",
    "count_code": "30888"
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
