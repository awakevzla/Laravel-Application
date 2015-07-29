<?php
namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Validator;

class BusinessController extends Controller
{
    public function registerBusiness(){

        $validator = Validator::make(array(
                                         'business-name'         => $_POST['business']['name'],
                                         'business-phone'        => $_POST['business']['phone'],
                                         'business-email'        => $_POST['business']['email'],
                                         'business-subdomain'    => $_POST['business']['subdomain'],

                                         'address-country'       => $_POST['address']['country'],
                                         'address-state'         => $_POST['address']['state'],
                                         'address-city'          => $_POST['address']['city'],
                                         'address-postal'        => $_POST['address']['postal'],
                                         'address-street-number' => $_POST['address']['street_number'],
                                         'address-street-name'   => $_POST['address']['street_name']
                                     ), array(
                                         'business-name'         => array(
                                             'required',
                                             'between:3,50',
                                             "regex:/^([a-zA-Z ']*)$/"
                                         ),
                                         'business-phone'        => 'required|size:14',
                                         'business-email'        => 'required|email|unique:Business,email|between:3,50',
                                         'business-subdomain'    => 'required|alpha|unique:Business,subdomain|between:3,15',
                                         'address-country'         => 'required|alpha|between:3,25',
                                         'address-state'       => array(
                                             'required',
                                             'between:3,25',
                                             "regex:/^[a-zA-Z\\s]*$/"
                                         ),
                                         'address-city'          => 'required|alpha|between:3,25',
                                         'address-postal'        => 'required|alpha_num|between:3,7',
                                         'address-street-number' => 'required|numeric|between:1,99999',
                                         'address-street-name'   => array(
                                             'required',
                                             'between:3,25',
                                             "regex:/^[a-zA-Z\\s]*$/"
                                         ),


                                         'user-first-name'          => 'required|alpha|between:3,25',
                                         'user-last-name'        => 'required|alpha|between:3,25',
                                         'user-username' => 'required|alpha|between:3,15',
                                         'user-email'   => 'required|email|between:3,50',
                                         'user-password' => array(
                                             'required',
                                             "regex:/^(?=.*[A-Za-z])(?=.*\\d)(?=.*[$@$!%*#?&])[A-Za-z\\d$@$!%*#?&]{8,}$/"
                                         ),
                                         'user-confirm-password' => 'required|same:user-password',
                                     ), array(
                                         'required'                  => 'Hey, we need this!',
                                         'alpha'                     => 'Letters only, please.',
                                         'numeric'                   => 'Numbers only, please.',
                                         'email'                     => 'Please try a valid email address.',
                                         'same'                     => 'The passwords must match.',
                                         'business-name.regex'       => 'Letters, apostrophes, and spaces only, please.',
                                         'business-email.unique'     => 'Yikes. Someone\'s already using that email address.',
                                         'business-subdomain.unique' => 'Yikes. Someone\'s already using that subdomain.',
                                         'address-country.regex'     => 'Letters and spaces only, please.',
                                         'address-street-name.regex' => 'Letters and spaces only, please.',
                                         'user-password.regex' => 'Minimum of 8 characters. At least 1 letter, number, and
                                         special character.'
                                     ));

        if($validator->fails()){
            return redirect('/register')->withErrors($validator)->withInput();
        }
    }
}