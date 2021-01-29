<?php

namespace App\Http\Livewire;

use App\Models\Page;
use App\Custom\Slugs;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Pages extends Component
{

    public $slug;
    public $title;
    public $content;
    public $modalFormVisible = true;

    public function __contruct()
    {
        $this->slugGenerator = new Slugs();
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
            'slug' => ['required', Rule::unique('pages', 'slug')],
            'content' => 'required'
        ];
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

    /**
     * The livewire render function
     */
    public function render()
    {
        return view('livewire.pages');
    }


}
