<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NoteRequest;
use Illuminate\Support\HtmlString;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NoteCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NoteCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Note::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/note');
        CRUD::setEntityNameStrings('note', 'notes');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        $this->crud->modifyColumn('attachment', [
            'type' => 'upload',
            'disk' => 'public',
        ]);

        $this->crud->modifyColumn('link', [
            'type' => 'url'
        ]);

        $this->crud->removeColumns(['description']);

        $this->crud->column([
            'name' => 'description',
            'type' => 'summernote',
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhere('description', 'like', '%' . $searchTerm . '%');
            }
        ]);
    }

    public function setupShowOperation()
    {
        $this->setupListOperation();

        $this->crud->addColumn([
            'name' => 'created_at'
        ]);

        $this->crud->addColumn([
            'name' => 'updated_at'
        ]);

        $this->crud->column([
            'name' => 'description',
            'type' => 'summernote',
        ])->after('name');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation([
            'name' => 'required|min:2',
            // 'attachment' => 'required'
        ]);

        CRUD::setFromDb(); // set fields from db columns.

        $this->crud->modifyField('description', [
            'type' => 'summernote'
        ]);

        $this->crud->removeField('attachment');

        $this->crud->field([   // Upload
            'name' => 'attachment',
            'type' => 'upload',
            'withFiles' => true
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
