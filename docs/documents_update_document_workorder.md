## Workorder - update

### Example : add work to all positions ("izdelava - vsi")
**URL** : https://main.metakocka.si/rest/eshop/v1/update_document_workorder

Notes :
* mk_id is MetaKocka Id for current workorder

```javascript
{
  "work_list" : [
    {
      "product_mk_id" : "1609555946",
      "amount_realization" : 93,
      "performer_name_list" : [
        {
          "email" : "user@gmail.com"
        }
      ],
      "when" : "28.11.2016, 09:32",
      "type" : "work"
    }
  ],
  "mk_id" : "1609556075",
  "secret_key" : "8899",
  "company_id" : "16"
}
```
### Example : update product realization
**URL** : https://main.metakocka.si/rest/eshop/v1/update_document_workorder

``` javascript
{ 
"mk_id":"1600444898",
"company_id": "16", 
"secret_key": "8899",
 "product_list":[
 { 
   "mk_id":"1600445170",
   "type":"product_plan_realization", 
   "amount_realization":"5", 
   "when":"2016-09-16+02:00" 
  }
 ]
}
```

### Example : adding new product and material plan and realization
**URL** : https://main.metakocka.si/rest/eshop/v1/update_document_workorder

``` javascript
{ 
"mk_id":"1600436014",
"company_id": "16", 
"secret_key": "8899",
	"product_list":[
		{ 
			"mk_id":-1, 
			"type":"product_plan", 
			"product_mk_id":"1600000089", 
			"warehouse_code":"nas1", 
			"amount_plan":"11", 
			"purchase_price":"8", 
			"when":"2016-09-16+02:00" 
		}
		,
		{ 
			"type":"product", 
			"product_mk_id":"1600000089", 
			"warehouse_code":"nas1", 
			"amount_realization":"3", 
			"purchase_price":"8", 
			"product_plan_mk_id":-1, 
			"when":"2016-09-16+02:00" 
		}
	],
	"material_list":[
		{ 
			"mk_id":-2, 
			"type":"material_plan", 
			"product_mk_id":"1600000066", 
			"position_mk_id":-1,
			"warehouse_code":"nas1", 
			"amount_plan":"11", 
			"purchase_price":"8", 
			"when":"2016-09-16+02:00" 
		}
		,
		{ 
			"type":"material", 
			"product_mk_id":"1600000066", 
			"warehouse_code":"nas1", 
			"amount_realization":"3", 
			"purchase_price":"8", 
			"position_mk_id":-1, 
			"product_plan_mk_id":-2, 
			"when":"2016-09-16+02:00" 
		}
	]
}
``` 

### Example : add work realization on product realization
**URL** : https://main.metakocka.si/rest/eshop/v1/update_document_workorder

``` javascript
{ 
"mk_id":"1600444898",
"company_id": "16", 
"secret_key": "8899",
 "work_list":[
 { 
   "type":"work", 
   "product_mk_id":"1600000089", 
   "amount_realization":"4", 
   "position_mk_id":"1600445170", 
   "when":"2016-09-16+02:00",
   "performer_name_list":"Matic Petek"
  }
 ]
}
```

### Example : update workorder header
**URL** : https://main.metakocka.si/rest/eshop/v1/update_document_workorder

The fields in the below example can be updated via REST method :
``` javascript
{
	"secret_key": "8899",
	"company_id": "16",
	"mk_id": "1600348221",
	
	"status_code": "Zaključen",
	"title": "Naziv test"
}
```

### Example : update workorder material and work prices
**URL** : https://main.metakocka.si/rest/eshop/v1/update_workorder_perform_operation

``` javascript
{
	"secret_key": "8899",
	"company_id": "16",
	"mk_id": "1600370455",
	
	"update_purchase_price_material": true,
	"update_purchase_price_work": true
}
```

### Example : update workorder finished date
**URL** : https://main.metakocka.si/rest/eshop/v1/update_workorder_perform_operation

``` javascript
{
	"secret_key": "8899",
	"company_id": "16",
	"mk_id": "1600370455",	
	"doc_date_finished": "2019-08-15+02:00"
}
```

### Example : add new plan realization and material realization with lot number and microlocation
**URL** : https://main.metakocka.si/rest/eshop/v1/update_document_workorder

```javascript
{
	"mk_id": "...",
	"secret_key": "8899",
	"company_id": "16",
	"product_list": [{
			"type": "product_plan",
			"product_mk_id": "1600373547",
			"warehouse_code": "nas1",			
			"amount_plan": "4",
			"purchase_price": "8",
			"when": "2016-09-16+02:00",
			"microlocation": "m3",
			"lot_number_value": "l2"
		}
	],
	"material_list": [{
			"type": "material",
			"product_mk_id": "1600373547",
			"warehouse_code": "nas1",
			"amount_realization": "3",
			"purchase_price": "8",
			"product_plan_mk_id": "1600373733",
			"position_mk_id": "1600373675",
			"when": "2016-09-16+02:00",
			"microlocation": "m4",
			"lot_number_value": "51"
		}
	]
}```
