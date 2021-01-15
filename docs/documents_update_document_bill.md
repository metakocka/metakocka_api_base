## Bill - update
You can update specific fields on bill (see list below). In background the some operation will be perform as when bill is change on user interface (change log, events for sendings emails, etc). Supported fields :
* status_code

All values are change only if new valus is different then previous value. 

You can identify bill by mk_id or count_code.

**URL** : https://main.metakocka.si/rest/eshop/v1/update_document

Request :
```javascript
{  
  "mk_id" : "1600370614",
  OR
  "count_code" : "OR-100",
  
  "secret_key" : "8899",
  "company_id" : "16",  
  "doc_type" : "sales_bill_domestic",
   
  "status_code" : "draft"
}
```

Respond :
```javascript
{
  "opr_code":"0",
  "opr_time_ms":"12026"
}
```
Notes :
* you can set status to null value by settings "status_code : "" (empty value)
