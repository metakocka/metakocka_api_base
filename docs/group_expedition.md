# Group expedition

Creates or updates a group expedition.

**URL** : https://main.metakocka.si/rest/eshop/group_expedition

**Type** : POST

## Prerequisites

The company must have:

* exactly one generic webshop named `Group expedition`;
* a sales-order status with description `group`;
* the delivery type used in the request configured in MetaKocka.

## Create group expedition

When no sales order exists with the supplied `buyer_order`, the call creates a new parent sales order. Its status is set to `group`, and it is linked to the generic webshop `Group expedition`.

`sales_order_list` is optional. If it is omitted or empty, only the parent sales order is created. Otherwise, every listed sales order is added to the new group expedition.

| Parameter          | Required/Optional          | Description                                                                                                                                       |
|--------------------|----------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------|
| `secret_key`       | Required                   | Generated API key.                                                                                                                                |
| `company_id`       | Required                   | Company ID.                                                                                                                                       |
| `buyer_order`      | Required                   | Unique customer-order number of the parent sales order. It is also used to identify the group expedition for updates.                             |
| `doc_date`         | Required when creating     | Parent sales order date in ISO format.                                                                                                            |
| `partner`          | Required when creating     | Parent sales order partner.                                                                                                                       |
| `receiver`         | Optional                   | Receiver of the parent sales order.                                                                                                               |
| `delivery_type`    | One required when creating | Delivery type name or code from the `VRSTA_DOSTAVE` register.                                                                                     |
| `delivery_type_id` | One required when creating | Internal ID of the delivery type. Use instead of `delivery_type` when appropriate.                                                                |
| `sales_order_list` | Optional                   | Sales orders to add to the group. Each item must contain `count_code`, `buyer_order`, or both. Each item must resolve to exactly one sales order. |

An order in `sales_order_list` must not already belong to another group expedition. A sales order may occur only once in the list.

### Example: create a group with orders

```json
{
  "secret_key": "my_secret_key",
  "company_id": 16,
  "buyer_order": "GROUP-2026-001",
  "doc_date": "2026-09-23+02:00",
  "partner": {
    "business_entity": "true",
    "taxpayer": "true",
    "foreign_county": "false",
    "tax_id_number": "SI20000001",
    "customer": "Example Buyer d.o.o.",
    "street": "Slovenska cesta 100",
    "post_number": "1000",
    "place": "Ljubljana",
    "country": "Slovenia"
  },
  "receiver": {
    "business_entity": "false",
    "taxpayer": "false",
    "foreign_county": "false",
    "customer": "Janez Novak",
    "street": "Dunajska cesta 25",
    "post_number": "1000",
    "place": "Ljubljana",
    "country": "Slovenia"
  },
  "delivery_type": "GLS",
  "sales_order_list": [
    {
      "count_code": "PP-1001"
    },
    {
      "buyer_order": "WEB-1002"
    }
  ]
}
```

### Example: create an empty group

```json
{
  "secret_key": "my_secret_key",
  "company_id": 16,
  "buyer_order": "GROUP-2026-002",
  "doc_date": "2026-09-23+02:00",
  "partner": {
    "business_entity": "true",
    "taxpayer": "true",
    "foreign_county": "false",
    "tax_id_number": "SI20000001",
    "customer": "Example Buyer d.o.o.",
    "street": "Slovenska cesta 100",
    "post_number": "1000",
    "place": "Ljubljana",
    "country": "Slovenia"
  },
  "receiver": {
    "business_entity": "false",
    "taxpayer": "false",
    "foreign_county": "false",
    "customer": "Janez Novak",
    "street": "Dunajska cesta 25",
    "post_number": "1000",
    "place": "Ljubljana",
    "country": "Slovenia"
  },
  "delivery_type_id": 456
}
```

## Update group expedition

When `buyer_order` identifies an existing parent sales order that is linked to a group expedition, the call updates the group membership. The parent sales order must still have status `group` when the call starts.

The endpoint first removes orders from `remove_sales_order_list`, then adds orders from `sales_order_list`. This permits moving an order out of the group and adding it back in the same request. Orders may not be added if they still belong to another group expedition.

On update, only the fields below are processed; parent partner, receiver, date and delivery-type fields are not updated.

| Parameter                 | Required/Optional | Description                                                                                               |
|---------------------------|-------------------|-----------------------------------------------------------------------------------------------------------|
| `secret_key`              | Required          | Generated API key.                                                                                        |
| `company_id`              | Required          | Company ID.                                                                                               |
| `buyer_order`             | Required          | Customer order number of the existing parent group sales order.                                           |
| `remove_sales_order_list` | Optional          | Sales orders to remove from this group. Each item must contain `count_code`, `buyer_order`, or both.      |
| `sales_order_list`        | Optional          | Sales orders to add to the group. Each item must contain `count_code`, `buyer_order`, or both.            |
| `status_id`               | Optional          | After membership changes, sets a new parent status by its ID.                                             |
| `status_desc`             | Optional          | After membership changes, sets a new parent status by its status description. Use instead of `status_id`. |

### Example: remove and add group orders

```json
{
  "secret_key": "my_secret_key",
  "company_id": 16,
  "buyer_order": "GROUP-2026-001",
  "remove_sales_order_list": [
    {
      "count_code": "PP-1001"
    }
  ],
  "sales_order_list": [
    {
      "buyer_order": "WEB-1003"
    }
  ]
}
```

### Example response

```json
{
  "opr_code": "0",
  "mk_id": "400000000100",
  "count_code": "PP-1000",
  "document_type_short": "PR_SO",
  "opr_time_ms": "42"
}
```

An error response is returned when the parent sales order is not a group expedition, does not have status `group`, a referenced sales order cannot be resolved uniquely, or an order is already linked to another group expedition.
