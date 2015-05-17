
# Concept

Let's start with example :

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

We print bill report (38) for bill document (1600204439) with background image.
Notes: for details about possible paramethers please contact support.

**Respond** :
If content type is application/json, output is standard error description. Otherwise is binary (PDF, Excel, etc) or string (xml). Check content-type Header paramether.