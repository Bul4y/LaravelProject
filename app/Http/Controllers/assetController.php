<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class assetController extends Controller
{
    public function index(){
        $message = "Hello from Server";
        return inertia('Asset/Index', [
            'message' => $message
        ]);
    }
}
