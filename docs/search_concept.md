
# Concept

Let's start with example :

**Request** (POST - https://main.metakocka.si/rest/eshop/v1/search) :
```javascript
{
    "secret_key":"8899",
    "company_id":"16",
    "doc_type":"sales_bill_domestic",
    "query" : "john"
}
```

* you can search by one document type (doc\_type)
* use 'query' (some as search field in MetaKocka) or 'advance\_query' (some as advance search option in MetaKocka) to limit results.
* use 'limit' and 'offset' to perform query window
* you can get maximum of 100 records. For more use query window

**Respond** :
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "185",
    "result_all_records": "1",
    "result_count": "1",
    "offset": "0",
    "limit": "1",
    "result": [
        {
            "mk_id": "1600203710",
            "opr_code": "0",
            "count_code": "PRD1_494"
        }
    ]
}
```

* 'result\_all\_records' is number of all possible records for given query
* result can be list of mk\_id and count code or list of whole document (see examples below)

# Parallel search
Search requests are always run in a sequence. If requests are parallel, they will be put in a sequence queue and executed one after the other. To enable parallel execution for multiple search requests (supported only on standalone servers), the following steps must be done :
1. MetaKocka support must set parameter REST_MAX_SEARCH_LOCK_GROUP_PER_COMPANY to a specified number of separate groups for the company (for example: 2)
2. Customer must put in the REST search request additional Header HTTP parameter "searchGroup" with a number value 1 or 2. All requests within the same searchGroup will use separate locks for parallel execution.

Note: If the number of separate groups is set to value 2, you can use 3 parallel search requests: searchGroup = empty or 0, 1, 2.
