<?php

namespace App\Http\Controllers;

use App\Traits\ResourceTrait;

class AccountController extends Controller
{
    use ResourceTrait;

    protected $model = 'App\Account';
}
