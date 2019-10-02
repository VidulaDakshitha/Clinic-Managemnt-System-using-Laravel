<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = false;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/appointments',      
        '/manage/doctors',
        '/manage/doctors/create',
        '/manage/doctors/store',
        '/manage/doctors/update',
        '/manage/doctors/show',        
        '/manage/doctors/edit'
    ];
}
