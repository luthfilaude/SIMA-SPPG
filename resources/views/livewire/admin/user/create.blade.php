<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel"><i class="fas fa-plus mr-1"></i>Tambah
                        {{ $title }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="name">Nama Lengkap</label>
                        <input wire:model="name" type="text"
                            class="form-control @error('name')
                                    is-invalid
                                @enderror"
                            id="name" placeholder="Masukkan nama lengkap">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="email">Email</label>
                        <input wire:model="email" type="email"
                            class="form-control @error('email')
                                    is-invalid
                                @enderror"
                            id="email" placeholder="Masukkan email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="password">Kata Sandi</label>
                        <input wire:model="password" type="password"
                            class="form-control @error('password')
                                    is-invalid
                                @enderror"
                            id="password" placeholder="Masukkan kata sandi">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                        <input wire:model="password_confirmation" type="password"
                            class="form-control @error('password_confirmation')
                                    is-invalid
                                @enderror"
                            id="password_confirmation" placeholder="Masukkan konfirmasi kata sandi">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <label for="role">Peran</label>
                        <select wire:model="role"
                            class="form-control @error('role')
                                    is-invalid
                                @enderror"
                            id="role">
                            <option selected>Pilih peran</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Staff</option>
                        </select>
                        @error('role')
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
