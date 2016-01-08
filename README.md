# Magento External Authentication
Simple functions to authenticate in Magento outside your code (not your server)

## Usage
```php
//Try to login
if(MagentoAuth::loginCustomer('username', 'password123')) {
	print 'Logged in! <br>';
	if(MagentoAuth::isLoggedIn()) {
		print 'Still logged in! <br>';
	}

	//Get logged customer
	$customer = MagentoAuth::getLoggedCustomer();
	print $customer->getEmail().'<br>';
} else {
	print 'Login Failed <br>';
}

MagentoAuth::logoutCustomer();
```


