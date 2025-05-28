

# 1. JSON Examples
**URL** : https://main.metakocka.si/rest/eshop/v1/json/product_list

**Description** : return list of all products with addition states :
* warehause amount
* prices on pricelists
* compound or norm structure
* partner info on product
* searching product with LIKE parameter
* category info on product
* order in delivery

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

| Attribute                             | Type    | Notes                                                                                                                                                               | MK SLO                   |
|---------------------------------------|---------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------|--------------------------|
| count_code                            | char,30 |                                                                                                                                                                     | Id artikla               |
| mk_id                                 | char,30 |                                                                                                                                                                     | /                        |
| code                                  | char,50 |                                                                                                                                                                     | Šifra artikla            |
| sales                                 | bool    | Product must be flag as sales                                                                                                                                       | Prodajni                 |
| purchase                              | bool    | Product must be flag as purchase                                                                                                                                    | Nabavni                  |
| service                               | bool    | Product must be flag as service                                                                                                                                     | Storitev                 |
| work                                  | bool    | Product must be flag as work                                                                                                                                        | Delo                     |
| active                                | bool    | Product must be flag as active                                                                                                                                      | Aktiven                  |
| eshop_sync                            | bool    | Product must be flag for e-commerce sync                                                                                                                            | Izmenjava - Spletna trg. |
| return\_warehause\_stock              | bool    | If attribute is set, every product in respond will have "amount" attribute. In case the product was newer use on stock, attribute "amount" will still have value 0. | /                        |
| return\_free\_amount                  | bool    | If attribute is set, every product in respond will have "free_amount" attribute. It's calculated as (amount - reservations)                                         | /                        |
| return\_warehouse\_reservation        | bool    | Product will have additional attribute "reservation_detail" with list of reservation amount per warehouse.                                                          | /                        |
| return\_product\_partner\_info        | bool    | Product will have additional attribute "product_partner_info" with list of custom partner info on product.                                                          | /                        |
| return\_category                      | bool    | Product will have additional attribute "category_tree_list" with tree structure of selected categories on product.                                                  | /                        |
| category                              | char    | Filter products by category name (example: "Computer","Shop",...).                                                                                                  | /                        |
| return\_expect\_order\_delivery\_date | bool    | Product will have additional attribute "order_in_delivery" with a list of amounts and delivery dates per warehouse on product.                                      | /                        |
| return\_web\_shop\_link               | bool    | Product will have additional attribute "web_shop_link" with a list of product web shop data for each web shop.                                                      | /                        |
| offset                                | int     | see notes.                                                                                                                                                          | /                        |
| limit                                 | int     | see notes.                                                                                                                                                          | /                        |

Notes :
* call will always return max 1000 records (limit = 1000). To get next window of results, you must set offset on value 1000. 

