<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createStorageModal" tabindex="-1"
        aria-labelledby="createStorageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createStorageModalLabel"><i class="fas fa-plus mr-1"></i>Tambah
                        {{ $title }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="name">Nama Bahan Baku</label>
                        <input wire:model="name" type="text"
                            class="form-control @error('name')
                                    is-invalid
                                @enderror"
                            id="name" placeholder="Masukkan bahan baku">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="sku">SKU</label>
                        <input wire:model="sku" type="text"
                            class="form-control @error('sku')
                                    is-invalid
                                @enderror"
                            id="sku" placeholder="Masukkan SKU">
                        @error('sku')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="description">Deskripsi</label>
                        <input wire:model="description" type="text"
                            class="form-control @error('desciption')
                                    is-invalid
                                @enderror"
                            id="description" placeholder="Masukkan deskripsi">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="stock">Stok</label>
                        <input wire:model="stock" type="text"
                            class="form-control @error('stock')
                                    is-invalid
                                @enderror"
                            id="stock" placeholder="Masukkan jumlah stok bahan">
                        @error('stock')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="category_id">Kategori</label>
                        <select wire:model="category_id"
                            class="form-control @error('category_id')
                                    is-invalid
                                @enderror"
                            id="category_id">
                            <option selected>Pilih kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="supplier_id">Supplier</label>
                        <select wire:model="supplier_id"
                            class="form-control @error('supplier_id')
                                    is-invalid
                                @enderror"
                            id="supplier_id">
                            <option selected>Pilih supplier</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                            <i class="fas fa-times mr-1"></i>
                            Tutup</button>
                        <button wire:click="store" type="button" class="btn btn-primary btn-sm">
                            <i class="fas fa-save mr-1"></i>
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
