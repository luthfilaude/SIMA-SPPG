<?php

namespace App\Livewire\Admin\Storage\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Exports\CategoryExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;


class index extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search = '';

    public $name,$slug,$description,$category_id;

    public function render()
    {
        $cacheKey = $cacheKey = 'categories_' . $this->search . '_per_' . $this->perPage;
        $cacheCategory = Cache::remember($cacheKey, 3600, function () {
        return Category::latest()
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);
        });

        $data = array(
            'title' => 'Management Category',
            'categories' => $cacheCategory
        );
        return view('livewire.admin.storage.category.index', $data);
    }
    // Create Button
    public function create(){
        $this->resetValidation();
        $this->reset();
    }
    // Store to database
    public function store(){
        $this->validate(
        [
            'name' => 'required|string',
            'description' => 'nullable|string',
        ],
        [
            'name.required' => 'Nama kategori wajib diisi.',
            'slug.required' => 'Slug wajib diisi.',
        ]);

        $categories = new Category;
        $categories->name = $this->name;
        $categories->slug = Str::slug($this->name);
        $categories->description = $this->description;

        $categories->save();
        Cache::flush();
        $this->dispatch('closeCreateCategoryModal');
    }
    public function edit($id){
        // Jika id berbeda dengan id sebelumnya
        if ($this->category_id !== $id) {
        $this->resetValidation();
        $this->reset();
        };

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
            'description' => 'nullable|string',
        ],
        [
            'name.required' => 'Nama kategori wajib diisi.',
        ]
        );

        $categories->name = $this->name;
        $categories->slug = Str::slug($this->slug);
        $categories->description = $this->description;
        $categories->save();
        Cache::flush();
        $this->dispatch('closeEditCategoryModal');
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
        if($categories->stockItems()->count() > 0){
            return with('error', 'Kategori tidak bisa dihapus karena masih digunakan oleh data barang.');
        }
        $categories->delete();
        Cache::flush();
        $this->dispatch('closeDeleteCategoryModal');
    }

    // Export Laporan
    public function exportExcel()
    {
        return Excel::download(new CategoryExport, now()->format('Ymd_His') . ' - Daftar Kategori.xlsx');
    }
}
