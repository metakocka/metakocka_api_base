## Sales order - update
You can update specific fields on sales order (see list below). In background the some operation will be perform as when sales order is change on user interface (change log, events for sendings emails, etc). Supported fields :
* delivery_type
* status_code. Notes : if you set status_code = 'shipped', you should set shipped_date. 
* tracking_code
* shipped_date
* discount_value
* tracking_intermediate_code

All values are change only if new valus is different then previous value. 

You can identify sales order by mk_id or buyer_order.

**URL** : https://main.metakocka.si/rest/eshop/v1/update_document

Request :
```javascript
{  
  "mk_id" : "1600370614",
  OR
  "buyer_order" : "OR-100",
  
  "secret_key" : "8899",
  "company_id" : "16",  
  "doc_type" : "sales_order",
  
  "delivery_type": "Pošta Slovenije",
  "status_code" : "draft",
  "tracking_code" : "SI2001",
  "tracking_intermediate_code" : "KZ120022",
  "shipped_date" : "2019-09-26+02:00",
  "notes_header" : "notes zgoraj",
  "notes": "to so notes.",
  "warehouse" : "warehouse_mark"
}
```

Respond :
```javascript
{
  "opr_code":"0",
  "opr_time_ms":"12026"
}
```

### Sales order - update partner and receiver
**Notes**
- if you only want to change email (or any other field), you must provide whole partner or receiver structure
 as seen in the request example below.

**URL** : https://main.metakocka.si/rest/eshop/v1/update_document

Request :
```javascript
{  
  "mk_id" : "1600370614",
  OR
  "buyer_order" : "OR-100",
  
  "secret_key" : "8899",
  "company_id" : "16",  
  "doc_type" : "sales_order",
  
  "partner": {
          "business_entity": "false",
          "taxpayer": "true",
          "foreign_county": "false",
          "tax_id_number": "SI20000001",
          "customer": "API partner 1",
          "street": "Slovenska cesta 23",
          "post_number": "1000",
          "place": "Ljubljana",
          "province": "Severna primorska",
          "country": "Slovenia",
          "partner_contact": {
              "name": "Jaka Novak",
              "phone": "05 320 24 82",
              "fax": "05 320 24 62",
              "gsm": "071 333 442",
              "email": "test3@test.co.uk"
          }
  },
  "receiver": {
          "business_entity": "false",
          "taxpayer": "true",
          "foreign_county": "false",
          "tax_id_number": "SI20000002",
          "customer": "API partner 5",
          "street": "Slovenska cesta 55",
          "post_number": "1000",
          "place": "Ljubljana",
          "country": "Slovenia",
          "partner_contact": {
              "name": "Rok Doltar",
              "phone": "05 320 24 81",
              "fax": "05 320 24 81",
              "gsm": "071 333 441",
              "email": "test@test.co.uk"
          }
  }
}
```

Respond :
```javascript
{
  "opr_code":"0",
  "opr_time_ms":"4312"
}
```

### Sales order - adding and removing products
**Notes**
- If you only want to change stock amount you can use parameter "amount". Product stock on sales order will decrease by given amount. If given amount
is equal or exceeds product stock, product will be removed and remaining stock will be subtracted from the next same product until there is no stock or same 
products left.
- If parameter "amount" is not used, all products with the same code or mk_id will be removed.
- To change any other filed, you must remove the product first, then add it again. Both can be done in the same request.


**URL** : https://main.metakocka.si/rest/eshop/v1/update_document

Request :
```javascript
{  
  "mk_id" : "1600370614",
  OR
  "buyer_order" : "OR-100",
  
  "secret_key" : "8899",
  "company_id" : "16",  
  "doc_type" : "sales_order",

   "product_remove":[
          {
              "code":"product123",
              OR
              "mk_id": 1600335835,
              "amount":"2",
          }
   ],
   "product_add":[
          {
              "code": "art1",
              "amount": "1",
              "price_with_tax" : "100",
              "tax" : "EX4"
              OR
              "tax_factor": "0.22"
          }
   ]
}
```

Respond :
```javascript
{
  "opr_code":"0",
  "opr_time_ms":"2054"
}
```

### Sales order - update and create invoice

**URL** : https://main.metakocka.si/rest/eshop/v1/update_document

Request :
```javascript
{  
  "mk_id" : "1600370614",
  OR
  "buyer_order" : "OR-100",
  
  "secret_key" : "8899",
  "company_id" : "16",  
  "doc_type" : "sales_order",
  
  "create_invoice": "true",
  "delivery_type": "Pošta Slovenije",
  "status_code" : "draft",
  "tracking_code" : "SI2001",
  "shipped_date" : "2019-09-26+02:00",
  "notes_header" : "notes zgoraj",
  "notes": "to so notes."  
}
```

Respond :
```javascript
{
  "opr_code":"0",
  "opr_time_ms":"12026"
}
```

### Sales order - Add payment
Please use put_transaction call - https://github.com/metakocka/metakocka_api_base/blob/master/docs/put_transaction.md
