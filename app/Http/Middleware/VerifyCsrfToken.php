<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = ['/foo',
        'http://localhost/theexamly/admission/form/registration/payment/success',
        'http://localhost/theexamly/admission/form/registration/payment/success',
        'https://theexamly.com/admission/form/payment/success',
        'https://theexamly.com/admission/form/payment/fail',
        'https://theexamly.com/admission/form/payment/cancel',
        'https://sandbox.sslcommerz.com/gwprocess/v4/api.php',
        'https://theexamly.com/admission/form/payment/cancel', 'https://theexamly.com/admission/form/payment/fail',

        //
    ];
}
