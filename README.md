# Instamojo Opencart 3.X Payment Gateway Plugin

Tested on OpenCart 3.0.2.0

## Download:



**Note**: Don't download the files under **Downloads** section. They won't work.

## Latest Update 

1. Added Internal Currency Conversion. Now the total amount is converted to the value of the Default currency and passed to the plugin. Please set the Default currency as INR in your OpenCart settings.
2. Added Product Description to the order details. 


## Installation

#### Automatic Installation
1. Go to Extensions > Extension installer.
2. Click on upload and select Instamojo-OpenCart-3.x.ocmod.zip from your download directory
3. Click on Continue button. 
4. You will get the success notification if extension is properly installed.

***Note: if automatic installation fails you can try further manual installation steps.***


#### Manual Installation:

1. Copy the contents of `upload` directory(the folders inside upload directory in plugin) into your OpenCart installation root directory.
2. Navigate to `Extensions > Extensions` from admin panel menu and select `Payments` in the dropdown.
3. Look for the Instamojo in Payments List.
4. Click on green Install button(the button has `+` icon).

## Configuration

1. After installation click on edit button corresponding to Instamojo module(the button has pencil icon).
2. Fill the following details:

    - **Order Status :** This is the order of the status that you would like to set after a successful payment.

    -  **Checkout Label:** This is the label users will see during checkout, its default value is "Pay using Instamojo". You can change it to something more generic like "Pay using Credit/Debit Card or Online Banking".
      
    -  **Status:** This is the current status of the module. To use Instamojo during checkout make sure to change it to enabled.
     
    - **Client ID** and **Client Secret** - Client Secret And Client ID can be generated on the [Integrations page](https://www.instamojo.com/integrations/). Related support article: [How Do I Get My Client ID And Client Secret?](https://support.instamojo.com/hc/en-us/articles/212214265-How-do-I-get-my-Client-ID-and-Client-Secret-)
    
    - **Test Mode:** If enabled you can use our [Sandbox environment](https://test.instamojo.com) to test payments. Note that in this case you should use `Client Secret` and `Client ID` from the test account not production.

## Migrating from older version

If you were already using older version of our plugin then follow these steps:

1. Uninstall the old Instamojo extension first from `Extensions -> Payments`.
2. Now remove the following files:
   - admin/controller/payment/instamojo.php
   - admin/language/english/payment/instamojo.php
   - admin/view/template/payment/instamojo.tpl
   - catalog/controller/payment/instamojo.php
   - catalog/model/payment/instamojo.php
   - catalog/view/theme/default/template/payment/instamojo.tpl

## Support

For any issue send us an email to support@instamojo.com and share the `imojo.log` file. The location of imojo.log file is `system/storage/logs/imojo.log`.