Respond (with return\_warehause\_stock = 'true'):
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
    "return_pricelist" : "true",
    "show_tax_factor":"true"
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
            },
	    "title": "cenik1",
            "buyer": "Janez Novak",
            "valid_from": "2009-05-10+02:00",
            "valid_to": "2021-04-04+02:00",
	    "sales_purchase" : "sales",
	    "currency_code": "EUR",
	    "pricelist_type": "type1"
         },
         {  
            "count_code":"PC_200_PC",
            "price_def":{  
               "amount_from":"10",
               "price":"3"
            },
	    "title": "cenik1",
	    "sales_purchase" : "purchase",
	    "currency_code": "EUR",
	    "pricelist_type": "type2"    
         },
         {  
            "count_code":"c1",
            "price_def":{  
               "price":"20"
            },
	    "title": "cenik2",
	    "currency_code": "EUR"
         },
         {  
            "count_code":"PC_115",
            "price_def":{  
               "tax":"EX4",
               "tax_desc":"22",
               "price":"2",
               "tax_factor":"0.22"
            },
	    "title": "cenik3",
	    "currency_code": "EUR"
         },
         {  
            "count_code":"PC-2016",
            "price_def":{  
               "discount":"15",
               "tax":"EX4",
               "tax_desc":"22",
               "price_with_tax":"20",
               "tax_factor":"0.22",
	       "lowest_price_30_days": "6"
            },
	    "title": "cenik4",
	    "currency_code": "EUR"
         }
      ]
   }
}
```
Notes :
* pricelist 'PC\_200\_PC' has price variation (2 EUR to amount 10, 3 EUR for more then 10),
* pricelist 'c1' has only only price (without tax)
* pricelist 'PC_115' has price (without tax)
* pricelist 'PC-2016' has price with tax and 
* all pricelists are includes - sales and purchase
* use parameter "show_tax_factor" to get tax factor for each pricelist product insert
* pricelist 'PC_115' has lowest price in 30 days 

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
		"mk_id": "1600386549",
                "product_mk_id": "1600129635",
                "product_count_code": "PA-4170",
                "product_code": "t1",
                "product_title": "table",
                "amount": "1",
                "purchase_unit_factor": "0,5"
                "supplier_id": "1600036997",
                "n_of_workers": "2",
                "row_order": "1",
                "workplace_id": "1600567744"
            },
            {
		"mk_id": "1600386550",
                "product_mk_id": "1600129634",
                "product_count_code": "PA-4169",
                "product_code": "c1",
                "product_title": "chair",
                "amount": "5",
                "purchase_unit_factor": "0,1"
                "supplier_id": "1600036997",
                "n_of_workers": "1",
                "row_order": "2",
                "workplace_id": "1600567223"
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
        ],
        "minimal_order_quantity": "10"
    }
}
```
## 1.6 with return\_warehause\_reservation
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
         ],
         "reservation_detail": [
         {
            "warehouse_mark": "oznaka1",
            "warehouse_name": "moje skladisce",
            "amount": "1"
         }
      ],
      }
   ]
}
```
## 1.7 With partner info
Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "sales":"true",
    "return_product_partner_info" : "true",
    "count_code":"PA_102_PA"
}
```
Respond :
```javascript
{
  "opr_code": "0",
  "opr_time_ms": "146",
  "count_code": "PA_102_PA",
  "sales": "true",
  "limit": "1000",
  "offset": "0",
  "product_list_count": "1",
  "product_list": [
    {
      "count_code": "PA_102_PA",
      "mk_id": "1600000066",
      "code": "sktest1",
      "barcode": "987654321",
      "name": "sktest1",
      "name_desc": "To je opis sktest1 artikla. D<font color=\"FF0000\">odatni test <br><br><br><font color=\"FF0000\">za testiranje HTM<font color=\"FF0000\">L opis<font color=\"FF0000\">ov <br><br><a href=\"http://\">www.google.com</a><br><br></font></font></font></font><ul><li><font color=\"FF0000\">dfs</font></li><li><font color=\"FF0000\"><font color=\"FF0000\">ghfh</font></font></li><li><font color=\"FF0000\"><font color=\"FF0000\"><font color=\"FF0000\">a,kdask</font></font></font></li></ul><p><br></p>",
      "unit": "kom",
      "service": "false",
      "sales": "true",
      "purchasing": "true",
      "eshop_sync": "false",
      "height": "60",
      "width": "80",
      "depth": "110",
      "weight": "40",
      "customs_fee": "54321",
      "koli_package_amount": "24",
      "asset": "false",
      "compound": "false",
      "expiration_dates": "false",
      "gross_weight": "50",
      "lot_numbers": "false",
      "min_stock": "10",
      "norm": "false",
      "serial_numbers": "false",
      "work": "false",
      "product_partner_info": [
        {
          "mk_id": "1600444908",
          "product_id": "1600000066",
          "product_code": "t12345",
          "product_name": "sifra_partner",
          "partner_id": "1600113924",
          "partner_name": "3D ART d.o.o."
        },
        {
          "mk_id": "1600444912",
          "product_id": "1600000066",
          "product_code": "t998",
          "product_name": "ps_test",
          "partner_id": "1600106702",
          "partner_name": "A. Kronenberg1"
        }
      ]
    }
  ]
}
```

