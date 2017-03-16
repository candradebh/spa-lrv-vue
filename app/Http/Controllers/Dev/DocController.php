<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use App\Http\Kernel;
use Illuminate\Support\Facades\App;


class DocController extends Controller
{
        public function index(){
            $config = app()->config;
             //dd($config);
            return view ('dev.doc.index',compact('config'));
        }
}
