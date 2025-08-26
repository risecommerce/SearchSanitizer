# Risecommerce SearchSanitizer Extension  

The [Risecommerce Risecommerce SearchSanitizer Extension for Magento 2](https://risecommerce.com/store/magento2-searchsanitizer.html) by Risecommerce is  SearchSanitizer gives you full control over Magento 2 search. Block unwanted terms, clean spammy queries, and optimize your database for faster performance. Deliver accurate, relevant results to customers, enhance user experience, and keep your store search clean, smart, and conversion-friendly..  

For more details about the extension, visit the [Risecommerce SearchSanitizer Extension for Magento 2](https://risecommerce.com/store/magento2-searchsanitizer.html).

If you're looking to enhance your Magento store further, consider hiring a [dedicated Magento developer](https://risecommerce.com/hire-dedicated-magento-developer.html).

For support or inquiries, please visit our [contact page](https://risecommerce.com/contact).

## Support  
- **Magento versions:** 2.3.x, 2.4.x  

## How to Install the Extension  

### Method I: Manual Installation  

1. Download the archive file.  
2. Unzip the file.  
3. Create a folder at `[Magento_Root]/app/code/Risecommerce/SearchSanitizer`.  
4. Move the unzipped files to the directory `[Magento_Root]/app/code/Risecommerce/SearchSanitizer`.  

### Method II: Using Composer  

Run the following command:  

composer require risecommerce/searchsanitizer

#Enable Extension:
- php bin/magento module:enable Risecommerce_SearchSanitizer
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:deploy
- php bin/magento cache:flush

#Disable Extension:
- php bin/magento module:disable Risecommerce_SearchSanitizer
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:deploy
- php bin/magento cache:flush

