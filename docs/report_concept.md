# Concept

Let's start with an example :

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

# How to get params
The easier way to generate params is from current reports :
* open report in web application (for example Bill)
* you will see URL in browser : https://main.metakocka.si/metakockamain/MetaKockaBridge.....
* add paramether : &dump\_for\_report\_rest=true
* you will get JSON template for request call (just add secret\_key and company\_id). For example :

```javascript
{  
   "mk_id":"1600287506",
   "report_id":"38",
   "params":[  
      {  
         "value":"false",
         "type":"ADD_ATT_HIDDEN_MK_SHOW_NOT_PAID_BILL_WARNING"
      },
      {  
         "value":"D",
         "type":"ADD_ATT_HIDDEN_MK_TIP"
      },
      {  
         "value":"true",
         "type":"ADD_ATT_HIDDEN_SHOW_LOGOTIP_IMAGE"
      },
      {  
         "value":"1600192996",
         "type":"ADD_ATT_HIDDEN_MK_BACKGROUND_IMAGE_ID"
      },
      {  
         "value":"true",
         "type":"ADD_ATT_HIDDEN_MK_SHOW_ATTACH_IMAGE"
      },
      {  
         "value":"true",
         "type":"ADD_ATT_HIDDEN_MK_SHOW_PAYMENT_METHODS"
      },
      {  
         "value":"A4",
         "type":"ADD_ATT_HIDDEN_page_format"
      },
      {  
         "value":"false",
         "type":"ADD_ATT_HIDDEN_MK_SHOW_BRUTO_PRICE"
      },
      {  
         "value":"1",
         "type":"ADD_ATT_HIDDEN_MK_RAC_OBRAC"
      },
      {  
         "value":"false",
         "type":"ADD_ATT_HIDDEN_MK_PRODUCT_SUPPLIER"
      },
      {  
         "value":"true",
         "type":"ADD_ATT_HIDDEN_MK_SHOW_PRODUCT_SESTAV"
      },
      {  
         "value":"true",
         "type":"ADD_ATT_HIDDEN_SHOW_BACKGROUND_IMAGE"
      },
      {  
         "value":"false",
         "type":"ADD_ATT_HIDDEN_MK_EXTRA_COLUMNS_add_col_varchar1"
      },
      {  
         "value":"2",
         "type":"ADD_ATT_HIDDEN_MK_SHOW_ARTIKEL_NUM"
      },
      {  
         "value":"si",
         "type":"ADD_ATT_HIDDEN_MK_COUNTRY"
      },
      {  
         "value":"false",
         "type":"ADD_ATT_HIDDEN_MK_EXTRA_COLUMNS_add_col_varchar0"
      },
      {  
         "value":"false",
         "type":"ADD_ATT_HIDDEN_MK_SHOW_DISCOUNT"
      },
      {  
         "value":"true",
         "type":"ADD_ATT_HIDDEN_MK_SHOW_WEIGHT"
      },
      {  
         "value":"false",
         "type":"ADD_ATT_HIDDEN_MK_SHOW_PRODUCT_DIMENSION"
      },
      {  
         "value":"false",
         "type":"ADD_ATT_HIDDEN_MK_SHOW_DN"
      },
      {  
         "value":"sl",
         "type":"ADD_ATT_HIDDEN_DEFAULT_LOCALE"
      },
      {  
         "value":"PDF",
         "type":"REPORT_TYPE"
      },
      {  
         "value":"true",
         "type":"ADD_ATT_HIDDEN_MK_SHOW_PARTNER_KONTAKT"
      },
      {  
         "value":"sales_bill,prodaja_artikli",
         "type":"ADD_ATT_HIDDEN_MK_EXTRA_COLUMNS_TYPES"
      },
      {  
         "value":"true",
         "type":"ADD_ATT_HIDDEN_MK_SHOW_ARTIKEL_DESC"
      },
      {  
         "value":"false",
         "type":"ADD_ATT_HIDDEN_MK_SERIAL_LOT_EXP_DATA"
      },
      {
        "value" : "01.07.2017",
        "type" : "ADD_ATT_DATE_MK_DATUM_FROM"
      },
      {
        "value" : "01.08.2017",
        "type" : "ADD_ATT_DATE_MK_DATUM_TO"
      }
   ]
}
```

# Special parameters
Customers has also ask us to provide some addition paramethers for further report customization.

Attribute                 | Description | Documents|
--------------------------|------|------|
| ADD\_ATT\_HIDDEN\_MK\_SHOW \_ARTIKEL\_DESC\_IGNORE\_PRODUCT\_DESC | Print full description of product but remove Product extra description | bills |

# Report type
When sending request, you must specify type of report you want to get. 
Supported types: PDF, XLS, CSV, XML, HTM, JSN (JSON), POI (xlsx), ESL (xml)

# Supported locale 
For invoice you can use the following locale values : sl,en,de,it,hr,sr_RS,sr_ba,ro_RO,pt_PT,es_ES,cz_CZ,sk_SK,hu_HU,pl_PL,mk_MK,nl,gr,fr,bg

