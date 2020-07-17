**URL** : https://main.metakocka.si/rest/eshop/v1/get_document

# get_document - Sales Order
**Example** :

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "doc_id" : "1600202487"
}
```
Respond :
```javascript
{
	"mk_id": "1600203487",
	"doc_type": "sales_order",
	"opr_code": "0",
	"count_code": "PP-18495",
	"doc_date": "2015-05-08+02:00",

	"partner": {
		"business_entity": "true",
		"taxpayer": "true",
		"foreign_county": "false",
		"tax_id_number": "SI78552478",
		"customer": "3D ART d.o.o.",
		"street": "Glavarjeva ulica 49",
		"post_number": "1000",
		"place": "Ljubljana",
		"country": "Slovenia",
		"count_code": "1000",
		"useCustomerAsContact": "false"
	},
	"receiver": {
		"business_entity": "true",
		"taxpayer": "true",
		"foreign_county": "false",
		"tax_id_number": "SI78552478",
		"customer": "3D ART d.o.o.",
		"street": "Ulica 2",
		"post_number": "2000",
		"place": "Kamnik",
		"country": "Slovenia",
		"count_code": "1000",
		"useCustomerAsContact": "false"
	},
	"sales_pricelist_code": "PC_115",
	"prepayment_value": "10",
	"discount_value": "20.12",
	"currency_code": "EUR",
	"status_code": "Novo naročilo",
	"title": "naziv1",
	"pariteta": "Dostava kupcu",
	"doc_created_email": "maticpetek@gmail.com",
	"delivery_deadline": "2015-05-10+02:00",
	"finish_date": "2015-05-10+02:00",
	"offer_list": [{
			"count_code": "PP424"
		}
	],
	"buyer_order": "narocilo1",
	"warehouse": "oznaka1",
	"delivery_type": "Lasten prevzem",
	"priority": "1-Nizka",
	"notes_header": "Opis zgoraj",
	"notes": "Opis spodaj",
	"product_list": [{
			"mk_id": "1600162716",
			"code": "mkp1",
			"name": "MK prenos 1",
			"name_desc": "MK prenos 1 artikel opis",
			"unit": "kos",
			"amount": "2",
			"price": "10",
			"tax": "EX4",
			"doc_desc": "Opis na prodajnem naročilu"
		}, {
			"mk_id": "1600162716",
			"code": "mkp1",
			"name": "MK prenos 1",
			"name_desc": "MK prenos 1 artikel opis",
			"unit": "kos",
			"amount": "3",
			"price_with_tax": "15",
			"tax": "EX4",
			"doc_desc": "Opis na prodajnem naročilu"
		}
	],
	"sum_basic": "46.19",
	"sum_discount": "20.12",
	"sum_tax_ex4": "10.16",
	"sum_prepayment": "5.64",
	"sum_all": "56.35",
	"sum_paid": "10",
	"method_of_payment" : "paypal",
	"order_create_ts": "2015-05-08T12:13:15+02:00",
	"parcel_shop_id": "P100",
	"doc_link_list": [{
			"mk_id": "1600373113",
			"count_code": "1-MK-1406",
			"doc_type": "sales_bill_domestic"
		}, {
			"mk_id": "400000006162",
			"count_code": "SK1_4336",
			"doc_type": "warehouse_packing_list"
		}, {
			"mk_id": "400000000161",
			"count_code": "PP-26755",
			"doc_type": "sales_order"
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
	]
}
```
Request - by buyer order (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "buyer_order" : "79473216"
}
```

# get_document - Sales Order with delivery service events
**Example** :

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "doc_id" : "1600202487",
  "return_delivery_service_events" : "true"
}
```
Respond :
```javascript
{
  	...
	"delivery_service_events": [
		{
			"event_code": "-1",
			"event_date": "2017-10-11T14:28:54+02:00",
			"event_status": "Dodana koda za sledenje: 5853626"
		},
		{
			"event_code": "0",
			"event_date": "2017-10-11T14:28:54+02:00",
			"event_status": "Data sent"
		},
		{
			"event_code": "0",
			"event_date": "2017-10-11T14:28:54+02:00",
			"event_status": "APL - registration"
		}
    	]
}
```

# get_document - Sales Order with delivery stats
**Example** :

Request (POST - https://main.metakocka.si/rest/eshop/v1/get_document) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "doc_type" : "sales_order",
  "doc_id" : "1600202487",
  "return_delivery_stats" : "true"
}
```
Respond :
```javascript
{
  	...
	"delivery_stats": {
            "order_create_ts": "2020-06-26+02:00",
            "date_delivery_service_accepted": "2020-07-10+02:00",
            "date_first_delivery": "2020-07-13+02:00",
            "date_delivery_finished": "2020-07-13+02:00",
            "first_delivery_date": "2020-07-13+02:00",
            "last_delivery_service_event_code": "3.120",
            "last_delivery_service_event_date": "2020-07-13+02:00",
            "last_delivery_service_event_place": "Ansfelden",
            "all_delivery_service_place": "10.07.2020,Anthering;13.07.2020,Ansfelden",
            "tracking_last_event": "2020-07-17T18:52:58+02:00"
        }
    	]
}
```

## Special paramethers
* show\_last\_payment\_date - see [Bill example](/docs/documents_get_document_bill.md)

