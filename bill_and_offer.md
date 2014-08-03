#add_payment – dodajanje plačila na račun in ponudbo
Opis : Na obstoječi račun ali ponudbo lahko dodamo transakcijo plačila. Glede na to, da ima dokument lahko več plačil, lahko tudi operacijo ponovimo večkrat.
URL : https://main.metakocka.si/rest/eshop/v1/json/add_payment

**Primer klica**
```javascript
{
   "secret_key":"my_secret",
   "company_id":"16",
   "doc_type" : "bill" ; "sales_offer"
   "mk_id":"1600001744",
   "count_code":"eshop_002"   
   "payment_mode" : "payment" ; "prepayment", "return"
   "payment_type" : "Transakcijski račun"
   "Cashregister" : "Blagajna 1"
   "date" : "2014-08-23+02:00"
   "price" : "12.23"
   "notes" : "bla bla bla"
}
```

**Primer odgovora**
```javascript
{
    "opr_code":"0",
    "opr_time_ms":"33",
}
```