## 1.8 With LIKE operator
Searching products with LIKE parameter. Possible to search by following fields:
* count_code
* code
* title

Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "search_with_like" : true,
    "return_product_compound" : true,
	"count_code":"PA_10"
}
```
Respond :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "741",
    "count_code": "PA_10",
    "limit": "1000",
    "offset": "0",
    "product_list_count": "10",
    "product_list": [
        {
            "count_code": "PA_100_PA",
            "mk_id": "1600000027",
            "code": "prod sifra 1",
            "barcode": "BAR_pa_100_pa",
            "name": "naziv sifra 1",
            "name_desc": "Dodatni opis 1",
            "unit": "kpl",
            "service": "true",
            "sales": "true",
            "activated": "true",
            "purchasing": "true",
            "eshop_sync": "true",
            "weight": "5",
            "customs_fee": "2710 19 27",
            "extra_column": [
                {
                    "name": "add_col_varchar1",
                    "value": "Test2"
                },
                {
                    "name": "add_col_varchar0",
                    "value": "Me2"
                }
            ],
            "localization": {
                "language": "en",
                "name": "12\" nekajfds",
                "name_desc": "<br>"
            },
            "compound_type": "compound",
            "compounds": [
	       {
	          "product_mk_id": "1600000550",
	          "product_count_code": "PA_120_PA",
	          "product_code": "s120",
	          "product_title": "n120",
	          "amount": "5",
	          "purchase_unit_factor": "0,2"
	       }
            ],
            "asset": "false",
            "compound": "true",
            "country": "VE",
            "expiration_dates": "false",
            "lot_numbers": "false",
            "min_stock": "44",
            "norm": "false",
            "serial_numbers": "true",
            "work": "true",
            "supplier_info": {
                "partner_id": "1600113924",
                "partner_name": "3D ART d.o.o."
            }
        },
        {
            "count_code": "PA_101_PA",
            "mk_id": "1600000028",
            "code": "pod sifra 23",
            "name": "pod naziv 2a",
            "unit": "dan",
            "service": "true",
            "sales": "true",
            "activated": "true",
            "purchasing": "true",
            "eshop_sync": "false",
            "weight": "121",
            "compound_type": "compound",
            "compounds": [
	      {
		"product_mk_id": "1600000027",
		"product_count_code": "PA_100_PA",
		"product_code": "prod sifra 1",
		"product_title": "naziv sifra 1",
		"amount": "200",
		"purchase_unit_factor": "0,005"
	      }
            ],
            "asset": "false",
            "compound": "true",
            "expiration_dates": "false",
            "gross_weight": "4",
            "lot_numbers": "false",
            "norm": "false",
            "serial_numbers": "false",
            "work": "true"
        },
        {
            "count_code": "PA_102_PA",
            "mk_id": "1600000066",
            "code": "sktest1",
            "barcode": "aergaerga",
            "name": "sktest1",
            "name_desc": "HTML<div><br></div><div><font color=\"#ff0000\">opis artikla</font></div><div><font color=\"#ff0000\"><br></font></div><div><font color=\"#ff0000\"><a href=\"www.google.com\">www.google.com</a></font></div>",
            "unit": "kg",
            "unit2": "g",
            "unit_factor": "1000",
            "service": "false",
            "sales": "true",
            "activated": "true",
            "purchasing": "true",
            "eshop_sync": "false",
            "weight": "45",
            "customs_fee": "2710 19 27",
            "asset": "false",
            "compound": "false",
            "expiration_dates": "false",
            "gross_weight": "50",
            "lot_numbers": "false",
            "min_stock": "10",
            "norm": "false",
            "serial_numbers": "false",
            "work": "false"
        },
        {
            "count_code": "PA_103_PA",
            "mk_id": "1600000087",
            "code": "crke_test1",
            "name": "crke_test1",
            "name_desc": "304490",
            "unit": "dan",
            "service": "false",
            "sales": "true",
            "activated": "true",
            "purchasing": "true",
            "eshop_sync": "true",
            "height": "50",
            "width": "60",
            "depth": "30",
            "asset": "false",
            "compound": "false",
            "expiration_dates": "false",
            "lot_numbers": "false",
            "norm": "false",
            "serial_numbers": "false",
            "work": "false"
        },
        {
            "count_code": "PA_105_PA",
            "mk_id": "1600000160",
            "code": "UVOZ_1",
            "name": "Uvoz 1",
            "name_desc": "Dodatni uvoz 2a",
            "unit": "cm",
            "service": "false",
            "sales": "true",
            "activated": "true",
            "purchasing": "true",
            "eshop_sync": "false",
            "height": "12",
            "width": "10",
            "depth": "12",
            "weight": "13",
            "asset": "false",
            "compound": "false",
            "expiration_dates": "false",
            "lot_numbers": "false",
            "norm": "false",
            "serial_numbers": "false",
            "work": "false"
        },
        {
            "count_code": "PA_106_PA",
            "mk_id": "1600000161",
            "code": "UVOZ_2",
            "name": "Uvoz 2",
            "name_desc": "Dodatni uvoz 2",
            "unit": "kg",
            "service": "true",
            "sales": "true",
            "activated": "true",
            "purchasing": "false",
            "eshop_sync": "false",
            "height": "12,123",
            "width": "10",
            "depth": "12",
            "weight": "2",
            "asset": "false",
            "compound": "false",
            "expiration_dates": "false",
            "lot_numbers": "false",
            "norm": "false",
            "serial_numbers": "false",
            "work": "false"
        },
        {
            "count_code": "PA_107_PA",
            "mk_id": "1600000167",
            "code": "sestav_del_1",
            "barcode": "8892342374",
            "name": "sestav_del_1",
            "unit": "m3",
            "service": "false",
            "sales": "true",
            "activated": "true",
            "purchasing": "true",
            "eshop_sync": "false",
            "asset": "false",
            "compound": "false",
            "expiration_dates": "false",
            "lot_numbers": "false",
            "norm": "false",
            "serial_numbers": "false",
            "work": "false"
        },
        {
            "count_code": "PA_108_PA",
            "mk_id": "1600000168",
            "code": "sestav_del_2",
            "barcode": "3492342374",
            "name": "sestav_del_2",
            "unit": "cm",
            "service": "false",
            "sales": "true",
            "activated": "true",
            "purchasing": "true",
            "eshop_sync": "false",
            "asset": "false",
            "compound": "false",
            "expiration_dates": "false",
            "lot_numbers": "false",
            "norm": "false",
            "serial_numbers": "false",
            "work": "false"
        },
        {
            "count_code": "PA_109_PA",
            "mk_id": "1600000169",
            "code": "sestav test 2",
            "name": "sestav test 2",
            "unit": "kos",
            "service": "true",
            "sales": "true",
            "activated": "true",
            "purchasing": "true",
            "eshop_sync": "false",
            "compound_type": "compound",
            "compounds": [
                {
                    "product_mk_id": "1600000167",
                    "product_count_code": "PA_107_PA",
                    "product_code": "sestav_del_1",
                    "product_title": "sestav_del_1",
                    "amount": "2",
                    "purchase_unit_factor": "0,2824859"
                },
                {
                    "product_mk_id": "1600000168",
                    "product_count_code": "PA_108_PA",
                    "product_code": "sestav_del_2",
                    "product_title": "sestav_del_2",
                    "amount": "1",
                    "purchase_unit_factor": "0,4350282"
                }
            ],
            "asset": "false",
            "compound": "true",
            "expiration_dates": "false",
            "lot_numbers": "false",
            "norm": "false",
            "serial_numbers": "false",
            "work": "false"
        },
        {
            "count_code": "PA_10_PA",
            "mk_id": "1600051891",
            "code": "skupni_popust_test",
            "name": "skupni_popust_test",
            "unit": "kos",
            "service": "false",
            "sales": "true",
            "activated": "true",
            "purchasing": "true",
            "eshop_sync": "false",
            "asset": "false",
            "compound": "false",
            "expiration_dates": "false",
            "lot_numbers": "false",
            "norm": "false",
            "serial_numbers": "false",
            "work": "false"
        }
    ]
}
```

