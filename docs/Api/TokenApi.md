# WebnessStudio\MPL\OAuth\TokenApi

All URIs are relative to https://sandbox.api.posta.hu/oauth2, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**token()**](TokenApi.md#token) | **POST** /token | Hozzáférési token beszerzése „client_credentials” engedéllyel. / Obtain access token with \&quot;client_credentials\&quot; grant. |


## `token()`

```php
token($grant_type): \WebnessStudio\MPL\OAuth\Model\Token
```

Hozzáférési token beszerzése „client_credentials” engedéllyel. / Obtain access token with \"client_credentials\" grant.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: basic_auth
$config = WebnessStudio\MPL\OAuth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new WebnessStudio\MPL\OAuth\Api\TokenApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$grant_type = 'grant_type_example'; // string | Value **MUST** be set to \\\"client_credentials\\\".

try {
    $result = $apiInstance->token($grant_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TokenApi->token: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grant_type** | **string**| Value **MUST** be set to \\\&quot;client_credentials\\\&quot;. | |

### Return type

[**\WebnessStudio\MPL\OAuth\Model\Token**](../Model/Token.md)

### Authorization

[basic_auth](../../README.md#basic_auth)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
