## Examples

### Simple query search with query window
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type":"sales_bill_domestic",
    "query" : "john",
    "offset" : "10",
    "limit" : "10"
}
```

### Advance search
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type":"sales_bill_domestic",
    "query_advance" : [
    { "type" : "partner_tax_num", "value" : "TAX123" }
    ]
}
```

### Return documents as result
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type":"sales_bill_domestic",
    "query" : "john",
    "result_type" : "doc"
}
```

**Respond** :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "62",
    "result_all_records": "1",
    "result_count": "1",
    "offset": "0",
    "limit": "1",
    "result": [
        {
            "mk_id": "1600203710",
            "doc_type": "sales_bill_domestic",
            "opr_code": "0",
            "count_code": "PRD1_494",
            "doc_date": "2015-05-10+02:00",
            "partner": {
                "business_entity": "false",
                "taxpayer": "false",
                "foreign_county": "false",
                "tax_id_number": "TAX123",
                "customer": "Dolg1",
                "street": "naslova",
                "post_number": "1000",
                "place": "Komenda",
                "country": "Slovenia",
                "count_code": "50513",
                "useCustomerAsContact": "false"
            },
            "receiver": {
                "business_entity": "false",
                "taxpayer": "false",
                "foreign_county": "false",
                "tax_id_number": "TAX123",
                "customer": "Dolg1",
                "street": "naslova",
                "post_number": "1000",
                "place": "Komenda",
                "country": "Slovenia",
                "count_code": "50513",
                "useCustomerAsContact": "false"
            },
            "service_to_date": "2015-05-10+02:00",
            "duo_payment": "2015-05-12+02:00",
            "currency_code": "EUR",
            "doc_created_email": "maticpetek@gmail.com",
            "location_of_service": "1komenda",
            "warehouse": "oznaka1",
            "product_list": [
                {
                    "mk_id": "1600095169",
                    "code": "9005617101394",
                    "amount": "2",
                    "price": "2",
                    "tax": "EX4"
                }
            ],
            "sum_basic": "4",
            "sum_tax_ex4": "0.88",
            "sum_all": "4.88"
        }
    ]
}
```

### Get invoices for particular date and not paid
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key": "8899",
    "company_id": "16",
    "doc_type": "sales_bill_domestic",
    "result_type": "doc",
    "limit": 100,
    "offset": 0,
    "query_advance": [
        {
            "type": "doc_date_from",
            "value": "2018-10-05+02:00"
        },
        {
            "type": "doc_date_to",
            "value": "2018-12-21+02:00"
        },
        {
            "type": "payment_status",
            "value": "false"
        }
    ]
}
```

### Get invoices without status. 
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key": "8899",
    "company_id": "16",
    "doc_type": "sales_bill_domestic",
    "result_type": "doc",
    "limit": 100,
    "offset": 0,
    "query_advance": [
      {
            "type": "status_id_list",
            "value": "-2"
        }
    ]
}
```

### Search Sales order with given status 
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :

```javascript
{
	"secret_key": "8899",
	"company_id": "16",
	"doc_type": "sales_order",
	"result_type": "doc",
	"limit": 5,
	"offset": 0,
	"query_advance": [{
			"type": "doc_date_from",
			"value": "2018-12-17+02:00"
		}, {
			"type": "doc_date_to",
			"value": "2018-12-17+02:00"
		}, {
			"type": "status_list",
			"value": "draft,ready_to_ship"
		}, {
			"type": "partner_country",
			"value": "Slovenia"
		}, {
			"type": "delivery_type",
			"value": "posta_slovenije"			
		}
	]
}
```

Notes :
* status_list is value "Opis" in register type "Prodajna naročila - status"
* partner_country can be in any localized value. But we recommended US name. 
* delivery_type is value "Opis" in register type "Vrsta dostave"

### Search Sales orders by last tracking event change date
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :

```javascript
{
	"secret_key": "8899",
	"company_id": "16",
	"doc_type": "sales_order",
	"result_type": "doc",
	"limit": 5,
	"offset": 0,
	"query_advance": [{
			"type": "tracking_last_event_date_from",
			"value": "2019-12-17T14:28:54+02:00"
		}, {
			"type": "tracking_last_event_date_to",
			"value": "2020-12-17T14:28:54+02:00"
		}
	]
}
```

### Return Sales Orders with delivery service events
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :

