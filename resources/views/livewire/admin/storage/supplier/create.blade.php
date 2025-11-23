<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createSupplierModal" tabindex="-1"
        aria-labelledby="createSupplierModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSupplierModalLabel"><i class="fas fa-plus mr-1"></i>Tambah
                        {{ $title }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="name">Nama Supplier</label>
                        <input wire:model="name" type="text"
                            class="form-control @error('name')
                                    is-invalid
                                @enderror"
                            id="name" placeholder="Masukkan nama supplier">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="contact_person">Narahubung</label>
                        <input wire:model="contact_person" type="text"
                            class="form-control @error('contact_person')
                                    is-invalid
                                @enderror"
                            id="contact_person" placeholder="Masukkan narahubung">
                        @error('contact_person')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="phone">Nomor Telpon</label>
                        <input wire:model="phone" type="text"
                            class="form-control @error('phone')
                                    is-invalid
                                @enderror"
                            id="phone" placeholder="Masukkan nomor telpon">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="address">Alamat</label>
                        <textarea wire:model="address"
                            class="form-control @error('address')
                                    is-invalid
                                @enderror"
                            id="address" placeholder="Masukkan alamat"></textarea>
                        @error('address')
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
