
# Query advance - paramethers

Service will return list of available paramethers for advance search. 

**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search_query_advance_discovery) :
```javascript
{
    "secret_key":"8899",
    "company_id":"16"
}
```

**Respond** :
```javascript
{
    "purchase_bill_domestic": [
        {
            "value_desc": "Partner mk_id (for example : 1600002312)",
            "label": "Dobavitelj",
            "type": "partner_mk_id"
        },
        {
            "value_desc": "Partner code (for example : 100)",
            "label": "Dobavitelj",
            "type": "partner_code"
        },
        {
            "value_desc": "Subquery search over Item name (for example : Ferrari)",
            "label": "Dobavitelj",
            "type": "partner_query"
        },
        {
            "value_desc": "Partner Tax number (for example : SI100200300)",
            "label": "Dobavitelj",
            "type": "partner_tax_num"
        }
    ],
    "purchase_product": [
        {
            "value_desc": "'true' or 'false'",
            "label": "Izmenjava Spletna trg.",
            "type": "eshop_sync"
        }
    ],
    "warehouse_packing_list": [
        {
             "value_desc": "Show only open/active warehouse docs ('true' or 'false')"
             "label": "Status",
             "type": "show_only_open",
        }
    ]
    ..........
}
```

You get respond for all available documents. For only one document use "doc_type" in request. Every respond has :
* type - name of paramether
* label - label in advance search form in web application
* value_desc - describe expected value