## Sales order - update
You can update specific fields on sales order (see list below). In background the some operation will be perform as when sales order is change on user interface (change log, events for sendings emails, etc). Supported fields :
* delivery_type
* status_code
* tracking_code

All values are change only if new valus is different then previous value. 

You can identify sales order by mk_id or buyer_order.

**URL** : https://main.metakocka.si/rest/eshop/v1/update_document_workorder

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
  "tracking_code" : "SI2001"
}
```

Respond :
```javascript
{
  "opr_code":"0",
  "opr_time_ms":"12026"
}
```
