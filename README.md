# Risecommerce SearchSanitizer Extension  

**Overview**
Risecommerce Search Sanitizer helps secure your Magento store by preventing harmful or unwanted search terms from being saved. It blocks SQL keywords, HTML/JS code, and any custom patterns you define. Instead of saving unsafe terms, customers see a warning message on the search page.

**Features**

1. **Enable/Disable Control** – Turn the sanitizer on or off from Admin.
2. **Custom Ignore List** – Define comma-separated words or patterns that you want to block (e.g., `select,drop,delete,script`).
3. **Custom Warning Message** – Show a user-friendly message when blocked terms are entered.
4. **Admin Configuration** – Manage all settings from Stores → Configuration → Risecommerce → Search Sanitizer.
5. **Improved Security** – Stops malicious inputs from being stored in search query logs.

**Use Case**

* Protects your database from SQL injections attempted via search.
* Prevents saving of unwanted spam keywords or HTML.
* Gives customers a clear warning instead of a technical error.


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

