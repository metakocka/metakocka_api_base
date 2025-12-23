**URL** : https://main.metakocka.si/rest/eshop/v1/put_document

## 2.1 sales\_order
### Example full request :
```json
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest1",
    "doc_date" : "2024-09-12+02:00",
    "title": "REST test 1",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "Buyer d.o.o.",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "province": "Severna primorska",
        "country": "Slovenia"
    },
    "receiver": {
        "business_entity": "false",
        "taxpayer": "false",
        "foreign_county": "false",
        "tax_id_number": "",
        "customer": "Rok Horvat",
        "street": "Slovenska cesta 200",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia",
        "partner_contact": {
            "name": "Rok Horvat",
            "phone": "05 320 24 88",
            "fax": "05 320 24 84",
            "gsm": "071 333 422",
            "email": "test2@test.co.uk"
        }
    },
    "sales_pricelist_code" : "118",
    "prepayment_percent" : "15",
    "discount_percent" : "20",
    "currency_code" : "USD",
    "status_code" : "created",
    "pariteta" : "Lasten Prevzem",
    "doc_created_email" : "m@m.com",
    "commercialist_email" : "m@m.com",
    "parcel_shop_id" : "P100",
    "profit_center" : "ProfitCenter1",
    "offer_list" : [
        {
            "count_code" : "PP1_261"
        },
        {
            "count_code" : "PP1_265"
        }       
    ],        
    "delivery_deadline" : "2014-09-14+02:00",
    "warehouse" : "glavni",
    "delivery_type" : "DHL",
    "priority" : "3-Visoka",
    "finish_date" : "2014-09-15+02:00",
    "buyer_order" : "border",
    "notes_header" : "notes zgoraj",
    "notes": "to so notes.",
    "method_of_payment" : "on_delivery",
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price" : "100",
            "tax" : "EX4"
        }
    ],
    "order_create_ts": "2024-09-12T12:13:15+02:00",
    "duo_payment": "2024-09-24+02:00"
}
```

Notes : 
* prepayment\_percent - for exact value you can use prepayment\_value
* discount\_percent - for exact value you can use discount_value
* link_to_web_store - the string value should exactly match with an existing store name. Only if store is type 'manual'. 
* duo\_payment - to set number of days, you can use duo\_payment\_days

### Example minimal request :
```json
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2014-09-13+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price" : "100",
            "tax" : "EX4"
        }
    ]
}
```

### Example minimal request with gross price (always use if you have webshop) :
```json
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2014-09-13+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price_with_tax" : "19,99",
            "tax" : "EX4"
        }
    ]
}
```

### Example minimal update request :
```json
{
    "secret_key":"8899",
    "company_id":"16",
    "mk_id" : "1600000012",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2014-09-13+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price" : "100",
            "tax" : "EX4"
        }
    ]
}
```

### Example minimal request + add payment :
```json
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2014-09-13+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },    
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price" : "100",
            "tax" : "EX4"
        }
    ],
    "mark_paid":[
      {
            "payment_type":"PayPal",
            "date":"12.03.2011"
      }
   ]
}
```

Notes :
* if you execute document update and add mark_paid, previous payment will be deleted and new will be added.

### Example request for Fulfilment :
```json
{
    "secret_key": "8899",
    "company_id": "16",
    "doc_type": "sales_order",
    "doc_date": "2024-03-14+02:00",
    "status_code": "created",
    "customer_order": "Order Number 1",
    "delivery_type": "DHL",
    "currency_code": "EUR",
    "doc_created_email" : "api@m.com",
    "parcel_shop_id" : "P100",
    "profit_center" : "ProfitCenter1",
    "notes": "customer notes - cart",
    "method_of_payment": "PayPal",
    "partner": {
        "business_entity": "false",
        "taxpayer": "false",
        "foreign_county": "false",
        "tax_id_number": "",
        "customer": "Janez Novak",
        "street": "Dunajska 120",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },
    "receiver": {
        "business_entity": "false",
        "taxpayer": "false",
        "foreign_county": "false",
        "tax_id_number": "",
        "customer": "Lojze Horvat",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia",
        "partner_contact": {
            "name": "Lojze Horvat",
            "phone": "05 111 11 12",
            "fax": "05 111 11 12",
            "gsm": "071 333 433",
            "email": "test1@test.co.uk"
      }
    },
    "product_list": [
        {
          "code": "art1",
          "amount": "1",
          "price_with_tax": "100",
          "discount": "10",
          "tax_factor": "0.22"
        }
    ],
    "mark_paid": [
        {
          "payment_type": "PayPal",
          "date": "14.03.2024"
        }
    ]
}
```

