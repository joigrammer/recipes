<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\IngredientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class IngredientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class IngredientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Ingredient::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/ingredient');
        CRUD::setEntityNameStrings('ingredient', 'ingredients');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->enableExportButtons();
        
        CRUD::addColumn([
            'name' => 'name',
            'label' => 'Name'
        ]);

        CRUD::addColumn([
            'name' => 'category_id',
            'label' => 'Category'
        ]);

        CRUD::addColumn([
            'name' => 'allergens',
            'label' => 'Allergens',
            'type' => 'relationship'
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(IngredientRequest::class);

        CRUD::addField([
            'name' => 'name',
            'type' => 'text'
        ]);
        
        CRUD::addField([
            'name' => 'slug',
            'hint' => 'Will be automatically generated from name if left empty',            
        ]);

        CRUD::addField([
            'type' => 'textarea',
            'name' => 'description',
            'label' => 'Description'
        ]);

        CRUD::addField([
            'type' => 'select2',
            'name' => 'category_id',
            'entity' => 'category'
        ]);
        
        CRUD::addField([
            'type' => 'select2_multiple',
            'name' => 'allergens',
            'entity' => 'allergens'
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
