**URL** : https://main.metakocka.si/rest/eshop/v1/put_document

Development environment [more](https://metakocka.freshdesk.com/a/solutions/articles/3000088225) : https://devmainsi.metakocka.si/rest/eshop/v1/put_document

# 2. put_document

## 2.2 Bill
Valid doc_type :
* sales\_bill\_domestic
* sales\_bill\_foreign
* sales\_bill\_retail
* sales\_bill\_credit\_note
* purchase\_bill\_domestic
* purchase\_bill\_foreign
* purchase\_bill\_credit\_note

### Example : Sales bill - minimum request
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_bill_domestic",
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

Notes :
* if you add payment "Gotovina", you can add cash register name with paramether "cashRegister" in "mark_paid" object. 

### Example : Sales bill foreign - full request
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_bill_foreign",    
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

### Example : Credit note - financial

Notes :
* doc\_type must be "sales\_bill\_credit\_note" or "purchase\_bill\_credit\_note"
* credit\_note\_type must be "financial"
* credit_note_bill is count_code of linked invoice. If more than one invoice has this count_code, the last one will be used (for calls after 24.7.2019). We highly recommended that in this case you use invoice counting that is unique across all years.
* products in "product_list" must be service, not material type
* "credit\_note\_type" and "credit_note_bill" parameters are used for both credit and debit notes

```javascript
{
    "secret_key":"...",
    "company_id":"16",
    "doc_type": "sales_bill_credit_note",
    "count_code": "1-MK-1831",
    "doc_date" : "2021-11-205+02:00",
    "service_to_date" : "2021-11-05+02:00",    
    "duo_payment" : "2021-11-05+02:00",    
    "credit_note_type" : "financial",
    "credit_note_bill" : "1-MK-1830",
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


### Example : Credit note - goods

Notes :
* doc\_type must be "sales\_bill\_credit\_note" or "purchase\_bill\_credit\_note"
* credit\_note\_type must be "goods"
* credit_note_bill is count_code of linked invoice. If more than one invoice has this count_code, the last one will be used (for calls after 24.7.2019). We highly recommended that in this case you use invoice counting that is unique across all years.
* products in "product_list" must be the same as on linked invoice
* "credit\_note\_type" and "credit_note_bill" parameters are used for both credit and debit notes

```javascript
{
    "secret_key":"...",
    "company_id":"16",
    "doc_type": "sales_bill_credit_note",
    "doc_date" : "2021-11-205+02:00",
    "service_to_date" : "2021-11-05+02:00",    
    "duo_payment" : "2021-11-05+02:00",    
    "credit_note_type" : "goods",
    "credit_note_bill":"1-MK-1830",
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


### Example : Credit note - standalone

Notes :
* doc\_type must be "sales\_bill\_credit\_note" or "purchase\_bill\_credit\_note"
* credit\_note\_type must be "standalone"
* credit\_note\_type parameter is used for both credit and debit notes

```javascript
{
    "secret_key":"...",
    "company_id":"16",
    "doc_type": "sales_bill_credit_note",
    "doc_date" : "2021-11-205+02:00",
    "service_to_date" : "2021-11-05+02:00",    
    "duo_payment" : "2021-11-05+02:00",   
    "credit_note_type" : "standalone",
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

### Example : Serial numbers, Lot numbers, Microlocations, Expiration date
```javascript
{
  "secret_key":"...",
  "company_id":"16",
    "doc_type": "sales_bill_domestic",
    "doc_date": "2020-03-05+02:00",
    "partner": {
        "mk_id": "1600036997",
        "business_entity": "false",
        "taxpayer": "false",
        "foreign_county": "false",
        "customer": "Janez Novak",
        "street": "street 1",
        "post_number": "1000",
        "place": "Ljubljana",
        "country": "Slovenia",
        "count_code": "1600036997"
    },
    "service_to_date": "2020-03-05+02:00",
    "duo_payment": "2020-03-05+02:00",
    "currency_code": "EUR",
    "product_list": [
        {
            "mk_id": "1600373697",
            "code": "serial_full",
            "amount": "2",
            "price": "10",
            "tax": "EX4",
            "microlocation": "m2",
            "serial_number_value": "s1,s2",
            "lot_number_value": "l1",
            "expiration_date_value": "2020-03-02+02:00"
        }
    ]
}
```

### Example : return info about credit notes (if exists)
Notes :
* use "return_credit_note_for_invoice" : "true"

Request :
```javascript
{
  "secret_key":"...",
  "company_id":"16",
  "doc_type":"sales_bill_domestic",
  "result_type" : "doc",
  "return_credit_note_for_invoice" : "true",
  "query" : "N300400"
}
```

Respond :
```javascript
...
"credit_note_list": [
    {
        "mk_id": "1600376160",
        "count_code": "1-MK-1624"
    }
],
...      
```

### Example : Products - Tax factor
Notes :
* Enabled for all 5 valid document types.

```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "sales_bill_domestic",
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
            "price_with_tax" : "122",
            "tax_factor" : "0.22"
        }
    ]
}
```
### Example : Prepaid bill - link to offer
```javascript
{
	"secret_key": "REMOVE_SECRET_KEY",
	"company_id": "16",
	"doc_type": "sales_bill_prepaid",
	"doc_date": "16.02.2022",
	"duo_payment": "16.02.2022",
	"service_to_date": "16.02.2022",
	"partner": {
		"customer": "Janez Novak",
		"street": "Jutranja cesta 164",
		"post_number": "2000",
		"place": "Maribor",
		"country": "Slovenia"
	},
	"offer_list": {
		"count_code": "35348\/2022"
	},
	"notes": "avansni racun 75585",
	"product_list": [{
			"count_code": "2729",
			"amount": "4",
			"tax": "220",
			"price_with_tax": "25.99"
		}
	]
}
```

### Example : Sales bill - force count code
Use paramether count_code with invoice code prefix
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "count_code":"COUNT_CODE_SELECT#I2022-"
    "doc_type": "sales_bill_domestic",
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