Notes :
* if you execute document update and add mark_paid, previous payment will be deleted and new will be added.

### Example Lot numbers, Microlocations :
```json
{
    "secret_key":"...",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2020-03-05+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },
    "product_list": [
        {
            "mk_id": "1600373697",
            "code": "serial_full",
            "amount": "2",
            "price": "10",
            "tax": "EX4",
            "microlocation": "m2",
            "lot_number_value": "l1"
        }
    ]
}
```

### Example with street number :
```json
{
    "secret_key":"...",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2020-03-05+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Bul.george Cosbuc 31-37, SC:2 ET:1 AP:5",
        "street_number": "31-37",
        "post_number": "1000",
        "place": "Bucuresti",
        "country": "Romania"
    },
    "product_list": [
        {
            "mk_id": "1600373697",
            "code": "serial_full",
            "amount": "2",
            "price": "10",
            "tax": "EX4",
            "microlocation": "m2",
            "lot_number_value": "l1"
        }
    ]
}
```

### Example with expected ship date :
```json
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2014-09-13+02:00",
    "shipped_date_expected_seller" : "2014-09-20+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price" : "100",
            "tax" : "EX4"
        }
    ]
}
```

### Example with webshop link (by name or eshop_sync_id) :
```json
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2014-09-13+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price" : "100",
            "tax" : "EX4"
        }
    ],
    "link_to_web_store": "Demo Trgovina",
    "webshop_eshop_sync_id": "1600353213"
}
```

### Example with meta data :
```json
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2020-09-13+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price" : "100",
            "tax" : "EX4"
        }
    ],
    "meta_data": [
        {
            "key":"meta_data_key",
            "value_string":"meta_data_value"
        }
    ]
}
```

### Example with product categories :
```json
{
    "secret_key":"...",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2020-03-05+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },
    "product_list": [
        {
            "mk_id": "1600373697",
            "code": "serial_full",
            "amount": "2",
            "price": "10",
            "tax": "EX4",
            "categories" :[
              {"category":"Fruit"},
              {"category":["Fruit", "Apple"]}
            ]
        }
    ]
}
```


### Create invoice after order is stored :
* include "create_invoice" paramether in request. In respond you will get invoice id as "bill_mk_id"

Request : 
```json
{
    "secret_key":"8899",
    "company_id":"16",
    .........
      "create_invoice" : "true",
    .........
}
```

Respond example :
```javascript
{
  "opr_code": "0",
  "opr_time_ms": "47788",
  "document_type_short": "PR_SO",
  "partner": {
    "mk_id": "1600129478"
  },
  "attachment_list": [
    {
      "bill_mk_id": "1600376594"
    }
  ],
  "mk_id": "400000000425",
  "count_code": "PP-26941",
  "total_price": "122.00"
}
```

### Country - Northeren Ireland
If you ship orders in Northern Ireland from the EU, these orders must have Tax (usually 20%) and a separate tax number (OSS - The Union One-Stop Shop). These orders should not have a country UK, but a separate county: United Kingdom - Northern Ireland. Please use one of the following words for "country" parameter :

* Združeno kraljestvo (UK) - Severna Irska
* United Kingdom - Northern Ireland
* XI

Tax factor / taxId must be set the same as for other EU countries. 

### Example with attachments :
Notes :
* you can add attachments to all document types (for example sales order, invoice, offer, etc.)

**Data parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| attachment_list | Optional | Attachment object list |


**Attachment object parameters**

