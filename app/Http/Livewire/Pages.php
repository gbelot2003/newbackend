<?php

namespace App\Http\Livewire;

use App\Models\Page;
use App\Custom\Slugs;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Pages extends Component
{

    use WithPagination;
    public $slug;
    public $modalId;
    public $title;
    public $content;
    public $modalFormVisible = false;
    public $modalDeletePage = false;
    public $deleteItem;

    public function __contruct()
    {
        $this->slugGenerator = new Slugs();
    }

    public function mount()
    {
        //$this->resetPage();
    }

    /**
     * Clear fields
     */
    public function clearVars()
    {
        $this->title = null;
        $this->slug = null;
        $this->content = null;
        $this->message = null;
        $this->modalId = null;
    }

    /**
     * The data from model maped!
     */
    public function modelData()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
        ];
    }

    /**
     * The validation rules
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages', 'slug')->ignore($this->modalId)],
            'content' => 'required'
        ];
    }

    /**
     * Load the model data 
     * of this component.
     * 
     * @return void
     */
    public function loadModal()
    {
        $data = Page::find($this->modalId);
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->content = $data->content;
    }
    
    /**
     * Show the Modal to edit 
     * the information.
     */
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->modalId = $id;
        $this->modalFormVisible = true;
        $this->loadModal($id);
    }

    /**
     *  Show Delete modal
     */
    public function deleteShowModal($id)
    {
        $this->modalId = $id;
        $this->modalDeletePage = true;
        $this->loadModalDelete($id);
    }

    /**
     * Load info to delete
     */
    public function loadModalDelete()
    {
        $data = Page::find($this->modalId);
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->content = $data->content;
    }

    /**
     * Delete the record
     */
    public function deletePage()
    {
        Page::destroy($this->modalId);
        $this->modalDeletePage = false;
        $this->resetPage();
    }

    /**
     * Show the form modal
     * on the create function
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->modalFormVisible = true;
        $this->clearVars();
    }

    /**
     * Generate slug from value.
     * it will move to model
     */
    private function generateSlug($value)
    {
        $process1 = str_replace(' ', '-', $value);
        $this->slug = strtolower($process1);
    }

    /**
     * Update Slug field
     */
    public function updatedTitle($value)
    {
        $this->generateSlug($value);
    }

    /**
     *  Record form entity
     */
    public function create() 
    {
        $this->validate();
        Page::create($this->modelData());
        $this->modalFormVisible = false;
        $this->clearVars();
    }

    public function update()
    {
        $this->validate();
        Page::find($this->modalId)->update($this->modelData());
        $this->modalFormVisible = false;
        $this->clearVars();
    }

    /**
     * The read function
     * 
     * @return void
     */
    public function read()
    {
        return Page::paginate(5);
    }

    /**
     * The livewire render function
     */
    public function render()
    {
        return view('livewire.pages', [
            'data' => $this->read(),
        ]);
    }


}
