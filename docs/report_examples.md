## Examples

### Bill with background image
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/report) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "mk_id" : "1600204439",
  "report_id" : "38",
   "params" : [
    { "type" : "ADD_ATT_HIDDEN_SHOW_BACKGROUND_IMAGE", "value" : "true" },
    { "type" : "ADD_ATT_HIDDEN_MK_BACKGROUND_IMAGE_ID", "value" : "1600161321" }
    ]
}
```

### RVC (return of investment) report between from and to date. In Excel.
**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "report_id" : "109",
   "params" : [
    { "type" : "ADD_ATT_DATE_MK_DATUM_OD", "value" : "12.05.2015" },
    { "type" : "ADD_ATT_DATE_MK_DATUM_DO", "value" : "17.05.2015" },
    { "type" : "REPORT_TYPE", "value" : "XLS" }    
    ]
}
```