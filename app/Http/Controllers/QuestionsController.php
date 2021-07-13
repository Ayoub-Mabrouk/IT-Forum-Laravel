<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index(){
        return view('questions/index');
    }
}
