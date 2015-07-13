<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Farm\Address;
use App\Farm;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Model::unguard();
        DB::table('Farms')->delete();
        DB::table('Addresses')->delete();

        Address::create(array('country'       => 'Canada',
                              'state'         => 'Nova Scotia',
                              'city'          => 'Halifax',
                              'street_number' => 5670,
                              'street_name'   => 'Normandy',
                              'postal'        => 'B0P1J0'));

        Farm::create(array('name'       => 'Ray\'s Farm',
                           'subdomain'  => 'farm',
                           'address_id' => 1,
                           'phone'      => '680-6009',
                           'email'      => 'raywinkelman@gmail.com'
                     ));

        Model::reguard();
    }
}

//'password'   => Hash::make('csa')