|Parameter| Required/Optional | Description |
|----|------------|------
| file_name | Required | Filename with extension |
| source_url/data_b64 | Required | Public url of the file (pdf, image,...) or base64 encoded file |



```json
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2020-09-13+02:00",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price" : "100",
            "tax" : "EX4"
        }
    ],
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

### Extra info for document change log
You can specify extra information (like real user name from called system) that will be saved into the change log. Use paramether "document_change_log_notes" (max 50 characters).

```json
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2014-09-13+02:00",
    "document_change_log_notes" : "User : John deere",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price" : "100",
            "tax" : "EX4"
        }
    ]
}
```

### Update custom fee and country of origin on product
You can update the custom fee and country of origin for a specific product. Two extra attributes must be added to the product - country and customs_fee. If a customs fee is not yet in MK register, it will be added.

Country can be EN name (Slovenia, Italy, Croatia) or 2 char (SI, IT, HR).
```json
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2014-09-13+02:00",
    "document_change_log_notes" : "User : John deere",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price" : "100",
            "tax" : "EX4",
            "country" : "croatia",
            "customs_fee" : "85153990"
        }
    ]
}
```

### Example with product metadata

| Parameter     | Optional | 
|---------------|----------|
| key           | true     |            
| value_string  | true     |
| display_key   | true     |
| display_value | true     |

```json
{
  "secret_key": "8899",
  "company_id": "16",
  "doc_type": "sales_order",
  "doc_date": "23.03.2022",
  "buyer_order": "test",
  "partner": {
    "business_entity": "true",
    "taxpayer": "true",
    "foreign_county": "true",
    "tax_id_number": "SI20000859",
    "customer": "API partner test",
    "street": "Slovenska cesta 1001",
    "post_number": "1000",
    "place": "Ljubljana",
    "country": "Croatia"
  },
  "product_list": [
    {
      "code": "art1",
      "amount": "1",
      "price": "1.00",
      "discount": "0.00",
      "tax": "EX4",
      "meta_data": [
        {
          "key": "Design ID",
          "value_string": "87cd01c179014823bd4bdf8a8cb3facc",
          "display_key": "Design ID",
          "display_value": "87cd01c179014823bd4bdf8a8cb3facc"
        },
        {
          "key": "Tile ID",
          "value_string": "0",
          "display_key": "Tile ID",
          "display_value": "0"
        }
      ]
    }
  ]
}
```

### Example with tracking type
* Added parameter "salesOrderTrackingType" with two options:
  * "bill"
  * "packing_list"
* Also works with update_document endpoint

```json
{
  "secret_key": "8899",
  "company_id": "16",
  "doc_type": "sales_order",
  "doc_date": "23.03.2022",
  "buyer_order": "test",
  "salesOrderTrackingType":"packing_list",
  "partner": {
    "business_entity": "true",
    "taxpayer": "true",
    "foreign_county": "true",
    "tax_id_number": "SI20000859",
    "customer": "API partner test",
    "street": "Slovenska cesta 1001",
    "post_number": "1000",
    "place": "Ljubljana",
    "country": "Croatia"
  },
  "product_list": [
    {
      "code": "art1",
      "amount": "1",
      "price": "1.00",
      "discount": "0.00",
      "tax": "EX4"
    }
  ]
}
```

### Update barcode on product
add or update barcode on product with parameter "barcode"

```json
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2014-09-13+02:00",
    "document_change_log_notes" : "User : John deere",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price" : "100",
            "tax" : "EX4",
            "barcode": "bar12"
        }
    ]
}
```

### Update product webshop data
Add code, web_shop_URL, first_image_URL, name, price_with_tax to product_list object. In the parent object, webshop_eshop_sync_id is also required

```json
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest2",
    "doc_date" : "2014-09-13+02:00",
    "document_change_log_notes" : "User : John deere",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia"
    },
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price_with_tax" : "100",
            "tax" : "EX4",
            "name": "Product name test",
            "web_shop_URL": "Webshop.com/product-name-test",
            "first_image_URL": "webshop.com/product-name-test/image.png"
        }
    ],
    "webshop_eshop_sync_id": "1600353213"
}
```
