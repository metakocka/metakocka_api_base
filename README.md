Welcome!
We are just translating our development documentation from Slovenian language. Stay tuned...

Current documentation is available on [dev.metakocka.si](http://dev.metakocka.si/eshop/index.html)

Instruction how to get API key :  [http://blog.metakocka.si/dodatne-nastavitve-api/](http://blog.metakocka.si/dodatne-nastavitve-api/)

# Products
[Concept](/docs/product_concept.md)

[product_list](/docs/product_list.md)

[product_add](/docs/product_add.md)

[product_update](/docs/product_update.md)

[product_delete](/docs/product_delete.md)

### product_partner_code
* [put_product_partner_code](/docs/put_product_partner_code.md)
* [update_product_partner_code](/docs/update_product_partner_code.md)
* [delete_product_partner_code](/docs/delete_product_partner_code.md)

# Bill and Offer (old API)
[Bill examples](/docs/put_sales_bill_examples.md)
* [Send to FURS](/docs/put_sales_bill_send_to_furs.md)

# Warehouse
[warehouse_list](/docs/warehouse_list.md)

[warehouse_stock](/docs/warehouse_stock.md)

# Documents
[Concept](/docs/documents_concept.md)

### put_document
* [offer](/docs/documents_put_document_offer.md)
* [sales_order](/docs/documents_put_document_sales_order.md)
* [bill](/docs/documents_put_document.md#22-bill)
* [warehouse docs](/docs/documents_put_document_whdocs.md)
* [purchase order](/docs/documents_put_document_purchase_order.md)
* [workorder](/docs/documents_put_document_workorder.md)

### get_document
* [offer](/docs/documents_get_document_sales_offer.md)
* [sales_order](/docs/documents_get_document_sales_order.md)
* [bill](/docs/documents_get_document_bill.md)
* [warehouse docs](/docs/documents_get_document_whdocs.md)
* [workorder](/docs/documents_get_document_workorder.md)

### update_document
* [workorder](/docs/documents_update_document_workorder.md)
* [sales order](/docs/documents_update_document_sales_order.md)

### search
* [Concept](/docs/search_concept.md)
* [Examples](/docs/search_examples.md)
* [Query advance - paramethers](/docs/search_query_advance_discovery.md)

### report
* [Concept](/docs/report_concept.md)
* [Examples](/docs/report_examples.md)

# Partner
* [get_partner](/docs/get_partner.md)
* [add_partner](/docs/add_partner.md)
* [update_partner](/docs/update_partner.md)

# WebHooks
* [stock](/docs/webhooks.md)

# Order management
* [Generate stickers](/docs/generate_sticker.md)

# Other calls
* [put_transaction](/docs/put_transaction.md) - add payment on existing bill or offer
* [get_bank_statement_status](/docs/get_bank_statement_status.md) - return last statement state, date, etc for all bank bills
* [change_document_status](/docs/change_document_status.md) - change status for sales order (Order Management order)

## Release notes
Date| What's new |
----|------------|
| 15.1.2020 | get_document for sales_order - return "shipped_date" |
| 7.1.2020 | get_document for sales_order - return link documents. See [sales_order](/docs/documents_put_document_sales_order.md) for more info.  |
| 22.12.2019 | put_document for sales_order - check unique number for customer order. See [docs](https://metakocka.freshdesk.com/a/solutions/articles/3000095508?lang=sl) for more info.  |
| 26.9.2019 | get_document for sales_order - return link documents. See [sales_order](/docs/documents_put_document_sales_order.md) for more info.  |
