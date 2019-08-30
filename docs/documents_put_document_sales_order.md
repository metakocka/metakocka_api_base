**URL** : https://main.metakocka.si/rest/eshop/v1/put_document

## 2.1 sales\_order
### Example full request :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_order",
    "count_code": "resttest1",
    "doc_date" : "2014-09-13+02:00",
    "title": "REST test 1",
    "partner": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000001",
        "customer": "API partner 1",
        "street": "Slovenska cesta 100",
        "post_number": "1000",
        "place": "Ljubljana",
        "province": "Severna primorska",
        "country": "Slovenia"
    },
    "receiver": {
        "business_entity": "true",
        "taxpayer": "true",
        "foreign_county": "false",
        "tax_id_number": "SI20000002",
        "customer": "API partner 2",
        "street": "Slovenska cesta 200",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia",
        "partner_contact": {
            "name": "Rok Doltar",
            "phone": "05 320 24 88",
            "fax": "05 320 24 84",
            "gsm": "071 333 444",
            "email": "test@test.co.uk"
        }
    },
    "sales_pricelist_code" : "118",
    "prepayment_percent" : "15",
    "discount_percent" : "20",
    "currency_code" : "USD",
    "status_code" : "shipped",
    "pariteta" : "Lasten Prevzem",
    "doc_created_email" : "m@m.com",
    "parcel_shop_id" : "P100",
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
    "method_of_payment" : "on_deliver",
    "product_list": [
        {
            "code": "art1",
            "amount": "1",
            "price" : "100",
            "tax" : "EX4"
        }
    ]
    , "order_create_ts": "2014-09-13T12:13:15+02:00"
}
```

Notes : 
* prepayment\_percent - for exact value you can use prepayment\_value
* discount\_percent - for exact value you can use discount_value

### Example minimal request :
```javascript
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

### Example minimal update request :
```javascript
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
```javascript
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
