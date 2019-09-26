## Sales order - update
You can update specific fields on sales order (see list below). In background the some operation will be perform as when sales order is change on user interface (change log, events for sendings emails, etc). Supported fields :
* delivery_type
* status_code. Notes : if you set status_code = 'shipped', you should set shipped_date. 
* tracking_code
* shipped_date

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
  "shipped_date" : "2019-09-26+02:00"
}
```

Respond :
```javascript
{
  "opr_code":"0",
  "opr_time_ms":"12026"
}
```
