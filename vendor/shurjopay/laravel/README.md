# sp2-laravel


composer require shurjopay/laravel

After successful installation of shurjopay-laravel-package, go to your project and open config folder and then click on app.php file. Append the following line in providers array.

shurjopay\ShurjopayLaravelPackage\ShurjopayServiceProvider::class,


* Add this to your controller
use shurjopay\ShurjopayLaravelPackage\Http\Controllers\ShurjopayController;

* Call payment method
$shurjopay_service = new ShurjopayController();
return $shurjopay_service->checkout($info,$school_id);
