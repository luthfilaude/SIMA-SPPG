<?php

namespace App\Livewire\Admin\Storage\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class index extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search = '';

    public $name,$slug,$description,$category_id;

    public function render()
    {
        $data = array(
            'title' => 'Management Category',
            'categories' => Category::latest()->where('name','like','%'.$this->search.'%')
            ->orderBy('created_at','asc')->paginate($this->perPage),
        );
        return view('livewire.admin.storage.category.index', $data);
    }
    // Create Button
    public function create(){
        $this->resetValidation();
        $this->reset();
        $this->dispatch('loadSummernote');
    }
    // Store to database
    public function store(){
        $this->validate(
        [
            'name' => 'required|string',
            'slug' => 'required|string',
            'description' => 'nullable|string',
        ],
        [
            'name.required' => 'Nama kategori wajib diisi.',
            'slug.required' => 'Slug wajib diisi.',
        ]);

        $categories = new Category;
        $categories->name = $this->name;
        $categories->slug = $this->slug;
        $categories->description = $this->description;

        $categories->save();
        $this->dispatch('closeCreateModal');
    }
    public function edit($id){
        $this->resetValidation();
        $this->reset();

        $categories = Category::findOrFail($id);
        $this->category_id = $categories->id;
        $this->name = $categories->name;
        $this->slug = $categories->slug;
        $this->description = $categories->description;

    }
    public function update($id){
        $categories = Category::findOrFail($id);
        $this->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
            'description' => 'nullable|string',
        ],
        [
            'name.required' => 'Nama kategori wajib diisi.',
            'slug.required' => 'Slug wajib diisi.',
        ]
        );

        $categories->name = $this->name;
        $categories->slug = $this->slug;
        $categories->description = $this->description;
        $categories->save();

        $this->dispatch('closeEditModal');
    }
    public function categoryConfirm($id){
        $categories = Category::findOrFail($id);
        $this->name = $categories->name;
        $this->slug = $categories->slug;
        $this->description = $categories->description;
        $this->category_id = $categories->id;
    }
    public function destroy($id){
        $categories = Category::findOrFail($id);
        if($categories){
            $categories->delete();
        }

        $this->dispatch('closeDeleteModal');
    }
}
