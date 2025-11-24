<?php

namespace App\Livewire\Admin\Storage\Supplier;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Validate;

class index extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search = '';

    public $name,$contact_person,$email,$phone,$address,$supplier_id;

    public function render()
    {
        $cacheKey = $cacheKey = 'suppliers_' . $this->search . '_per_' . $this->perPage;
        $cacheSupplier = Cache::remember($cacheKey, 3600, function () {
        return Supplier::latest()
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage);
        });

        $data = array(
            'title' => 'Management Supplier',
            'suppliers' => $cacheSupplier
        );
        return view('livewire.admin.storage.supplier.index', $data);
    }
    // Create Button
    public function create(){
        $this->resetValidation();
        $this->reset();
    }
    // Store to database
    public function store()
    {
        $this->validate(
        [
            'name' => 'required|string',
            'contact_person' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
        ],
        [
            'name.required' => 'Nama supplier wajib diisi.',
            'contact_person.required' => 'Narahubung wajib diisi.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'address.required' => 'Alamat wajib diisi.',
        ]);

        $suppliers = new Supplier;
        $suppliers->name = $this->name;
        $suppliers->contact_person = $this->contact_person;
        $suppliers->email = $this->email;
        $suppliers->phone = $this->phone;
        $suppliers->address = $this->address;

        $suppliers->save();
        Cache::flush();
        $this->dispatch('closeCreateSupplierModal');
        $this->resetValidation();
    }


    public function edit($id){

        // Jika id berbeda dengan id sebelumnya
        if ($this->supplier_id !== $id) {
        $this->resetValidation();
        $this->reset();
        };

        $suppliers = Supplier::findOrFail($id);
        $this->supplier_id = $suppliers->id;
        $this->name = $suppliers->name;
        $this->contact_person = $suppliers->contact_person;
        $this->phone = $suppliers->phone;
        $this->email = $suppliers->email;
        $this->address = $suppliers->address;
    }
    public function update($id){
        $suppliers = Supplier::findOrFail($id);
        $this->validate(
        [
            'name' => 'required|string',
            'contact_person' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
        ],
        [
            'name.required' => 'Nama supplier wajib diisi.',
            'contact_person.required' => 'Narahubung wajib diisi.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'address.required' => 'Alamat wajib diisi.',
        ]);
        $suppliers->name = $this->name;
        $suppliers->contact_person = $this->contact_person;
        $suppliers->phone = $this->phone;
        $suppliers->email = $this->email;
        $suppliers->address = $this->address;
        $suppliers->save();

        Cache::flush();
        $this->dispatch('closeEditSupplierModal');
        $this->resetValidation();
        $this->reset();

    }
    public function supplierConfirm($id){
        $suppliers = Supplier::findOrFail($id);
        $this->name = $suppliers->name;
        $this->contact_person = $suppliers->contact_person;
        $this->phone = $suppliers->phone;
        $this->email = $suppliers->email;
        $this->address = $suppliers->address;
    }
    public function destroy($id){
        $suppliers = Supplier::findOrFail($id);
        if($suppliers->stockItems()->count() > 0){
            return with('error', 'Supplier tidak bisa dihapus karena masih digunakan oleh data barang.');
        }
        $suppliers->delete();
        Cache::flush();
        $this->dispatch('closeDeleteSupplierModal');
    }
}
