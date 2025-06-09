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
                "useCustomerAsContact": "false",
                "mk_id": "180600025047",
                "mk_address_id": "180600073437"
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
                "useCustomerAsContact": "false",
                "mk_id": "180600025047",
                "mk_address_id": "180600073437"
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

### Set order direction for sorting

| Supported documents | Default order direction |
|---------------------|-------------------------|
| sales_order         | asc                     |
| warehouse documents | asc                     |
| workorder           | desc                    |

* Documents are sorted by mk_id
* "order_direction" parameter is optional

**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type":"sales_order",
    "limit" : "100",
    "order_direction":"asc"
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

### Search Sales orders by last change timestamp
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
			"type": "last_change_from",
			"value": "2019-12-17T14:28:54+02:00"
		}, {
			"type": "last_change_to",
			"value": "2020-12-17T14:28:54+02:00"
		}
	]
}
```

### Search Sales orders by profit center
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :

Notes:
* The 'value' field should contain the description of the profit center.
* Other query_advance parameters can also be added.

```javascript
{
	"secret_key": "8899",
	"company_id": "16",
	"doc_type": "sales_order",
	"result_type": "doc",
	"limit": 5,
	"offset": 0,
	"query_advance": [{
			"type": "profit_center",
			"value": "Profit center LJ"
		}
	]
}
```

### Search Sales orders with partner paramaters
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
			"type": "partner_recipient_name",
			"value": "Jaka Novak"
		}, {
			"type": "partner_recipient_email",
			"value": "test@mail.com"
		}, {
			"type": "partner_recipient_phone",
			"value": "031112321"
		}, {
			"type": "customer_order",
			"value": "PP-27012"
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
### Search Sales orders with profit center
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
			"type": "profit_center",
			"value": "ProfitCenter1"
		}
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

### Search Warehouse Documents only write off
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :

```javascript
{
	"secret_key": "8899",
	"company_id": "16",
	"doc_type": "warehouse_packing_list",
	"result_type": "doc",
	"limit": 5,
	"offset": 0,
	"query_advance": [{
			"type": "write_off",
			"value": "true"
		}
	]
}
```

Notes :
* Supported warehouse document types:
  * warehouse_packing_list

### Search Sales orders with products
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :

Notes:
* List of product IDs or codes seperated by a comma.
* product_id_list -> input product's MK ID
* product_code_list -> input product's code
* Only one list can be used in the same request
```javascript
{
	"secret_key": "8899",
	"company_id": "16",
	"doc_type": "sales_order",
	"result_type": "doc",
	"limit": 5,
	"offset": 0,
	"query_advance": [{
			"type": "product_id_list",
			"value": "1600601820,1600601234,1600307694"
		}, 
		OR
		{
			"type": "product_code_list",
			"value": "Code1,Code2,Code3"
		}
	]
}
```


### Search Complains by last change timestamp
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key": "8899",
    "company_id": "16",
    "doc_type": "complaint",
    "result_type": "doc",
    "limit": 5,
    "offset": 0,
    "query_advance": [
        {
            "type": "last_change_from",
            "value": "2023-01-17T14:28:54+02:00"
        },
        {
            "type": "last_change_to",
            "value": "2023-12-17T14:28:54+02:00"
        }
    ]
}

```

**Respond** :
```javascript
{
    "opr_code": "0",
    "opr_time": "37",
    "result_count": "2",
    "offset": "0",
    "limit": "5",
    "result": [
        {
            "mk_id": "1",
            "doc_type": "complaint",
            "opr_code": "0",
            "count_code": "1",
            "partner": {
                "mk_id": "180600025047",
                "business_entity": "false",
                "taxpayer": "false",
                "foreign_county": "false",
                "customer": "METAKOCKA, NAPREDNE SPLETNE APLIKACIJE, D.O.O",
                "street": "test 2",
                "post_number": "1000",
                "place": "Komenda",
                "country": "Slovenia",
                "count_code": "12565",
                "mk_address_id": "180600073437",
                "country_iso_2": "SI",
                "buyer": "true",
                "supplier": "false"
            },
            "status_code": "completed",
            "buyer_order": "PP-27400",
            "created_ts": "2023-05-31T12:41:02+02:00",
            "doc_link_list": [
                {
                    "mk_id": "400000002884",
                    "count_code": "PP-27400",
                    "doc_type": "sales_order"
                },
                {
                    "mk_id": "1600608186",
                    "count_code": "1-MK-2344",
                    "doc_type": "sales_bill_domestic"
                },
                {
                    "mk_id": "400000002885",
                    "count_code": "PP-27401",
                    "doc_type": "sales_order"
                },
                {
                    "mk_id": "1600608194",
                    "count_code": "1-MK-2345",
                    "doc_type": "sales_bill_credit_note"
                }
            ],
            "last_change_user": "Glavni account",
            "complaint_products": {
                "count_code": "90040",
                "mk_id": "1600600802",
                "code": "art123",
                "amount": "2",
                "price": "1.00",
                "discount": "4",
                "tax": "EX4"
            },
            "replacement_products": {
                "count_code": "PA_115_PA",
                "mk_id": "1600000392",
                "code": "art1",
                "amount": "1",
                "price": "1.00",
                "discount": "4",
                "tax": "EX4"
            },
            "additional_data": "{\r\n  \"completed_status_datetime\" : \"2023-05-31 13:05:11\",\r\n  \"customer_notes\" : [],\r\n  \"supplier_notes\" : [ ]\r\n}",
            "last_change_ts": "2023-05-31T14:54:45+02:00",
            "claim_note": "complaint",
            "reclamation_replacement": "false",
            "include_services": "false",
            "refund": "false",
            "damaged": "true",
            "warehouse_damaged": "novoSkl",
            "claim_type": "replacement"
        },
        {
            "mk_id": "4",
            "doc_type": "complaint",
            "opr_code": "0",
            "count_code": "4",
            "partner": {
                "mk_id": "180600025047",
                "business_entity": "false",
                "taxpayer": "false",
                "foreign_county": "false",
                "customer": "METAKOCKA, NAPREDNE SPLETNE APLIKACIJE, D.O.O",
                "street": "test 2",
                "post_number": "1000",
                "place": "Komenda",
                "country": "Slovenia",
                "count_code": "12565",
                "mk_address_id": "180600073437",
                "country_iso_2": "SI",
                "buyer": "true",
                "supplier": "false"
            },
            "status_code": "draft",
            "buyer_order": "PP-27404",
            "created_ts": "2023-05-31T17:03:12+02:00",
            "doc_link_list": [
                {
                    "mk_id": "400000002888",
                    "count_code": "PP-27404",
                    "doc_type": "sales_order"
                },
                {
                    "mk_id": "1600608217",
                    "count_code": "1-MK-2348",
                    "doc_type": "sales_bill_domestic"
                }
            ],
            "last_change_user": "Glavni account",
            "additional_data": "{\r\n  \"customer_notes\" : [],\r\n  \"supplier_notes\" : [ ]\r\n}",
            "last_change_ts": "2023-05-31T17:21:18+02:00",
            "claim_note": "complaint",
            "reclamation_replacement": "false",
            "include_services": "false",
            "refund": "false",
            "claim_type": "reclamation",
            "sales_order_new_status": "Novo naročilo"
        }
    ]
}
```

