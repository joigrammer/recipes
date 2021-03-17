<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RecipeRequest;
use App\Models\Recipe;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;


/**
 * Class RecipeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RecipeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
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
        CRUD::setModel(\App\Models\Recipe::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/recipe');
        CRUD::setEntityNameStrings('recipe', 'recipes');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(RecipeRequest::class);

        CRUD::addField([
            'name' => 'name',
            'type' => 'text'
        ]);

        CRUD::addField([
            'name' => 'slug',
            'hint' => 'Will be automatically generated from name if left empty',            
        ]);

        CRUD::addField([
            'name' => 'extract',
            'type' => 'textarea',            
        ]);
        
        CRUD::addField([
            'type' => 'select2_multiple',
            'name' => 'tags',
            'entity' => 'tags'
        ]);       
                
        CRUD::addField([
            'name' => 'body',
            'type' => 'ckeditor',            
        ]);
        
        CRUD::addField([
            'type' => 'select2_multiple',
            'name' => 'ingredients',
            'entity' => 'ingredients'
        ]);   
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
