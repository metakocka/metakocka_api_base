
# 1. JSON Examples
**URL** : https://main.metakocka.si/rest/eshop/v1/json/product_list

**Description** : return list of all products with addition states :
* warehause amount
* prices on pricelists
* compound or norm structure

## 1.1 With amount
Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "sales":"true",
    "return_warehause_stock":"true"
}
```

Attribute                 | Type | Notes| MK SLO |
--------------------------|------|------|--------|
| count_code | char,30 | | Id artikla |
| mk_id | char,30 | | / |
| code | char,50 | | Šifra artikla |
| sales | bool | Product must be flag as sales | Prodajni |
| purchase | bool | Product must be flag as purchase | Nabavni |
| service | bool | Product must be flag as service | Storitev |
| work | bool | Product must be flag as work | Delo |
| return\_warehause\_stock | bool | If attribute is set, every product in respond will have "amount" attribute. In case the product was newer use on stock, attribute "amount" will still have value 0. | / |
| offset | int | see notes. | / |
| limit | int | see notes. | / |

Notes :
* call will always return max 1000 records (limit = 1000). To get next window of results, you must set offset on value 1000. 

Reapond (with return\_warehause\_stock = 'true'):
```javascript
{
   "opr_code":"0",
   "opr_time_ms":"11762",
   "sales":"true",
   "return_warehause_stock":"true",
   "limit":"2",
   "offset":"0",
   "product_list_count":"2",
   "product_list":[
      {
         "company_id":"0",
         "mk_id":"1600000027",
         "code":"prod sifra 1",
         "name":"naziv sifra 1",
         "unit":"kos",
         "service":"false",
         "sales":"true",
         "purchasing":"true",
         "height":"1",
         "width":"2",
         "depth":"3",
         "weight":"4",
         "amount":"10",
         "amount_detail": [
         {
            "warehouse_mark": "oznaka1",
            "warehouse_name": "moje skladisce",
            "serial_number": "ser1",
            "exp_date": "2013-06-10+02:00",
            "amount": "4"
         },
         {
            "warehouse_mark": "oznaka1",
            "warehouse_name": "moje skladisce",
            "serial_number": "ser2",
            "exp_date": "2013-06-10+02:00",
            "amount": "6"
         }
         ]
      },
      {
         "company_id":"0",
         "mk_id":"1600000028",
         "code":"pod sifra 2",
         "name":"pod naziv 2",
         "unit":"dan",
         "service":"false",
         "sales":"true",
         "purchasing":"false"
      }
   ]
}
```

Notes :
* head of respond contains attributes (sales, limit, etc) from request.
* product\_list\_count is number of records in respond. Not the number of all records. If product\_list\_count = limit, you should read next window of results.
* amount\_detail will give you detail view for amount on different warehouses and separate by serial number, exp date, microloc or lot.

## 1.2 With pricelist
Request :
```javascript
{
    "secret_key":"my_password",
    "company_id":"16",
    "count_code":"PA_115_PA",
    "return_pricelist" : "true"
}
```

Respond :
```javascript
{  
   "opr_code":"0",
   "opr_time_ms":"144",
   "limit":"1000",
   "offset":"0",
   "product_list_count":"1",
   "product_list":{  
      "count_code":"PA_115_PA",
      "mk_id":"1600000392",
      "code":"art1",
      "name":"art1",
      "unit":"kos",
      "service":"false",
      "sales":"true",
      "purchasing":"true",
      "pricelist":[  
         {  
            "count_code":"PC_200_PC",
            "price_def":{  
               "amount_to":"10",
               "price":"2"
            }
         },
         {  
            "count_code":"PC_200_PC",
            "price_def":{  
               "amount_from":"10",
               "price":"3"
            }
         },
         {  
            "count_code":"c1",
            "price_def":{  
               "price":"20"
            }
         },
         {  
            "count_code":"PC_115",
            "price_def":{  
               "tax":"EX4",
               "tax_desc":"22",
               "price":"2"
            }
         },
         {  
            "count_code":"PC-2016",
            "price_def":{  
               "discount":"15",
               "tax":"EX4",
               "tax_desc":"22",
               "price_with_tax":"20"
            }
         }
      ]
   }
}
```
Notes :
* pricelist 'PC\_200\_PC' has price variation (2 EUR to amount 10, 3 EUR for more then 10),
* pricelist 'c1' has only only price (without tax)
* pricelist 'PC_115' has price (without tax)
* pricelist 'PC-2016' has price with tax and discount

## 1.3 With compound
Request :
```javascript
{
    "secret_key":"my_password",
    "company_id":"16",
    "count_code":"PA_115_PA",
    "return_product_compound" : "true"
}
```

Respond :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "191",
    "count_code": "PA-4171",
    "limit": "1000",
    "offset": "0",
    "product_list_count": "1",
    "product_list": {
        "count_code": "PA-4171",
        "mk_id": "1600129636",
        "code": "k1",
        "name": "kitchen",
        "unit": "kos",
        "service": "true",
        "sales": "true",
        "purchasing": "true",
        "compound_type": "compound",
        "compounds": [
            {
                "product_mk_id": "1600129635",
                "product_count_code": "PA-4170",
                "product_code": "t1",
                "product_title": "table",
                "amount": "1",
                "purchase_unit_factor": "0,5"
            },
            {
                "product_mk_id": "1600129634",
                "product_count_code": "PA-4169",
                "product_code": "c1",
                "product_title": "chair",
                "amount": "5",
                "purchase_unit_factor": "0,1"
            }
        ]
    }
}
```
Notes :
* compound_type - can have values 'norm' (MK SLO : 'Normativ') or 'compound' (MK SLO : 'Kosovnica')

## 1.4 Unit2 and unit factor
Respond :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "57",
    "count_code": "26276",
    "limit": "1000",
    "offset": "0",
    "product_list_count": "1",
    "product_list": {
        "count_code": "26276",
        "mk_id": "1600180258",
        "code": "uni2",
        "name": "unit2",
        
        "unit": "kg",
        "unit2": "cm3",
        "unit_factor": "10,52",
        
        "service": "false",
        "sales": "true",
        "purchasing": "false"
    }
}
```

## 1.5 Extend paramethers
Respond :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "57",
    "count_code": "26276",
    "limit": "1000",
    "offset": "0",
    "product_list_count": "1",
    "product_list": {
        "count_code": "26276",
        "mk_id": "1600180258",
        "code": "uni2",
        "name": "unit2",
        
        "unit": "kg",
        "unit2": "cm3",
        "unit_factor": "10,52",
        
        "service": "false",
        "sales": "true",
        "purchasing": "false",
        "extra_column": [
          {
            "name": "ime_artikla_nas_sistem",
            "value": "T-SHIRT 4"
          },
          {
            "name": "ime_pakiranja",
            "value": "KOS 4"
          },
          {
            "name": "marketing",
            "value": "false"
          }
        ]
    }
}
```
