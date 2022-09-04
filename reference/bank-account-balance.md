---
description: Update the balance of a manual account at a desire moment
---

# Bank Account Balance

{% swagger method="post" path="/v1/bank-accounts/{id}/balance" baseUrl="https://monse.app" summary="Set the balance of a bank account" %}
{% swagger-description %}
If you don't pass the date param the balance will be stored as the current account balance.
{% endswagger-description %}

{% swagger-parameter in="query" name="id" type="Integer" %}
Bank account ID
{% endswagger-parameter %}

{% swagger-parameter in="body" name="balance" type="Integer" required="true" %}
In cents
{% endswagger-parameter %}

{% swagger-parameter in="body" name="date" type="String" %}
Date string in Y-m-d format
{% endswagger-parameter %}

{% swagger-response status="201: Created" description="Balance created" %}
```javascript
{
    // Response
}
```
{% endswagger-response %}

{% swagger-response status="400: Bad Request" description="Wrong request" %}
```javascript
{
    balance: 'The balance field is required'
}
```
{% endswagger-response %}
{% endswagger %}
