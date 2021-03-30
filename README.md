Welcome!
We are just translating our development documentation from Slovenian language. Stay tuned...

Old documentation (in Slovenia language) [dev.metakocka.si](http://dev.metakocka.si/eshop/index.html)

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
* [transfer_order](/docs/documents_put_document_transfer_order.md)
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
* [bill](/docs/documents_update_document_bill.md)

### delete_document
* [sales order](/docs/documents_delete_document_sales_order.md)
* [warehouse docs](/docs/documents_get_document_warehouse_docs.md)

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

# Messages
* [Email / SMS messages](/docs/send_message.md)

# Other calls
* [put_transaction](/docs/put_transaction.md) - add payment on existing bill or offer
* [get_bank_statement_status](/docs/get_bank_statement_status.md) - return last statement state, date, etc for all bank bills
* [change_document_status](/docs/change_document_status.md) - change status for sales order (Order Management order)

## Release notes
Date| What's new |
----|------------|
| 30.3.2021 | Invoice with foreign invoice number - country code. See [example](/docs/documents_get_document_bill.md#invoice-with-foreign-invoice-number) for more info.
| 17.3.2021 | Added show_product_detail for get_document. See [example](/docs/documents_get_document_bill.md#show_product_detail) for more info.
| 16.3.2021 | Added option to return discount for get_partner. See [example](/docs/get_partner.md#get_partner-with-discounts) for more info.
| 12.3.2021 | Fields title, buyer, valid_from and valid_to are now returned in pricelist. See [example](/docs/product_list.md#12-with-pricelist) for more info.
| 22.2.2021 | Added tax_factor to put_document, put_sales_bill, put_sales_offer products. See [example](/docs/documents_put_document.md#example--products---tax-factor) for more info.
| 3.2.2021 | Added partner parameters to sales order search. See [example](/docs/search_examples.md#search-sales-orders-with-partner-paramaters) for more info.
| 21.1.2021 | Added show_tax_factor option to get_document (bill) and search. See [example](/docs/documents_get_document_bill.md#show_tax_factor) for more info.
| 8.1.2021 | After sales order put_document, create also invoice. See [docs](/docs/documents_put_document_sales_order.md#create-invoice-after-order-is-stored-) for more info.
| 6.1.2021 | Attachments support added for get_document "sales_order". See [docs](/docs/documents_get_document_sales_order.md) for more info.
| 6.1.2021 | Attachments support added for put_document "sales_order". See [docs](/docs/documents_put_document_sales_order.md#example-with-attachments-) for more info.
| 5.1.2021 | For invoice return link credit notes (if exists). See [docs](/docs/documents_put_document.md#example--return-info-about-credit-notes-if-exists) for more info.
| 30.12.2020 | Added documents_get_document_bill option to return method of payment for credit note. See [docs](/docs/documents_get_document_bill.md#show_sales_order_method_of_payment) for more info.
| 30.12.2020 | Added documents_update_document_sales_order option to update warehouse. See [docs](/docs/documents_update_document_sales_order.md#sales-order---update) for more info.
| 11.12.2020 | Added documents_get_document_sales_order - meta data. See [docs](/docs/documents_get_document_sales_order.md#get_document---sales-order) for more info.
| 11.12.2020 | Added documents_put_document_sales_order - meta data. See [docs](/docs/documents_put_document_sales_order.md#example-with-meta-data-only-for-woocommerce-webshops-) for more info.
| 10.12.2020 | Added put_document_transfer_order - support fo creating warehouse transfer orders. See [docs](/docs/documents_put_document_transfer_order.md) for more info.
| 7.12.2020 | Sales order - update and create invoice. See [example](/docs/documents_update_document_sales_order.md#sales-order---update-and-create-invoice) for more info.
| 1.12.2020 | get_document for Bill and Sales order can return document_info. See [example](/docs/documents_get_document_sales_order.md#get_document---sales-order-with-document-information) for more info.
| 18.11.2020 | get_document for Bill can return method_of_payment from sales order. See [example](/docs/documents_get_document_bill.md#show_sales_order_method_of_payment) for more info.
| 26.10.2020 | Added webshop_eshop_sync_id for documents_put_document_sales_order. See [put_document_sales_order](/docs/documents_put_document_sales_order.md#21-sales_order) for more info.
| 24.10.2020 | Added order_in_delivery for product_list and warehouse_stock. See [product_list](/docs/product_list.md#19-with-order-in-delivery) or [warehouse_stock](/docs/warehouse_stock.md#11-with-order-in-delivery) for more info.
| 6.10.2020 | Added shipped_date_expected_seller for sales order. See [search_examples](/docs/documents_put_document_sales_order.md#example-with-expected-ship-date-) for more info.
| 25.9.2020 | Added search Sales orders by last change timestamp. See [search_examples](/docs/search_examples.md#search-sales-orders-by-last-change-timestamp) for more info.  |
| 23.9.2020 |  Tutorial : set up webhook with test site. See [webhook_stock](/docs/webhooks.md#3-tutorial--set-up-webhook-with-test-site) for more info.  |
| 30.8.2020 | Added support for changing partner/receiver and adding/removing products for sales order. See [update_document_sales_order](/docs/documents_update_document_sales_order.md) for more info.  |
| 28.8.2020 | Added filter by status for doc_type "warehouse_acceptance_note" and "warehouse_packing_list". See [search_examples](/docs/search_examples.md) for more info.  |
| 18.8.2020 | Support for doc_type "warehouse_receiving_note". See [change_document_status](/docs/change_document_status.md) for more info.  |
| 10.8.2020 | Added street_number for sales order put_document. See [put_document_sales_order](/docs/documents_put_document_sales_order.md#example-with-street-number-) for more info.  |
| 7.8.2020 | Added return_category for product list search. See [search_examples](/docs/product_list.md#19-with-categories ) for more info.  |
| 7.8.2020 | Added return_delivery_service_events for sales order search. See [search_examples](/docs/search_examples.md#return-sales-orders-with-delivery-service-events) for more info.  |
| 3.8.2020 | Added show_only_open for warehouse docs search. See [search_query_advance_discovery](/docs/search_query_advance_discovery.md) for more info.  |
| 31.7.2020 | Added allocated_cost_list for get_document bill and whdocs. See [get_document_bill](/docs/documents_get_document_bill.md) and [get_document_whdocs](/docs/documents_get_document_whdocs.md) for more info.  |
| 17.7.2020 | Added search Sales orders by last tracking event change date. See [search_examples](/docs/search_examples.md) for more info.  |
| 17.7.2020 | Added get_document with delivery stats for sales_order. See [sales_order](/docs/documents_get_document_sales_order.md) for more info.  |
| 6.7.2020 | get_document with delivery service events for sales_order. See [sales_order](/docs/documents_get_document_sales_order.md) for more info.  |
| 18.6.2020 | Added delete_document - Warehouse docs [More info](/docs/documents_get_document_warehouse_docs.md)
| 15.6.2020 | Added send_message (SMS) [More info](/docs/send_message.md)
| 20.5.2020 | put_document for warehouse docs will return list of not found products [More info](/docs/documents_put_document_whdocs.md#236-return-which-product-are-not-found)
| 20.5.2020 | get_document for offer, sales order, bill, warehouse docs can return product compound. More info [Bill example](/docs/documents_get_document_bill.md)
| 7.5.2020 | Added link_to_web_store to put_document for sales_order
| 21.4.2020 | Added furs_zoi and furs_eor to get_document - Bill response |
| 9.4.2020 | Delete sales order. [More info](/docs/documents_delete_document_sales_order.md) |
| 12.3.2020 | Update invoice status. [More info](/docs/documents_update_document_bill.md) |
| 12.3.2020 | Get invoices without status. [Example](/docs/search_examples.md#get-invoices-without-status) |
| 6.3.2020 | Read workorder and add Serial numbers, Lot numbers, Microlocations, Expiration date usage on plan and material [Update workorder](/docs/documents_update_document_workorder.md#example--add-new-plan-realization-and-material-realization-with-lot-number-and-microlocation) |
| 5.3.2020 | put_document with Serial numbers, Lot numbers, Microlocations, Expiration date. [Bill](/docs/documents_put_document.md#example--serial-numbers-lot-numbers-microlocations-exparation-date), [Sales Order](/docs/documents_put_document_sales_order.md#example-lot-numbers-microlocations-), [Warehouse docs](/docs/documents_put_document_whdocs.md#245-example--serial-numbers-lot-numbers-microlocations-exparation-date) |
| 15.1.2020 | get_document for sales_order - return "shipped_date" |
| 14.1.2020 | Log for API calls is saved for 2 month |
| 7.1.2020 | get_document for sales_order - return link documents. See [sales_order](/docs/documents_put_document_sales_order.md) for more info.  |
| 22.12.2019 | put_document for sales_order - check unique number for customer order. See [docs](https://metakocka.freshdesk.com/a/solutions/articles/3000095508?lang=sl) for more info.  |
| 26.9.2019 | get_document for sales_order - return link documents. See [sales_order](/docs/documents_put_document_sales_order.md) for more info.  |

