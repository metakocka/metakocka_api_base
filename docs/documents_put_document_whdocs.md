**URL** : https://main.metakocka.si/rest/eshop/v1/put_document

## 2.3 Warehouse docs (delivery note, packing list, etc)
Valid doc_type :
* warehouse\_delivery\_note
* warehouse\_packing\_list
* warehouse\_receiving\_note
* warehouse\_acceptance\_note

### 2.4.1 Warehouse delivery note
TODO

### 2.4.2 Warehouse packing list
TODO

### 2.4.3 Warehouse receiving note
**Example full request** :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "warehouse_receiving_note",
    "count_code": "rest_test_1",
    "doc_date" : "2014-12-21+02:00",
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
    "order_list" : [
    	{
    		"count_code" : "37"
    	},
    	{
    		"count_code" : "38"
    	}    	
    ],
    "discount_value" : "15",
    "currency_code" : "EUR",
    "doc_created_email" : "m@m.com",    
    "purchase_pricelist_code" : "cenik_pr_1",
    "status_code" : "delno_aktiven",
    "warehouse" : "glavni",
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

### 2.4.4 Warehouse acceptance note

**Example full request** :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type": "warehouse_acceptance_note",
    "count_code": "rest_test_1",
    "doc_date" : "2014-12-21+02:00",
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
    "order_list" : [
    	{
    		"count_code" : "37"
    	},
    	{
    		"count_code" : "38"
    	}    	
    ],
    "receiving_note_list" : [
    	{
    		"count_code" : "np1"
    	},
    	{
    		"count_code" : "np2"
    	}    	    
    ],    
    "discount_value" : "15",
    "currency_code" : "EUR",
    "doc_created_email" : "m@m.com",    
    "purchase_pricelist_code" : "cenik_pr_1",
    "sales_pricelist_code" : "PC-2013",    
    "status_code" : "delno_aktiven",
    "packlist_code" : "pc1",
    "packlist_date" : "2014-12-20+02:00",,
    "warehouse" : "glavni",
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
