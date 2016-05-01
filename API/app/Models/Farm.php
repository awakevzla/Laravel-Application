<?php

namespace App;

use GDS\Entity;

class Farm extends GDS\Entity
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

        $this->setEntityClass('\\Book');

        return $this->createEntity([
            'title' => 'Some Book',
            'author' => 'A N Other Guy',
            'isbn' => '1840224313'
        ]);

        // return (new GDS\Schema('Book'))
        //     ->addString('title')
        //     ->addString('author')
        //     ->addString('isbn', TRUE);
    }
}
