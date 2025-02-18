# Asynchronous Report Printing

**URL** : POST - https://main.metakocka.si/rest/eshop/v1/report

## Overview
This feature allows you to start printing a report asynchronously, immediately receiving a token to track the report's progress. 
Once completed, the same token can be used to retrieve a temporary download link (valid for 1 day).

Some use cases:
- Long-running reports
- Request timeouts
- Reusable download links for multiple downloads without reprinting

## Example
Standard parameters are set according to the [report concept](/docs/report_concept.md).

Additional parameters

| Parameter | Type   | Required | Notes                                                                               |
|-----------|--------|----------|-------------------------------------------------------------------------------------|
| async     | bool   | Yes      | Must be set to 'true' to enable asynchronous printing.                              |
| token     | String | Optional | Token provided by MetaKocka for tracking progress and retrieving the download link. |
| progress  | String | No       | Response parameter indicating the printing progress.                                |
| url       | String | No       | Response parameter providing the download link when printing completes.             |

## Request Examples
### Start Printing a Report

First send a request with only `async` parameter set to `true` to start printing the report.
```javascript
{
  "secret_key":"8899",
  "company_id":"16",
  "report_id" : "149",
  "async":"true"
   "params" : [
    { "type" : "ADD_ATT_HIDDEN_SHOW_BACKGROUND_IMAGE", "value" : "true" },
    { "type" : "ADD_ATT_HIDDEN_MK_BACKGROUND_IMAGE_ID", "value" : "1600161321" }
    ]
}
```
**Response**
```javascript
{
    "opr_code": "0",
    "opr_time_ms": "0",
    "opr_time_no_lock_ms": "0",
    "token": "09dfb619-388c-48ec-97c3-cd56eade5fb0"
}
```
> **Note:** `token` is required for subsequent requests.

### 2️⃣ Check Printing Progress
Use the `token` from the initial response to monitor progress.


```javascript
{
  "secret_key":"8899",
  "company_id":"16"
  "report_id" : "149",
  "async":"true"
  "token": "09dfb619-388c-48ec-97c3-cd56eade5fb0"
}
```
**Response (In Progress)**

```javascript
{
    "opr_code": "0",
    "opr_time_ms": "0",
    "opr_time_no_lock_ms": "0",
    "token": "a92b3060-53ab-451c-9d6a-19f56e84499f",
    "progress": "Priprava podatkov za račun BC-MK-328 9 / 23"
}
```

**Response (Completed)**

When the report is ready, the response will no longer include the `progress` parameter.

```javascript
{
    "opr_code": "0",
    "opr_time_ms": "0",
    "opr_time_no_lock_ms": "0",
    "token": "09dfb619-388c-48ec-97c3-cd56eade5fb0",
    "url": "https://main.metakocka.si/download/report/09dfb619-388c-48ec-97c3-cd56eade5fb0"
}
```

**Response (Error)**

If an error occurs, the response will include the `opr_desc` parameter.

```javascript
{
    "opr_code": "6",
    "opr_desc": "Report with this token does not exist.",
    "opr_time_ms": "0",
    "opr_time_no_lock_ms": "0"
}
```

## Additional Notes

- Make sure to set the `async` parameter to `true` for all requests.
- The download link is valid for **24 hours** then a new link will be generated.


