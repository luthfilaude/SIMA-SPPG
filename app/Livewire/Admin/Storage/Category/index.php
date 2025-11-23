<?php

namespace App\Livewire\Storage\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class index extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search = '';

    public $name,$slug,$description;

    public function render()
    {
        $data = array(
            'title' => 'Management Category',
            'categories' => Category::latest()->where('name','like','%'.$this->search.'%')
            ->orderBy('created_at','asc')->paginate($this->perPage),
        );
        return view('livewire.admin.storage.category.index', $data);
    }
}
