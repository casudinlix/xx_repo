<?php

namespace App\Http\Controllers\Sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmsController extends Controller
{
    function index()
    {

      return view('sms.index');
    }
}
