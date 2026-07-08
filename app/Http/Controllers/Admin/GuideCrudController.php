<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GuideRequest;
use App\Models\Guide;
use App\Models\Review;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as Crud;

class GuideCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    protected int $perPage = 50;

    public function setup(): void
    {
        Crud::setModel(Guide::class);
        Crud::setRoute(config('backpack.base.route_prefix') . '/guides');
        Crud::setEntityNameStrings('гайд', 'гайди');
    }

    protected function setupListOperation(): void
    {
        $this->crud->addColumns([
            ['name' => 'id', 'type' => 'number'],
            [
                'name' => 'sort',
                'label' => 'Порядок',
                'type' => 'number',
            ],
            [
                'name' => 'category',
                'label' => 'Категорія',
                'type' => 'select_from_array',
                'options' => [
                    'war' => 'Мобілізація/Армія',
                    'biz' => 'Бізнес/ФОП',
                    'prop' => 'Маєно/Нерухомість',
                    'family' => "Сім'я/Спадщина",
                    'finance' => 'Фінанси',
                ],
            ],
            [
                'name' => 'tag',
                'label' => 'Тег/Позначка',
                'type' => 'select_from_array',
                'options' => [
                    '' => 'Без тегу',
                    'hot' => 'Топ продажів',
                    'new' => 'Новинка 2026',
                    'biz' => 'Бізнес',
                    'family' => "Сім'я",
                    'travel' => 'Виїзд',
                    'finance' => 'Фінанси',
                    'property' => 'Нерухомість',
                ],
            ],
            ['name' => 'title_uk', 'label' => 'Назва UA'],
            [
                'name' => 'price',
                'label' => 'Ціна',
                'type' => 'model_function',
                'function_name' => 'getPriceHtmlAttribute',
            ],
            [
                'name' => 'status',
                'label' => 'Статус',
                'type' => 'select_from_array',
                'options' => ['published' => 'Опубліковано', 'draft' => 'Чернетка', 'hidden' => 'Приховлено'],
            ],
        ]);

        $this->crud->addButtonFromModelFunction('line', 'reviews', 'getReviewsButton', 'end');
        $this->crud->addClause('orderBy', 'sort');
        $this->crud->addClause('orderByDesc', 'id');

        $category = request('category');
        if ($category) {
            $this->crud->addClause('where', 'category', $category);
        }
    }

    protected function setupCreateOperation(): void
    {
        $this->setupGuideFields();
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupGuideFields();
    }

    private function setupGuideFields(): void
    {
        $this->crud->addFields([
            ['name' => 'slug', 'label' => 'Slug', 'type' => 'text'],
            [
                'name' => 'category',
                'label' => 'Категорія',
                'type' => 'select_from_array',
                'options' => [
                    'war' => 'Мобілізація/Армія',
                    'biz' => 'Бізнес/ФОП',
                    'prop' => 'Маєно/Нерухомість',
                    'family' => "Сім'я/Спадщина",
                    'finance' => 'Фінанси',
                ],
            ],
            [
                'name' => 'tag',
                'label' => 'Тег/Позначка',
                'type' => 'select_from_array',
                'options' => [
                    '' => 'Без тегу',
                    'hot' => 'Топ продажів',
                    'new' => 'Новинка 2026',
                    'biz' => 'Бізнес',
                    'family' => "Сім'я",
                    'travel' => 'Виїзд',
                    'finance' => 'Фінанси',
                    'property' => 'Нерухомість',
                ],
            ],
            ['name' => 'title_uk', 'label' => 'Назва UA', 'type' => 'text'],
            ['name' => 'title_en', 'label' => 'Назва EN', 'type' => 'text'],
            ['name' => 'desc_uk', 'label' => 'Опис UA', 'type' => 'textarea'],
            ['name' => 'desc_en', 'label' => 'Опис EN', 'type' => 'textarea'],
            [
                'name' => 'advantages_uk',
                'label' => 'Переваги UA',
                'type' => 'textarea',
                'hint' => 'Кожен пункт з нового рядка',
            ],
            [
                'name' => 'advantages_en',
                'label' => 'Переваги EN',
                'type' => 'textarea',
                'hint' => 'Кожен пункт з нового рядка',
            ],
            [
                'name' => 'features',
                'label' => 'Особливості (текст/JSON)',
                'type' => 'textarea',
                'hint' => 'Наприклад: 45+ стор. · 9 розділів · 3 шаблони',
            ],
            ['name' => 'price_old', 'label' => 'Стара ціна (₴)', 'type' => 'number'],
            ['name' => 'price', 'label' => 'Нова ціна (₴)', 'type' => 'number'],
            ['name' => 'pages', 'label' => 'Сторінок', 'type' => 'number'],
            ['name' => 'chapters', 'label' => 'Розділів', 'type' => 'number'],
            ['name' => 'templates', 'label' => 'Шаблонів', 'type' => 'number'],
            ['name' => 'sort', 'label' => 'Порядок', 'type' => 'number', 'value' => 0],
            [
                'name' => 'status',
                'label' => 'Статус',
                'type' => 'select_from_array',
                'options' => ['published' => 'Опубліковано', 'draft' => 'Чернетка', 'hidden' => 'Приховлено'],
                'default' => 'published',
            ],
        ]);
    }

    public function show()
    {
        return redirect()->to($this->crud->route);
    }
}
