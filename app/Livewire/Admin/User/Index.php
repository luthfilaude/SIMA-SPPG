<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $search = '';

    public $name,$email,$password,$password_confirmation,$role,$user_id;


    public function render()
    {
        $data = array(
            'title' => 'Manajemen User',
            'user' => User::where('name','like','%'.$this->search.'%')
            ->orWhere('email','like','%'.$this->search.'%')
            ->orderBy('role','asc')->paginate($this->perPage)
        );
        return view('livewire.admin.user.index', $data);
    }

    public function create(){
        $this->resetValidation();
        $this->reset([
            'name',
            'email',
            'password',
            'password_confirmation',
            'role',
        ]);
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'role' => 'required|in:Super Admin,Admin,User',
        ],
        [
            'role.in' => 'Peran yang dipilih tidak valid. Pilih salah satu dari: Super Admin, Admin, User.',
            'role.required' => 'Peran wajib diisi.',
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.string' => 'Nama lengkap harus berupa teks.',
            'name.max' => 'Nama lengkap maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password_confirmation.required' => 'Konfirmasi kata sandi wajib diisi.',
            'password_confirmation.same' => 'Konfirmasi kata sandi tidak sesuai dengan kata sandi.',
        ]);

        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->role = $this->role;
        $user->save();

        $this->dispatch('closeCreateModal');

        // $this->dispatchBrowserEvent('close-modal');
    }
    public function edit($id)
    {
        $this->resetValidation();
        $this->reset([
            'name',
            'email',
            'password',
            'password_confirmation',
            'role',
            'user_id',
        ]);

        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = '';
        $this->password_confirmation = '';
        $this->role = $user->role;
        $this->user_id = $user->id;


    }
    public function update($id)
    {
        $user = User::findOrFail($id);
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|in:Super Admin,Admin,User',
            'password' => 'nullable|string|min:8',
            'password_confirmation' => 'nullable|same:password'
        ],
        [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.string' => 'Nama lengkap harus berupa teks.',
            'name.max' => 'Nama lengkap maksimal 255 karakter.',
            'role.in' => 'Peran yang dipilih tidak valid. Pilih salah satu dari: Super Admin, Admin, User.',
            'role.required' => 'Peran wajib diisi.',
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password_confirmation.same' => 'Konfirmasi kata sandi tidak sesuai dengan kata sandi.',
        ]);

        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = $this->role;
        if(filled($this->password)){
            $user->password = bcrypt($this->password);
        }
        $user->save();

        $this->dispatch('closeEditModal');
    }
    public function userConfirm($id)
    {
        $user = User::findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->user_id = $user->id;
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        if($user){
            $user->delete();
        }

        $this->dispatch('closeDeleteModal');
    }
}
