
# 2. put_document

## 2.1 sales\_order
**Example full request** :
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
    "delivery_deadline" : "2014-09-14+02:00",
    "warehouse" : "glavni",
    "delivery_type" : "DHL",
    "priority" : "3-Visoka",
    "finish_date" : "2014-09-15+02:00",
    "buyer_order" : "border",
    "notes_header" : "notes zgoraj",
    "notes": "to so notes.",
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
* prepayment\_percent - for exact value you can use prepayment\_value
* discount\_percent - for exact value you can use discount_value

**Example minimal request** :
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

## 2.2 Bill
Valid doc_type :
* sales\_bill\_domestic
* sales\_bill\_foreign
* sales\_bill\_retail
* purchase\_bill\_domestic
* purchase\_bill\_foreign

**Example : Sales bill - minimum request** :
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

**Example : Sales bill foreign - full request** :
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

**Example : Purchase bill - minimum request** :
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

**Example : Purchase bill foreign - full request** :
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