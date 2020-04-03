Intacct Product List Module
=============================

Module utilized with [Intacct PHP SDK](https://developer.intacct.com/tools/sdk-php/).

Also see [Common Filters](https://github.com/philbirnie/Intacct_Common) for available filters.

### Example Usage:

```php
    /** @var ClientConfig $clientConfig */
    $clientConfig = new ClientConfig();

    $client = new OnlineClient($clientConfig);

    /** @var ProductList $itemListRequest **/
    $itemListRequest = new ProductList();
    $itemListRequest->setFields(['ITEMID', 'NAME']);

    $filter = new InFilter();
    $filter->setField('ITEMID');
    $filter->addValue('123456');
    $filter->addValue('789012');

    $itemListRequest->addFilter($filter);

    $response = $client->execute($itemListRequest);
```
