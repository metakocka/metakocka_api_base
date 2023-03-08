# put_transaction - add payment on existing document

**Description** : Add payment transaction on existing document. Because document can have more than one transaction, operation can be repeated many times.

Warning : if you would like to add payment when document is created or updated and this payment in the same amount as document, you can use extra tag "mark_paid". See example - https://github.com/metakocka/metakocka_api_base/blob/master/docs/documents_put_document_sales_order.md#example-minimal-request--add-payment-

**URL** : https://main.metakocka.si/rest/eshop/v1/put_transaction

**Type** : POST

**Request example**
```javascript
{
   "secret_key":"my_secret",
   "company_id":"16",
   "doc_type" : "bill",
   "mk_id":"1600001744",
   "count_code":"eshop_002",   
   "buyer_order":"eshopOrder1",
   "payment_mode" : "payment",
   "payment_type" : "Transaction bill",
   "cash_register" : "Cashregister 1",
   "date" : "2014-08-23+02:00",
   "price" : "12.23",
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
- doc_type is document type. It can be:
  - bill
  - sales_offer
  - sales_order
  - sales_bill_domestic
  - sales_bill_foreign
  - sales_bill_retail
  - purchase_bill_domestic
  - purchase_bill_foreign
- use mk_id or count_code or buyer_order (only for sales_order doc_type) for document identification
- cash_register paramether is required only if we have cash payment and we use multiple cash register

| Parameter     | Required? | In MK                                | Type / max length | Notes                                                                                                                                                                          |
|---------------|-----------|--------------------------------------|-------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| doc_type      | Yes       | /                                    | char              | See doc_type list in Notes above.                                                                                                                                              |
| mk_id         | No        | /                                    | char, 30          | unique document identification in MK. Usually we get this parameter as result of the call for adding document. mk_id, count_code or buyer_order (for sales_order) is required. |
| count_code    | Yes       | Bill or offer number                 | char, 30          | document number in MK. It can be automatically generated in MK or added in document when it is created by REST call.                                                           |
| buyer_order   | No        | Customer order number on Sales order | char, 30          | Customer order number on Sales order document. Field can be used for Sales order identification instead of count_code or mk_id.                                                |
| payment_mode  | Yes       | Payment mode                         | char              | see payment edit dialog in MK. It can have values 'payment', 'prepayment' or 'return'.                                                                                         |
| payment_type  | Yes       | Payment type                         | char,100          | payment type can be set in dynamic register.                                                                                                                                   |
| cash_register | No        | Cash register                        | char,100          | the name of cash register that can be set in dynamic register. Use only when you have cash payment and multiple cash register.                                                 |
| date          | Yes       | Date                                 | char (ISO date)   | when payment was done. In ISO 8601 format.                                                                                                                                     |
| price         | Yes       | Price                                | price             | price in format '1200.12'.                                                                                                                                                     |
| notes         | No        | Notes                                | char,100          | text will be part of transaction description.                                                                                                                                  |

