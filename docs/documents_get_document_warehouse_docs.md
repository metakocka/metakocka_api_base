## Warehouse docs (delivery note, packing list, etc) - delete

**URL** : https://main.metakocka.si/rest/eshop/v1/delete_document

Valid doc_type :
* warehouse\_delivery\_note
* warehouse\_packing\_list
* warehouse\_receiving\_note
* warehouse\_acceptance\_note

Request :
```javascript
{  
  "mk_id" : "400000006237",
  "secret_key" : "8899",
  "company_id" : "16",  
  "doc_type" : "warehouse_acceptance_note"
}
```

Respond :
```javascript
{
  "opr_code": "0",
  "opr_time_ms": "232"
}
```
