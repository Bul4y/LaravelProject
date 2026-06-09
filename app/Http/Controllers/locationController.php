<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class locationController extends Controller
{
    public function index(){
        $message = "Hello from Server";
        return inertia('Location/Index', [
            'message' => $message
        ]);
    }
}