```javascript
{
	"secret_key": "8899",
	"company_id": "16",
	"doc_type": "sales_order",
	"result_type": "doc",
	"limit": 5,
	"offset": 0,
	"return_delivery_service_events":true
}
```
**Respond** :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "8304",
    "result_all_records": "1",
    "result_count": "1",
    "offset": "0",
    "limit": "5",
    "result_product": [
        {
            "count_code": "a15632",
            "mk_id": "1600160544",
            "code": "518776-ODPRODAJA",
            "name": "AKCIJA Dunlop 175/70R14 SP Wint.Resp.84T DOT4311",
            "unit": "kos",
            "service": "false",
            "sales": "true",
            "purchasing": "true",
            "weight": "7,3"
        },
            "extra_column": [
                {
                    "name": "tracking_number",
                    "value": "CF123456123I"
                }
            ],
            "delivery_service_events": [
                {
                    "event_code": "902",
                    "event_date": "2020-04-17+02:00",
                    "event_status": "In transit"
                },
                {
                    "event_code": "901",
                    "event_date": "2020-04-17+02:00",
                    "event_status": "Shipping registered in our systems but not yet shipped"
                }
            ]
    ]
}
```
### Return products as result
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type":"purchase_product",
    "query_advance" : [
    { "type" : "eshop_sync", "value" : "true" }
    ],  
    "result_type" : "doc",
    "limit" : "2"    
}
```

**Respond** :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "8304",
    "result_all_records": "2",
    "result_count": "2",
    "offset": "0",
    "limit": "2",
    "result_product": [
        {
            "count_code": "a15631",
            "mk_id": "1600160543",
            "code": "547779-ODPRODAJA",
            "name": "AKCIJA BFGoodrich 205/55R16 G-ForceWinter 94H XL",
            "unit": "kos",
            "service": "false",
            "sales": "true",
            "purchasing": "true"
        },
        {
            "count_code": "a15632",
            "mk_id": "1600160544",
            "code": "518776-ODPRODAJA",
            "name": "AKCIJA Dunlop 175/70R14 SP Wint.Resp.84T DOT4311",
            "unit": "kos",
            "service": "false",
            "sales": "true",
            "purchasing": "true",
            "weight": "7,3"
        }
    ]
}
```

### Sales Order - extra parameters for webshop orders
If you are using sales order as target document for orders from webshop, you will get extra attributes :
* buyer IP address
* store URL
* tracking number (if stickers was already printed or tracking number was imported).

**Example** :
```javascript
{
	"opr_code": "0",
	"opr_time": "0",
	"result_all_records": "960",
	"result_count": "960",
	"offset": "0",
	"limit": "1",
	"result": [{
			"mk_id": "160008942974",
			"doc_type": "sales_order",
			"opr_code": "0",
			"count_code": "2064269",
			"doc_date": "2018-12-27+02:00",
			"partner": {
				"mk_id": "190008942971",
				"business_entity": "false",
				"taxpayer": "false",
				"foreign_county": "true",
				"customer": "Janez Kljajic",
				"street": "Ulica, 131",
				"post_number": "35221",
				"place": "Dunaj",
				"country": "Croatia",
				"count_code": "9040783338",
				"partner_contact": {
					"gsm": "0811120408",
					"email": "test@gmail.com"
				}
			},
			"currency_code": "HRK",
			"status_code": "Odpremljen",
			"doc_created_email": "narocila@mycompany.si",
			"buyer_order": "2064269",
			"warehouse": "glavno",
			"delivery_type": "GLS Hrvaška",
			"product_list": [{
					"count_code": "7886",
					"mk_id": "160005644924",
					"code": "radarBLU",
					"name": "radarBLU",
					"unit": "kos",
					"amount": "1",
					"price": "200",
					"price_with_tax": "299",
					"tax": "EX1"
				}
			],
			"extra_column": [{
					"name": "ip",
					"value": "182.68.322.24"
				}, {
					"name": "store_url",
					"value": "https://myshop.com/v1/hr/radar/"
				}, {
					"name": "tracking_number",
					"value": "65407745"
				}
			],
			"sum_basic": "153.59",
			"sum_tax_ex1": "38.4",
			"sum_all": "191.99",
			"bank_ref_number": "SI004064269-8945974",
			"method_of_payment": "Po povzetju"
		}
	]
}
```

### Search Warehouse Documents with given status 
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :

```javascript
{
	"secret_key": "8899",
	"company_id": "16",
	"doc_type": "warehouse_acceptance_note",
	"result_type": "doc",
	"limit": 5,
	"offset": 0,
	"query_advance": [{
			"type": "status_list",
			"value": "aktiven,delno_aktiven"
		}
	]
}
```

Notes :
* Supported warehouse document types:
    * warehouse_acceptance_note
    * warehouse_packing_list