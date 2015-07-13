<?php
namespace App\Http\Controllers\Farm;

use App\Http\Controllers\Controller;
use Validator;

class FarmController extends Controller
{
    public function registerFarm(){

//farm-subdomain
//farm-phone
//farm-email
//
//address-country
//address-state
//address-city
//address-postal
//address-street-number
//address-street-name
//
//user-first-name
//user-last-name
//user-username
//user-email
//user-password
//user-confirm-password

        $validator = Validator::make(
            array(
                'farm-name' => $_POST['farm']['name'],
                'farm-phone' => $_POST['farm']['phone'],
                'farm-email' => $_POST['farm']['email'],
                //'farm-subdomain' => $_POST['farm']['subdomain'],
            ),
            array(
                'farm-name' => 'required|alpha|min:5',
                'farm-phone' => 'required|min:9',
                'farm-email' => 'required|email|unique:Farms,email',
                //'farm-subdomain' => 'required|alpha|unique:Farms,subdomain'
            )
        );

    if ($validator->fails())
    {
        return redirect('/register')->withErrors($validator)->withInput();
    }
    }
}