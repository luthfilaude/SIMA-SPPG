<?php

namespace App\Livewire\Admin\Storage;

use App\Models\Category;
use App\Models\StockItem;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use withPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search = '';

    public $name, $sku, $description, $stock_image, $stock, $stock_min, $stock_purchase, $supplier_id, $category_id;

    public function render()
    {

        $data = array(
            'title' => 'Storage Management',
            'categories' => Category::all(),
            'suppliers' => Supplier::all(),
            'stockItem' => StockItem::with(['category','supplier'])->where('name','like','%'.$this->search.'%')
            ->orWhere('sku','like','%'.$this->search.'%')
            ->orderBy('created_at','asc')->paginate($this->perPage)
        );
        return view('livewire.admin.storage.index', $data);
    }
    // Create Button
    public function create(){
        $this->resetValidation();
        $this->reset();
        // $this->dispatch('loadSummernote');
    }
    // Store Create Data
    public function store(){
        $this->validate([
            'name' => 'required|string|max:255|unique:products,product_code',
            'sku' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
            'stock_min' => 'required|integer|min:0',
            'stock_image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'price_purchase' => 'required|numeric|min:0',
            'category_id' => 'required|exist:categories,id',
            'supplier_id' => 'required|exist:suppliers,id',
        ],
        [
            'name.required' => 'Nama Bahan Baku wajib di isi.',
        ]);

        $stockitems = new StockItem;
        $stockitems->name = $this->name;
        $stockitems->sku = $this->sku;
        $stockitems->description = $this->description;
        $stockitems->stock_image = $this->imagePath;
        $stockitems->stock = $this->stock;
        $stockitems->stock_min = $this->stock_min;
        $stockitems->price_purchase = $this->price_purchase;
        $stockitems->category_id = $this->category_id;
        $stockitems->supplier_id = $this->supplier_id;

        $stockitems->save();

        $this->dispatch('closeCreateModal');
    }

    public function edit($id)
    {

    }
    public function update($id){

    }
    public function storageConfirm()
    {

    }
    public function destroy($id)
    {

    }

    // Barang Masuk
    public function createStockIn()
    {

    }
    public function storeStockIn()
    {

    }

    // Barang Keluar
    public function createStockOut()
    {

    }
    public function storeStockOut()
    {

    }
}
