#add_payment - add payment on existing bill or offer

**Description** : Add payment transaction on existing bill or offer. Because bill / offer can have more then one transaction, operation can be repeat many times.

**URL** : https://main.metakocka.si/rest/eshop/v1/json/put_transaction

**Request example**
```javascript
{
   "secret_key":"my_secret",
   "company_id":"16",
   "doc_type" : "bill",
   "mk_id":"1600001744",
   "count_code":"eshop_002",   
   "payment_mode" : "payment",
   "payment_type" : "Transaction bill"
   "cash_register" : "Cashregister 1"
   "date" : "2014-08-23+02:00"
   "price" : "12.23"
   "notes" : "bla bla bla"
}
```

**Respond example**
```javascript
{
    "opr_code":"0",
    "opr_time_ms":"33",
}
```

**Notes**
- doc_type is document type. It can be 'bill' or 'sales_offer'
- use mk_id or count_code for document identification
- cash_register paramether is required only if we have cash payment and we use multiple cash register

| Paramether | Required? | In MK | Type / max length | Notes |
| ------- | -------- | ---- | ----------------- | ------ |
| doc_type | Yes | / | char | 'bill' or 'sales_offer'
| mk_id | No | / | char, 30 | unique document identification in MK. Usually we get this paramether as result of the call for adding document. mk_id or count_code is required.
| count_code | Yes | Bill or offer number | char, 30 | document number in MK. It can be automatically generated in MK or added in document when it is created by REST call. 
| payment_mode | No | Payment mode | char | see payment edit dialog in MK. It can have values 'payment', 'prepayment' or 'return'.
| payment_type | No | Payment type | char,100 | payment type can be set in dynamic register.
| cash_register | NE | Cash register | char,100 | the name of cash register that can be set in dynamic register. Use only when you have cash payment and multiple cash register.
| date | DA | Date | char (ISO date) | when payment was done. In ISO 8601 format.
| price | DA | Price | price | price in format '1200.12'.
| notes | NE | Notes | char,100 | text will be part of transaction description.

