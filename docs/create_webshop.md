# Create webshop

**Description** : Create a new webshop connection. Supports creating a webshop and optionally assigning report background settings.

**URL** : https://main.metakocka.si/rest/eshop/create_webshop

**Type** : POST

**Request parameters**

| Parameter                       | Required/Optional | Description                                                                                                                       |
|---------------------------------|-------------------|-----------------------------------------------------------------------------------------------------------------------------------|
| secret_key                      | Required          | Generated API key.                                                                                                                |
| company_id                      | Required          | Internal(MK) company id.                                                                                                          |
| type                            | Required          | Webshop type. Currently only `manual` type is supported.                                                                          |
| name                            | Required          | Name of the webshop connection.                                                                                                   |
| create_doc_type                 | Optional          | Document type created from webshop orders. Default is `sales_order`.                                                              |
| report_background_id_list       | Optional          | List of report ID values where this background should be used. Required if any report background parameter is used.               |
| report_background_file_name     | Optional          | Existing report background file name, or file name for uploaded base64 file. Required if any report background parameter is used. |
| report_background_file_data_b64 | Optional          | Base64 file content. If provided, a new report background file is saved.                                                          |
| report_background_country       | Optional          | Country where this report background should be used.                                                                              |

**Allowed `create_doc_type` values**

* `sales_order`
* `sales_offer`
* `sales_bill_domestic`
* `sales_bill_foreign`
* `sales_bill_retail`
* `warehouse_packing_list`

**Report background behavior**

* If `report_background_file_data_b64` is not provided, the system searches existing report backgrounds by `report_background_file_name`.
* If `report_background_file_data_b64` is provided, the file is saved as a new report background.
* `report_background_id_list` contains report IDs. You can find the IDs in Additional Settings app -> Report background -> New -> view IDs in dropdown menu. (38 = domestic sales invoice, 42 = foreign sales invoice...)
* `report_background_country` is optional.

**Respond**

* If ok, a JSON success response is returned.
* Otherwise, a JSON with an error message is returned.

**Example without report background** :
Request (POST - https://main.metakocka.si/rest/eshop/create_webshop) :
```javascript
{
    "secret_key": "8899",
    "company_id": "16",
    "type": "manual",
    "name": "Manual webshop",
    "create_doc_type": "sales_order"
}
```

**Example with existing report background** :
```javascript
{
    "secret_key": "8899",
    "company_id": "16",
    "type": "manual",
    "name": "Manual webshop",
    "create_doc_type": "sales_order",
    "report_background_id_list": [38, 42],
    "report_background_file_name": "invoice-background.png",
    "report_background_country": "SI"
}
```

**Example with new report background file** :
```javascript
{
    "secret_key": "8899",
    "company_id": "16",
    "type": "manual",
    "name": "Manual webshop",
    "create_doc_type": "sales_order",
    "report_background_id_list": [38, 42],
    "report_background_file_name": "invoice-background.png",
    "report_background_file_data_b64": "iVBORw0KGgoAAAANSUhEUgAA..."
}
```

Call can also return general error:
```javascript
{
    "opr_code": "6",
    "opr_desc": "Cannot find report background file with name 'invoice-background.png'.",
    "opr_time_ms": "0",
    "opr_time_no_lock_ms": "0"
}
```
