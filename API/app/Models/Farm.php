<?php

namespace App;

use GDS\Entity;
use GDS\Store;

class Farm extends Entity
{

    /**
     * Build and return a Schema object describing the data model
     *
     * @return \GDS\Schema
     */
    public function buildSchema()
    {
      // $thing = $this->createEntity([
      //     'title' => 'Some Book',
      //     'author' => 'A N Other Guy',
      //     'isbn' => '1840224313'
      // ]);

        //$this->setEntityClass('\\Book');
        //
        // $obj_book = new Entity();
        // $obj_book->title = 'Romeo and Juliet';
        // $obj_book->author = 'William Shakespeare';
        // $obj_book->isbn = '1840224339';
        // //
        // // // Write it to Datastore
        // // $obj_store = new Store('Book');
        // // $obj_store->upsert($obj_book);
        //
        // // return (new GDS\Schema('Book'))
        // //     ->addString('title')
        // //     ->addString('author')
        // //     ->addString('isbn', TRUE);
        //
        // $obj_client = \GDS\Gateway\GoogleAPIClient::createClientFromJson('/gdskey.json');
        // $obj_gateway = new \GDS\Gateway\GoogleAPIClient($obj_client, 'laravel-api');
        // $obj_store = new \GDS\Store('Book', $obj_gateway);
        //
        // $obj_store->upsert($obj_book);
//GDS_APP_NAME, GDS_SERVICE_ACCOUNT_NAME, GDS_KEY_FILE_PATH
        $obj_client = \GDS\Gateway\GoogleAPIClient::createClientFromJson('../gdskey.json');

        // Gateway requires a Google_Client and Dataset ID
        $obj_gateway = new \GDS\Gateway\GoogleAPIClient($obj_client, 'laravel-api');

        // Define our Model Schema
        $obj_book_schema = (new \GDS\Schema('Book'))
            ->addString('title')
            ->addString('author')
            ->addString('isbn', TRUE)
            ->addDatetime('published', FALSE)
            ->addString('text', FALSE);

        // Store requires a Gateway and Schema
        $obj_book_store = new \GDS\Store($obj_book_schema, $obj_gateway);

        $obj_book = new Entity();
        $obj_book->title = 'Romeo and Juliet';
        $obj_book->author = 'William Shakespeare';
        $obj_book->isbn = '1840224339';

        $obj_book_store->upsert($obj_book);
    }
}
