<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createCategoryModal" tabindex="-1"
        aria-labelledby="createCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel"><i class="fas fa-plus mr-1"></i>Tambah
                        {{ $title }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="name">Nama Kategori</label>
                        <input wire:model="name" type="text"
                            class="form-control @error('name')
                                    is-invalid
                                @enderror"
                            id="name" placeholder="Masukkan nama kategori">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="slug">slug</label>
                        <input wire:model="slug" type="text"
                            class="form-control @error('slug')
                                    is-invalid
                                @enderror"
                            id="sku" placeholder="Masukkan slug">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="description">Deskripsi</label>
                        <textarea wire:model='description' class="form-control @error('description') is-invalid @enderror"
                            placeholder="Masukkan deskripsi produk"></textarea>

                        @error('description')
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