## 1.9 With categories

Notes:
* 'tree_node_container' and 'tree_node_visible' are returned only with 'Advanced categories' 
enabled on extra fields for products (Your Company - Settings).

Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "sales":"true",
    "return_category":"true"
} 
```
Respond (with return\_category = 'true'):

```javascript
{
    "opr_code":"0",
    "opr_time_ms":"1910",
    "sales":"true",
    "return_category":"true",
    "limit":"1000",
    "offset":"0",
    "product_list_count":"1000",
    "product_list":[
        {
            "count_code":"PA_100_PA",
            "mk_id":"1600000027",
            "code":"prod sifra 1",
            "barcode":"bar123123123",
            "name":"naziv sifra 1 import 1",
            "name_desc":"Opis1 Opis2 Opis3",
            "unit":"kos",
            "service":"false",
            "sales":"true",
            "activated":"true",
            "purchasing":"true",
            "eshop_sync":"false",
            "height":"1",
            "width":"2",
            "depth":"3",
            "weight":"4",
            "customs_fee":"2710 19 29",
            "localization":{
                "language":"sl",
                "name":"naziv sifra 1 import 1",
                "name_desc":"Opis1\nOpis2\nOpis3"
            },
            "koli_package_amount":"0,23",
            "asset":"false",
            "compound":"false",
            "country":"DE",
            "expiration_dates":"false",
            "lot_numbers":"false",
            "norm":"false",
            "serial_numbers":"false",
            "work":"true",
            "supplier_info":{
                "partner_id":"1600084941",
                "partner_name":"a1"
            },
            "category_tree_list":[
                {
                    "tree_node_container": "true",
                    "tree_node_id":"1600285172",
                    "tree_node_label":"Računalnik",
                    "tree_node_list":[
                        {
                            "tree_node_container": "true",
                            "tree_node_id":"1600285174",
                            "tree_node_label":"Apple",
                            "tree_node_list":[
                                {
                                    "tree_node_container": "true",
                                    "tree_node_id":"1600285176",
                                    "tree_node_label":"MacBook",
                                    "tree_node_visible": "true"
                                }
                            ],
                            "tree_node_visible": "true"
                        }
                    ],
                "tree_node_visible": "true"
                }
            ]
        }
    ]
}
```

## 1.9 With order in delivery

Notes:
* In order for the data to be returned, the delivery date must be set on the product on the purchase order.

Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "sales":"true",
    "return_expect_order_delivery_date":"true"
} 
```
Respond (with return\_expect\_order\_delivery\_date = 'true'):

