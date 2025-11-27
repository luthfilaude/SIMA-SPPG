<?php

namespace App\Livewire\Admin\Storage;

use Livewire\Component;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\StockItem;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class Index extends Component
{
    use withPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search = '';

    public $item_id, $name, $sku, $description, $stock_image, $stock, $stock_min,
    $price_purchase, $supplier_id, $category_id, $supplier_name, $category_name,
    $category, $supplier, $qty_in, $remarks_in, $qty_out, $remarks_out;
    public function render()
    {

        // $data = array(
        //     'title' => 'Storage Management',
        //     'categories' => Category::all(),
        //     'suppliers' => Supplier::all(),
        //     'stockItem' => StockItem::with(['category','supplier'])->where('name','like','%'.$this->search.'%')
        //     ->orWhere('sku','like','%'.$this->search.'%')
        //     ->orderBy('created_at','asc')->paginate($this->perPage)
        // );
        $data = [
            'title' => 'Storage Management',
            'categories' => Cache::remember('categories', 3600, fn() => Category::orderBy('name')->get()),
            'suppliers' => Cache::remember('suppliers', 3600, fn() => Supplier::orderBy('name')->get()),
            'stockItem' => StockItem::with(['category','supplier'])
        ->where(function($q){
            $q->where('name','like','%'.$this->search.'%')
              ->orWhere('sku','like','%'.$this->search.'%');
        })
        ->orderBy('created_at','asc')
        ->paginate($this->perPage)
];

        return view('livewire.admin.storage.index', $data);
    }
    // Create Button
    public function create(){
        $this->resetValidation();
        $this->reset();
        $this->dispatch('loadSummernote');
    }
    // Store Create Data
    public function store(){
        $this->validate([
            'name' => 'required|string|max:255|',
            'sku' => 'required|string|max:50|unique:stock_items,sku',
            'description' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
            'stock_min' => 'required|integer|min:0',
            'stock_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'price_purchase' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ],
        [
            'name.required' => 'Nama bahan baku wajib di isi.',
            'sku.required' => 'SKU wajib di isi.',
            'stock.required' => 'Stok bahan wajib di isi.',
            'stock_min.required' => 'Stok minimal wajib di isi.',
            'price_purchase.required' => 'Harga beli bahan wajib di isi.',
        ]);
        $data = new StockItem;
        // image condition
        if($this->stock_image){
            $filename = time() . '_' . uniqid() . '.' . $this->stock_image->getClientOriginalExtension();
            $img = ImageManager::gd()->read($this->stock_image)->scale(width:800); // resize
            $img->toJpeg(85)->save(storage_path('app/public/stock-images/' . $filename));
            $data->stock_image = 'stock-images/' . $filename;
        }

        $data->name = $this->name;
        $data->sku = 'SPPG-CNK2-' . $this->sku;
        $data->description = $this->description;
        $data->stock = $this->stock;
        $data->stock_min = $this->stock_min;
        $data->price_purchase = $this->price_purchase;
        $data->category_id = $this->category_id;
        $data->supplier_id = $this->supplier_id;

        $data->save();
        Cache::flush();
        $this->dispatch('closeCreateModal');
    }

    public function edit($id)
    {
        // Jika id berbeda dengan id sebelumnya
        if ($this->item_id !== $id) {
        $this->resetValidation();
        $this->reset();
        };
        $data = StockItem::findOrFail($id);
        $this->item_id = $id;
        $this->name = $data->name;
        $this->sku = $data->sku;
        $this->description = $data->description;
        $this->stock = $data->stock;
        $this->stock_min = $data->stock_min;
        $this->stock_image = $data->stock_image;
        $this->price_purchase = $data->price_purchase;
        $this->category_id = $data->category_id;
        $this->supplier_id = $data->supplier_id;


    }
    public function update(){
        $data = StockItem::findOrFail($this->item_id);
        $this->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:50|unique:stock_items,sku,' . $this->item_id,
            'description' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
            'stock_min' => 'required|integer|min:0',
            'stock_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'price_purchase' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ],
        [
            'name.required' => 'Nama bahan baku wajib di isi.',
            'sku.required' => 'SKU wajib di isi.',
            'stock.required' => 'Stok bahan wajib di isi.',
            'stock_min.required' => 'Stok minimal wajib di isi.',
            'price_purchase.required' => 'Harga beli bahan wajib di isi.',
        ]);
        if ($this->stock_image) {
            if ($data->stock_image && Storage::disk('public')->exists($data->stock_image)) {
            Storage::disk('public')->delete($data->stock_image);
            }}

        // Cek apakah user mengubah SKU
        if ($this->sku !== $data->sku) {
        // jika SKU berubah → tambahkan prefix
            $data->sku = 'SPPG-CNK2-' . $this->sku;
        }
        $data->name = $this->name;
        $data->description = $this->description;
        $data->stock = $this->stock;
        $data->stock_min = $this->stock_min;
        $data->price_purchase = $this->price_purchase;
        $data->category_id = $this->category_id;
        $data->supplier_id = $this->supplier_id;
        $data->save();
        Cache::flush();
        $this->dispatch('closeUpdateModal');
    }

    public function show($item_id){
        $data = StockItem::with(['category', 'supplier'])->findOrFail($item_id);
        $this->name = $data->name;
        $this->sku = $data->sku;
        $this->description = $data->description;
        $this->stock = $data->stock;
        $this->stock_min = $data->stock_min;
        $this->stock_image = $data->stock_image;
        $this->price_purchase = $data->price_purchase;
        $this->category = $data->category->name;
        $this->supplier = $data->supplier->name;
    }

    public function storageConfirm()
    {

    }
    public function destroy()
    {
        $data = StockItem::findOrFail($this->item_id);
        // Hapus file gambar jika ada
        if ($data->stock_image) {
            Storage::disk('public')->delete($data->stock_image);
        }
        $data->delete();
        Cache::flush();
        $this->dispatch('closeDeleteModal');
    }

    // Barang Masuk
    public function createStockIn($id)
    {
        $this->resetValidation();
        $this->reset();
    }
    public function storeStockIn()
    {
        $this->validate([
            'stock_item_id' => 'required|exists:stock_items,id',
            'quantity' => 'required|integer|min:1',
            'remarks' => 'required|string|max:255',
        ]);

        $item = StockItem::findOrFail($this->item_id);
        $qty_old = $item->stock;
        $item->stock = $qty_old + $this->qty_in;
        $item->save();
        Cache::flush();

        $this->dispatch('closeMovementModal');
    }

    // Barang Keluar
    public function createStockOut()
    {

    }
    public function storeStockOut()
    {

    }
}