### Additional options for Acceptance notes

You can use addition query paramethers (with doc_date_from and doc_date_to) for filtering return documents :
* show_only_open - documents without invoice
* show_only_real_acceptance_note - skiw automatic credit note acceptance notes.

```javascript
{
	"secret_key": "8899",
	"company_id": "16",
	"doc_type": "warehouse_acceptance_note",
	"result_type": "doc",
	"limit": 5,
	"offset": 0,
	"query_advance": [
	    {
            "type": "doc_date_from",
            "value": "2023-04-19+02:00"
        },
        {
            "type": "doc_date_to",
            "value": "2023-05-19+02:00"
        },
        {
            "type": "show_only_real_acceptance_note",
            "value": true
        }		
	]
}
```

### Sales order - status change

Notes:
* Retrieve sales orders whose status changed to one of the listed statuses between the provided dates.
* All three parameters ("status_change_from", "status_change_to", "status_change_list") are required.

**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key": "8899",
    "company_id": "16",
    "doc_type": "sales_order",
    "result_type": "doc",
    "limit": 100,
    "offset": 0,
    "query_advance": [
        {
            "type": "status_change_from",
            "value": "2023-05-05T00:00:00+02:00"
        },
        {
            "type": "status_change_to",
            "value": "2023-12-21T00:00:00+02:00"
        },
        {
            "type": "status_change_list",
            "value": "canceled,lost,damaged"
        }
    ]
}

```

### Sales order - status code

Notes:
* Parameter "show_status_code": "true"/"false"
* Return "status_code" when searching sales orders and not fetching full document data.

**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key": "8899",
    "company_id": "16",
    "doc_type": "sales_order",
    "limit": 100,
    "offset": 0,
    "show_status_code":"true",
    "query_advance": [
        {
            "type": "doc_date_from",
            "value": "2023-04-19+02:00"
        },
        {
            "type": "doc_date_to",
            "value": "2023-05-19+02:00"
        }
    ]
}
```

**Respond**
```javascript
{
    "opr_code": "0",
    "opr_time": "0",
    "result_all_records": "449",
    "result_count": "1",
    "offset": "0",
    "limit": "1"
    "result": [
        {
            "mk_id": "400000001511",
            "opr_code": "0",
            "count_code": "PP-27162",
            "status_code": "Odpremljen"
        }
    ]
}
```

### Transfer order - search

Notes:
* Limit transfer order search by date, warehouses or product specific parameters

**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key": "8899",
    "company_id": "16",
    "doc_type": "transfer_order",
    "result_type": "doc",
    "limit": 100,
    "offset": 0,
    "query": "query example"
    "query_advance": [
        {
            "type": "doc_date_from",
            "value": "2024-10-05+02:00"
        },
        {
            "type": "doc_date_to",
            "value": "2025-12-21+02:00"
        },
        {
            "type": "product_code",
            "value": "artPrevzemTest2"
        },
        {
            "type": "warehouse_from",
            "value": "oznaka2"
        },
        {
            "type": "warehouse_to",
            "value": "whnaslov"
        },
        {
            "type": "product_lot_number",
            "value": "lot1"
        },
        {
            "type": "product_exp_date",
            "value": "2024-03-14+02:00"
        },
        {
            "type": "product_serial_number",
            "value": "213213"
        }
    ]
}

```

