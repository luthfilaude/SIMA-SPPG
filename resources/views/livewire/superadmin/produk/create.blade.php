<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createProductModal" tabindex="-1"
        aria-labelledby="createProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createProductModalLabel"><i class="fas fa-plus mr-1"></i>Tambah
                        {{ $title }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="product_code">Kode Produk</label>
                        <input wire:model="product_code" type="text"
                            class="form-control @error('product_code')
                                    is-invalid
                                @enderror"
                            id="product_code" placeholder="Masukkan kode produk">
                        @error('product_code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="name">Nama Produk</label>
                        <input wire:model="name" type="text"
                            class="form-control @error('name')
                                    is-invalid
                                @enderror"
                            id="name" placeholder="Masukkan nama produk">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        {{-- <label for="description">Deskripsi</label>
                        <input wire:model="description" type="text"
                            class="form-control @error('description')
                                    is-invalid
                                @enderror"
                            id="description" placeholder="Masukkan deskripsi produk">
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror --}}
                        <div wire:ignore>
                            <label for="description">Deskripsi</label>
                            <textarea id="summernote" class="form-control @error('description') is-invalid @enderror"
                                placeholder="Masukkan deskripsi produk">{!! $description !!}</textarea>

                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="row mt-2">
                        <label for="price">Harga Jual</label>
                        <input wire:model="price" type="text"
                            class="form-control @error('price')
                                    is-invalid
                                @enderror"
                            id="price" placeholder="Masukkan harga produk">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="cost_price">Harga Beli</label>
                        <input wire:model="cost_price" type="text"
                            class="form-control @error('cost_price')
                                    is-invalid
                                @enderror"
                            id="cost_price" placeholder="Masukkan harga beli produk">
                        @error('cost_price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="stock">Stok</label>
                        <input wire:model="stock" type="text"
                            class="form-control @error('stock')
                                    is-invalid
                                @enderror"
                            id="stock" placeholder="Masukkan stok produk">
                        @error('stock')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">

                        <label for="imageInputFile">Gambar</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input wire:model="image" type="file"
                                    class="custom-file-input
                                @error('image')
                                    is-invalid
                                @enderror
                                "
                                    id="imageInputFile">
                                <label class="custom-file-label" for="imageInputFile">
                                    {{ $image ? $image->getClientOriginalName() : 'Pilih gambar produk' }}
                                </label>
                            </div>
                            <div class="input-group-append">
                                <span class="btn btn-primary btn-sm">Upload</span>
                            </div>
                        </div>
                        <div x-show='isUploading' class='progress mt-2'>
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100" x-bind:style="'width: ' + progress + '%'"
                                x-text="progress + '%'"></div>
                        </div>
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="is_active">Status Produk</label>
                        <select wire:model="is_active"
                            class="form-control @error('is_active')
                                    is-invalid
                                @enderror"
                            id="is_active">
                            <option selected>Pilih status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        @error('is_active')
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
