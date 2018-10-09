This module for Magento 2 makes unlinking categories from products 1000 times faster.
The problem is described here:  
- \#18144: «[Detaching category from product causes massive product url regeneration](https://github.com/magento/magento2/issues/18144)»
- \#7874: «[OOM/Timeouts when saving a category with large catalog as all product URLs are regenerated](https://github.com/magento/magento2/issues/7874)»

## How to install
```
bin/magento maintenance:enable
composer clear-cache
composer require mage2pro/unlink:*
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code && bin/magento setup:di:compile
rm -rf pub/static/* && bin/magento setup:static-content:deploy en_US <additional locales, e.g.: de_DE>
bin/magento maintenance:disable
```

## How to upgrade
```
bin/magento maintenance:enable
composer clear-cache
composer update mage2pro/unlink
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code && bin/magento setup:di:compile
rm -rf pub/static/* && bin/magento setup:static-content:deploy en_US <additional locales, e.g.: de_DE>
bin/magento maintenance:disable
```

If you have problems with these commands, please check the [detailed instruction](https://mage2.pro/t/263).