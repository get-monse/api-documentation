---
description: List, create, update or delete your bank accounts
---

# Bank Accounts

<figure><img src="../.gitbook/assets/image (1).png" alt=""><figcaption></figcaption></figure>

### Endpoints

{% swagger method="get" path="/v1/bank-accounts" baseUrl="https://monse.app" summary="Get a list of all your bank accounts" %}
{% swagger-description %}

{% endswagger-description %}

{% swagger-response status="200: OK" description="List of Bank Accounts" %}
```javascript
[
    {
	"id": 1,
	"external_uuid": "4a2e413e-949e-3804-aa6s-0f2ca6a08bcb",
	"bank_id": 3,
	"bank_connection_id": 1,
	"iban": "SE3212339877030000000000",
	"name": "CUENTA NOMINA",
	"currency": "EUR",
	"balance": 4399311,
	"hidden": false,
	"deleted_at": null,
	"created_at": "2022-09-04T16:10:06.000000Z",
	"updated_at": "2022-09-04T16:10:06.000000Z"
    },
    
    // ...
]
```
{% endswagger-response %}
{% endswagger %}

{% swagger method="post" path="/v1/bank-accounts" baseUrl="https://monse.app" summary="Create a new manual bank account" %}
{% swagger-description %}
You can create a new manual account to track your balance and transactions. The different between this and the connected accounts is that this account need to be updated manually, creating or updating the balance every some time.
{% endswagger-description %}

{% swagger-parameter in="body" name="name" type="String" required="true" %}
Bank account name
{% endswagger-parameter %}

{% swagger-parameter in="body" name="currency" type="String" required="true" %}
Currency Code: EUR, USD, etc.
{% endswagger-parameter %}

{% swagger-parameter in="body" name="balance" type="Integer" required="true" %}
Current balance in cents.
{% endswagger-parameter %}

{% swagger-response status="201: Created" description="" %}
```javascript
{
    'id': 1
}
```
{% endswagger-response %}
{% endswagger %}

{% swagger method="put" path="/v1/bank-accounts/{id}" baseUrl="https://monse.app" summary="Update an account" %}
{% swagger-description %}

{% endswagger-description %}

{% swagger-parameter in="query" name="id" type="Integer" %}
Bank account ID
{% endswagger-parameter %}

{% swagger-parameter in="body" name="name" type="String" %}
New name for bank account
{% endswagger-parameter %}

{% swagger-response status="204: No Content" description="Bank account edited" %}
```javascript
{
    // Response
}
```
{% endswagger-response %}
{% endswagger %}

{% swagger method="delete" path="/v1/bank-accounts/{id}" baseUrl="https://monse.app" summary="Delete an account" %}
{% swagger-description %}
You can only delete manual accounts.
{% endswagger-description %}

{% swagger-parameter in="query" name="id" type="Integer" %}
Bank account ID
{% endswagger-parameter %}

{% swagger-response status="204: No Content" description="Account deleted" %}
```javascript
{
    // Response
}
```
{% endswagger-response %}

{% swagger-response status="401: Unauthorized" description="You can't delete this account" %}
```javascript
{
    // Response
}
```
{% endswagger-response %}
{% endswagger %}
