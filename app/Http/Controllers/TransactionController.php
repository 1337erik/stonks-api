<?php

namespace App\Http\Controllers;

use App\Traits\ResourceTrait;

class TransactionController extends Controller
{
    use ResourceTrait;

    protected $model = 'App\Transaction';
}