```javascript
{{
     "opr_code": "0",
     "opr_time_ms": "1853",
     "sales": "true",
     "purchase": "true",
     "limit": "1000",
     "offset": "0",
     "product_list_count": "1",
     "product_list": [
         {
             "count_code": "PA_115_PA",
             "mk_id": "1600000392",
             "code": "art1",
             "name": "art1",
             "unit": "pcs",
             "unit2": "block",
             "unit_factor": "2",
             "service": "false",
             "sales": "true",
             "activated": "true",
             "purchasing": "true",
             "eshop_sync": "false",
             "height": "1",
             "weight": "0,23",
             "customs_fee": "85153991",
             "localization": [
                 {
                     "language": "sl",
                     "name": "art1"
                 }
             ],
             "asset": "false",
             "compound": "false",
             "country": "IT",
             "expiration_dates": "false",
             "gross_weight": "1",
             "lot_numbers": "false",
             "norm": "false",
             "serial_numbers": "false",
             "work": "false",
             "order_in_delivery": [
                 {
                     "mk_id": "1600000392",
                     "expect_order_amount": "17",
                     "export_order_delivery_date": "2020-10-24",
                     "warehouse_id": "1600263862",
                     "warehouse_mark": "nas1"
                 },
                 {
                     "mk_id": "1600000392",
                     "expect_order_amount": "9",
                     "export_order_delivery_date": "2020-10-25",
                     "warehouse_id": "1600263862",
                     "warehouse_mark": "nas1"
                 }
             ]
         }
     ]
 }
```

