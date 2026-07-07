<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ReviewCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        CRUD::setModel(Review::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/reviews');
        CRUD::setEntityNameStrings('review', 'reviews');

        CRUD::setOperationSetting('persistentTable', false);
    }

    protected function setupListOperation()
    {
        CRUD::addColumns([
            ['name' => 'author_name', 'type' => 'text', 'label' => 'Автор'],
            ['name' => 'city_display', 'label' => 'Місто', 'type' => 'closure', 'function' => function ($entry) {
                return $entry->city?->city_name ?? '—';
            }],
            ['name' => 'rating', 'type' => 'number', 'label' => 'Оцінка'],
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Текст'],
            ['name' => 'status', 'type' => 'select_from_array', 'label' => 'Статус', 'options' => ['pending' => 'На перевірці', 'approved' => 'Опубліковано', 'rejected' => 'Відхилено']],
        ]);

        CRUD::addClause('with', 'city');

        $cityId = request('city_id');

        if ($cityId) {
            CRUD::addClause('where', 'city_id', $cityId);
        }
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(\Backpack\CRUD\app\Http\Requests\CrudRequest::class);
        CRUD::addFields([
            ['name' => 'author_name', 'type' => 'text', 'label' => "Ім'я автора"],
            ['name' => 'city_id', 'type' => 'select', 'entity' => 'city', 'model' => 'App\Models\City', 'attribute' => 'city_name', 'label' => 'Місто'],
            ['name' => 'rating', 'type' => 'number', 'label' => 'Оцінка (1-5)', 'attributes' => ['min' => 1, 'max' => 5]],
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Текст відгуку'],
            ['name' => 'status', 'type' => 'select_from_array', 'label' => 'Статус', 'options' => ['pending' => 'На перевірці', 'approved' => 'Опубліковано', 'rejected' => 'Відхилено']],
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
