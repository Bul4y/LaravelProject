<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class manufacturerController extends Controller
{
    public function index(){
        $message = "Hello from Server";
        return inertia('Manufacturer/Index', [
            'message' => $message
        ]);
    }
}
