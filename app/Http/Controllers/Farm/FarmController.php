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

        $validator = Validator::make(array(
                                         'farm-name'             => $_POST['farm']['name'],
                                         'farm-phone'            => $_POST['farm']['phone'],
                                         'farm-email'            => $_POST['farm']['email'],
                                         'farm-subdomain'        => $_POST['farm']['subdomain'],

                                         'address-country'       => $_POST['address']['country'],
                                         'address-state'         => $_POST['address']['state'],
                                         'address-city'          => $_POST['address']['city'],
                                         'address-postal'        => $_POST['address']['postal'],
                                         'address-street-number' => $_POST['address']['street_number'],
                                         'address-street-name'   => $_POST['address']['street_name']
                                     ), array(
                                         'farm-name'             => array('required', 'between:3,50', "regex:/^([a-zA-Z ']*)$/"),
                                         'farm-phone'            => 'required|size:12',
                                         'farm-email'            => 'required|email|unique:Farms,email|between:3,50',
                                         'farm-subdomain'        => 'required|alpha|unique:Farms,subdomain|between:3,15',

                                         'address-country'       => 'required|alpha|between:3,25',
                                         'address-state'         => 'required|alpha|between:3,25',
                                         'address-city'          => 'required|alpha|between:3,25',
                                         'address-postal'        => 'required|alpha_num|between:3,7',
                                         'address-street-number' => 'required|numeric|between:1,99999',
                                         'address-street-name'   => 'required|alpha|between:3,25',
                                     ), array(
                                         'required'    => 'Hey, we need this information!',
                                         'alpha'    => 'Letters only, please.',
                                         'numeric' => 'Numbers only, please.',
                                         'email' => 'Please try a valid email address.',
                                         'farm-name.regex' => 'Letters, apostrophes, and spaces only, please.',
                                         'farm-email.unique' => 'Yikes. Someone\'s already using that email address.',
                                         'farm-subdomain.unique' => 'Yikes. Someone\'s already using that subdomain.',
                                         'in'      => 'The :attribute must be one of the following types: :values',
                                     ));

        if($validator->fails()){
            return redirect('/register')->withErrors($validator)->withInput();
        }
    }
}