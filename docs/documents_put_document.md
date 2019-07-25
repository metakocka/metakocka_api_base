**URL** : https://main.metakocka.si/rest/eshop/v1/put_document

# 2. put_document

## 2.2 Bill
Valid doc_type :
* sales\_bill\_domestic
* sales\_bill\_foreign
* sales\_bill\_retail
* purchase\_bill\_domestic
* purchase\_bill\_foreign

### Example : Sales bill - minimum request
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_bill_domestic",
    "count_code": "bill1",
    "doc_date" : "2014-11-23+02:00",
    "service_to_date" : "2014-11-22+02:00",    
    "duo_payment" : "2014-11-24+02:00",    
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

### Example : Sales bill - minimum request + add payment
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_bill_domestic",
    "count_code": "bill1",
    "doc_date" : "2014-11-23+02:00",
    "service_to_date" : "2014-11-22+02:00",    
    "duo_payment" : "2014-11-24+02:00",    
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
}
```

### Example : Sales bill foreign - full request
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_bill_foreign",
    "count_code": "bill2",
    "doc_date" : "2014-11-23+02:00",
    "service_from_date" : "2014-11-01+02:00",        
    "service_to_date" : "2014-11-22+02:00",    
    "duo_payment" : "2014-11-24+02:00",    
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
    "sales_pricelist_code" : "PC_106_PC",    
    "discount_value" : "50",
    "currency_code" : "USD",
    "title" : "test foreign bill",
    "pariteta" : "Lasten prevzem",
    "doc_created_email" : "m@m.com",
    "offer_list" : [
    	{
    		"count_code" : "PP1_262"
    	},
    	{
    		"count_code" : "PP1_263"
    	}    	
    ],
    "buyer_order" : "border1",
    "warehouse" : "mesto1",
    "delivery_type" : "Logo",
    "location_of_service" : "Maribor",
    "notes" : "short description",
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

### Example : Purchase bill - minimum request
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "purchase_bill_domestic",
    "count_code": "bill3",
    "doc_date" : "2014-11-23+02:00",    
    "duo_payment" : "2014-11-24+02:00",    
    "receive_date" : "2014-11-25+02:00",    
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

### Example : Purchase bill foreign - full request
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "purchase_bill_foreign",
    "count_code": "bill3",
    "count_code_internal" : "int3",
    "doc_date" : "2014-11-23+02:00",    
    "duo_payment" : "2014-11-24+02:00",    
    "receive_date" : "2014-11-25+02:00",    
    "service_to_date" : "2014-11-22+02:00",    
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
    "sales_pricelist_code" : "PC_106_PC",    
    "discount_value" : "50",
    "currency_code" : "USD",
    "title" : "test foreign bill",
    "pariteta" : "Lasten prevzem",
    "doc_created_email" : "m@m.com",
    "order_list" : [
    	{
    		"count_code" : "34"
    	},
    	{
    		"count_code" : "35"
    	}    	
    ],
    "buyer_order" : "border1",
    "warehouse" : "mesto1",
    "delivery_type" : "Logo",
    "location_of_service" : "Maribor",
    "notes" : "short description",
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

### Example : Sales bill with bank reference number
```javascript
{
    "secret_key":"mysecret",
    "company_id":"16",
    "doc_type": "sales_bill_domestic",
    "doc_date" : "2016-06-04+02:00",
    "service_to_date" : "2016-06-04+02:00",
    "duo_payment" : "2016-06-04+02:00",
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
    "bank_ref_prefix" : "02",
    "bank_ref_number" : "100-200-300",
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

### Example : Credit note
```javascript
{
    "secret_key":"...",
    "company_id":"16",
    "doc_type": "sales_bill_credit_note",
    "count_code": "bill1",
    "doc_date" : "2014-11-23+02:00",
    "service_to_date" : "2014-11-22+02:00",    
    "duo_payment" : "2014-11-24+02:00",    
    "credit_note_type" : "goods",
    "credit_note_bill" : "bill2",
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

Notes :
* doc\_type must be "sales\_bill\_credit\_note"
* credit\_note\_type can be "goods" (you must specifiy connect bill via "credit\_note\_bill",) "financial" or "standalone".
* credit_note_bill search invoices by count_code. If more then one invoice has this count_code, the last one will be used (for calls after 24.7.2019). We highly recommended that in this case you use invoice counting that is unique accross all years. 
