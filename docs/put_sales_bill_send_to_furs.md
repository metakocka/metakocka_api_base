**URL** : https://main.metakocka.si/rest/eshop/v1/json/put\_sales\_bill
#JSON Example
FURS (Financial Administration of the republic of Slovenia) has some special requirements for bill publish. 
For request you must add paramether 'send\_to\_furs'

Request example :
```javascript
{
   "secret_key":"8899",
   "company_id":"16",
   "bill_date":"28.12.2015",
   "payment_date":"28.12.2015",
   "location_of_service":"Komenda",
   "warehouse":"glavno skladisce",
   "buyer_order":"narocilo 123",
   "title" : "Nakup igrače",
   "send_to_furs" : "true",
   "partner":{
      "business_entity":"true",
      "taxpayer":"true",
      "foreign_county":"false",
      "tax_id_number":"SI10040073",
      "customer":"eshop 1",
      "street":"Slovenska cesta 100",
      "post_number":"1000",
      "place":"Ljubljana",
      "country":"Slovenia",
      "partner_contact": {
         "name": "Rok Doltar",
         "phone": "05 320 24 88",
         "fax": "05 320 24 84",
         "gsm": "071 333 444",
         "email": "test@test.co.uk"
       },
      "partner_delivery_address": {
         "street": "Ljubljanska 25",
         "post_number": "1001",
         "city": "Ljubljana",
         "country": "Slovenija"
      }
   },
   "mark_paid":[
      {
            "payment_type":"gotovina",
            "date":"28.12.2015"
      }
   ],
   "product_list":[
      {
         "count_code":"2",
         "amount":"10",
         "price":"11",
         "discount":"12",
         "tax":"220"         
      }      
   ]   
}
```

Respond example :
```javascript
{
  "opr_code": "0",
  "opr_time_ms": "4982",
  "partner": {
    "mk_id": "1600002672"
  },
  "mk_id": "1600282031",
  "count_code": "PRD1_731",
  "furs_qr_code": "iVBO.....ggg==",
  "furs_eor": "712dea9b-ed72-41d5-90c3-1af1f11c4641",
  "furs_zoi": "4d9927418cd9ae714d95353f2b89258b"
}
```

You will get the following new respond values :
* furs_eor - EOR code
* furs_zoi - ZOI code
* furs_qr_code - QR image in PNG format, encode with Base64

Bill insert and FURS request is one atomic transaction. In case some error occurs when FURS call is made, bill will not be inserted into MK. You can then repeat this call after a while.

Possible error codes :

ErrorId                 | Message |
--------------------------|------|
| 4001 | Certified cash register is not yet set on company | 
| 4002 | Bill is not mark for send to FURS | 
| 4003 | Error while reading FURS data | 
| 4004 | Error generating QR image | 
