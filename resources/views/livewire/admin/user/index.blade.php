<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><i class="fas fa-users mr-2"></i>{{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home mr-2"></i> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active"><i class="fas fa-users mr-1"></i> {{ $title }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <button wire:click="create" class="btn btn-primary" data-toggle="modal"
                                data-target="#createUserModal"><i class="fas fa-plus mr-2"></i>Tambah Data</button>
                        </div>
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-print mr-1"></i> Cetak
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-danger" href="#"><i class="fas fa-file-pdf mr-2"></i>
                                    PDF</a>
                                <a class="dropdown-item text-success" href="#"><i
                                        class="fas fa-file-excel mr-2"></i> Excel</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class='mb-3 d-flex justify-content-between'>
                        <div class="form-group d-inline-block mr-2">
                            <select class="form-control form-control-sm" wire:model.live="perPage">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div>
                            <input type="text" class="form-control form-control-sm" placeholder="Cari..."
                                wire:model.live="search">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th style="width: 150px"><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        @if ($item->role == 'Super Admin')
                                            <td><span class="badge badge-warning">{{ $item->role }}</span></td>
                                        @elseif($item->role == 'Admin')
                                            <td><span class="badge badge-primary">{{ $item->role }}</span></td>
                                        @else
                                            <td><span class="badge badge-secondary">{{ $item->role }}</span></td>
                                        @endif
                                        <td>
                                            <button wire:click='edit({{ $item->id }})' data-toggle="modal"
                                                data-target="#updateUserModal" class="btn btn-sm btn-warning"><i
                                                    class="fas fa-edit"></i></button>
                                            <button wire:click='userConfirm({{ $item->id }})' data-toggle="modal"
                                                data-target="#deleteUserModal" class="btn btn-sm btn-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $user->links() }}
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
        {{-- Create Modal --}}
        @include('livewire.admin.user.create')
        {{-- End Create Modal --}}
        @script
            <script>
                $wire.on('closeCreateModal', () => {
                    $('#createUserModal').modal('hide');
                    swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data user berhasil ditambahkan',
                        timer: 2000,
                        showConfirmButton: false,
                    })
                });
            </script>
        @endscript
        @include('livewire.admin.user.edit')
        @script
            <script>
                $wire.on('closeEditModal', () => {
                    $('#updateUserModal').modal('hide');
                    swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data user berhasil diupdate',
                        timer: 2000,
                        showConfirmButton: false,
                    })
                });
            </script>
        @endscript
        @include('livewire.admin.user.delete')
        @script
            <script>
                $wire.on('closeDeleteModal', () => {
                    $('#deleteUserModal').modal('hide');
                    swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data user berhasil dihapus',
                        timer: 2000,
                        showConfirmButton: false,
                    })
                });
            </script>
        @endscript
    </div>
</div>
