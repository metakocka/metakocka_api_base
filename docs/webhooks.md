# 1. Concept
Every change on document on stock can be send to other system via POST service. You will get the some data as calling get service on MetaKocka REST. 

Required paramethers :
* URL - webhook end point for POST call
* client_secret - secret token for signing POST content with HMAC.

Optional paramethers :
* basic_auth_username / basic_auth_password - end point can have extra HTTP Basic authentication

WebHook must return JSON with paramether "check_respond_status_json_ok" and value "true" (respond can have other JSON properties). For example :
``` javascript
{
  "status" : "ok"
}
```
If webhook end point is not available (or respond is not required JSON), MK will try two more time with 60 seconds delay.

POST request on webhook will have the following header paramethers :
* X-MetaKocka-Event - see EventType in description below. For example : warehouse_product_stock_update
* X-MetaKocka-Id - unique MK event id for log tracking
* X-MetaKocka-Signature - hash body value (HmacSHA1) with client_secret value and then Base64

POST content is UTF-8 encoded.  

# 2. Stock
EventType : warehouse_product_stock_update

When event is fired :
* every time stock is calculate for MK product. 

Columns :
* warehouse_id - MK warehouse identification,
* mk_id, count_code, code, title, unit -  MK product identification,
* amount - stock amount,
* reserved_amount - reservation amount (if MK customer has turn on reservation)
* free_amount - (amount - reserved_amount)

Notes :
* in stock_list you get stock amount for every active warehouse for given product. Even in product has no stock in this warehouse.
* if one product in one warehouse has different lot number / exporation date / serial number / microlocation - one JSON object would be for every stock that has different values of this paramethers.

Request example :
``` javascript
{
	"opr_code": "0",
	"opr_time_ms": "0",
	"stock_list_count": "2",
	"stock_list": [{
			"warehouse_id": "1600303267",
			"mk_id": "1600094857",
			"count_code": "PA-4020",
			"code": "150974832263",
			"title": "1,0 mm Düse für Mini HVLP Lackierpistole Spritzpistole Düsen set Nadel Rostfrei",
			"amount": "0",
			"reserved_amount": "0",
			"free_amount": "0",
			"unit": "kos"
		}, {
			"warehouse_id": "1600004367",
			"mk_id": "1600094857",
			"count_code": "PA-4020",
			"code": "150974832263",
			"title": "1,0 mm Düse für Mini HVLP Lackierpistole Spritzpistole Düsen set Nadel Rostfrei",
			"amount": "0",
			"reserved_amount": "0",
			"free_amount": "0",
			"unit": "kos"
		}
	]
}
```

# 3. Tutorial : set up webhook with test site
1. Open https://webhook.site/ and new test page will be created. Use "Your unique URL" and copy it to clipboard.

2. Create new webhook (see steps below)

![](/img/webhook_stock_1.png)

3. Go to MetaKocka and create new Prevzemnica with a material product and save document

4. Check webhook.site for request 

![](/img/webhook_stock_3.png)

5. Check MetaKocka for webhook log

![](/img/webhook_stock_4.png)
