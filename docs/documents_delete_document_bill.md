## Bill - delete

**URL** : https://main.metakocka.si/rest/eshop/v1/delete_document

Valid doc_type :
* sales\_bill\_domestic
* sales\_bill\_foreign
* sales\_bill\_retail
* sales\_bill\_prepaid
* sales\_bill\_credit\_note
* purchase\_bill\_domestic
* purchase\_bill\_foreign
* purchase\_bill\_prepaid
* purchase\_bill\_credit\_note

Request :
```javascript
{  
  "mk_id" : "1600370614",
  "secret_key" : "8899",
  "company_id" : "16",  
  "doc_type" : "sales_bill_domestic"
}
```

Respond :
```javascript
{
  "opr_code":"0",
  "opr_time_ms":"12026"
}
```
