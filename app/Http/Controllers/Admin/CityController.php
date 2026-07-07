<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Review;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class CityController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        CRUD::setModel(City::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/cities');
        CRUD::setEntityNameStrings('city', 'cities');
    }

    protected function setupListOperation()
    {
        CRUD::addColumns([
            ['name' => 'city_name', 'type' => 'text', 'label' => 'Місто'],
        ]);
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(\Backpack\CRUD\app\Http\Requests\CrudRequest::class);
        CRUD::addFields([
            ['name' => 'city_name', 'type' => 'text', 'label' => 'Місто'],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
