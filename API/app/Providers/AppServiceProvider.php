<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Illuminate\Validation\Validator;
use Validator;
use \GDS\Store;
use \GDS\Schema;
use \GDS\Gateway\GoogleAPIClient;

class AppServiceProvider extends ServiceProvider
{
  /**
  * Bootstrap any application services.
  *
  * @return void
  */
  public function boot()
  {
    // Validator::extend('gdsunique', function($attribute, $value, $parameters, $validator)
    // {
    //   // $client = GoogleAPIClient::createClientFromJson('../gdskey.json');
    //   // $gateway = new GoogleAPIClient($client, 'laravel-api');
    //   // $schema = new Schema($parameters);
    //   // $store = new Store($schema, $gateway);
    //   //
    //   // $entity = $store->fetchOne("SELECT @property FROM @entity WHERE @property = @value", [
    //   //   'property' => $attribute,
    //   //   'entity' => $parameters,
    //   //   'value' => $value
    //   // ]);
    //   //
    //   // return ($entity != null && get_class($entity) == 'GDS\\Entity');
    //   return true;
    // });
  }

  /**
  * Register any application services.
  *
  * @return void
  */
  public function register()
  {
    //
  }
}
