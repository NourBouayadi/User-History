<?php

namespace App\Filters;


class EtudiantFilter extends Filter
{
    /**
     * Defines columns that end-user may filter by.
     *
     * @var array
     */
    protected $filterables = ['id', 'nom' ,'prenom', 'lieun', 'created_at'];


    /**
     * Define allowed generics, and for which fields.
     * Read more in the documentation https://github.com/Kyslik/laravel-filterable#additional-configuration
     *
     * @return void
     */

    protected function settings()
    {

	}


    //public function recent(){}

}