## 1.10 With web shop link

Notes:
* In order for the data to be returned, parameter "return\_web\_shop\_link" must be set.

Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id":"16",
    "sales":"true",
    "return_web_shop_link":"true"
} 
```
Respond (with return\_web\_shop\_link = 'true'):

```javascript
{{
     "opr_code": "0",
     "opr_time_ms": "1853",
     "sales": "true",
     "purchase": "true",
     "limit": "1000",
     "offset": "0",
     "product_list_count": "1",
     "product_list": [
         {
             "count_code": "PA_115_PA",
             "mk_id": "1600000392",
             "code": "art1",
             "name": "art1",
             "unit": "pcs",
             "unit2": "block",
             "unit_factor": "2",
             "service": "false",
             "sales": "true",
             "activated": "true",
             "purchasing": "true",
             "eshop_sync": "false",
             "height": "1",
             "weight": "0,23",
             "customs_fee": "85153991",
             "asset": "false",
             "compound": "false",
             "country": "IT",
             "expiration_dates": "false",
             "gross_weight": "1",
             "lot_numbers": "false",
             "norm": "false",
             "serial_numbers": "false",
             "work": "false",
             "web_shop_link": [
                {
                    "eshop_sync_id": "1600351213",
                    "eshop_sync_name": "MK Demo trgovina",
                    "first_image_url": "https://example.com/images/art1.jpg",
                    "title": "art1",
                    "url": "https://example.com/art1"
                },
                {
                    "eshop_sync_id": "1600333199",
                    "eshop_sync_name": "PrestaShop demo",
                    "first_image_url": "https://example.com/images/art1.jpg",
                    "title": "art1",
                    "url": "https://example.com/art1"
                },
                {
                    "eshop_sync_id": "1601363559",
                    "eshop_sync_name": "Shopamine",
                    "first_image_url": "https://example.com/images/art1.jpg",
                    "title": "art1",
                    "url": "https://example.com/art1"
                }
            ]
         }
     ]
 }
```

## 1.11 With free amount

Notes:
* Only warehouses with "Show in product list" ticked are used for the calculation

Request :
```javascript
{
    "secret_key":"my_secret_key",
    "company_id": "16",
    "return_free_amount": "true"
}
```
Respond (with return\_free\_amount = 'true'):

```javascript
{{
    "opr_code": "0",
    "opr_time_ms": "419",
    "opr_time_no_lock_ms": "0",
    "limit": "1",
    "offset": "0",
    "product_list_count": "1",
    "product_list": [
        {
            "count_code": "31141",
            "mk_id": "1600472316",
            "code": "artikel1",
            "name": "artikel1",
            "unit": "kos",
            "service": "false",
            "sales": "true",
            "activated": "true",
            "purchasing": "true",
            "eshop_sync": "false",
            "weight": "4",
            "localization": [
                {
                    "language": "sl",
                    "name": "artikel1"
                }
            ],
            "asset": "false",
            "compound": "false",
            "expiration_dates": "false",
            "gross_weight": "5",
            "lot_numbers": "false",
            "norm": "false",
            "serial_numbers": "false",
            "work": "false",
            "free_amount": "3079"
        }
    ]
}
```
