<?php
namespace App\Http\Controllers\Farm;
use App\Http\Controllers;

class FarmController extends Controller
{
    public function showRegistrationForm(){
        return View::make('register');
    }
}