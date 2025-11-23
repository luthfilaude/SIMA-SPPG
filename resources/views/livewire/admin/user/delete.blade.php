<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel"><i class="fas fa-trash mr-1"></i>Hapus
                        {{ $title }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <span>Nama Lengkap</span>
                        </div>
                        <div class="col-8">
                            : {{ $name }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <span>Email</span>
                        </div>
                        <div class="col-8">
                            : {{ $email }}
                        </div>
                    </div>
                    <div class="row mt-2 mb-3">
                        <div class="col-4">
                            <span>Role</span>
                        </div>
                        <div class="col-8">
                            : @if ($role == 'Super Admin')
                                <td><span class="badge badge-warning">{{ $role }}</span></td>
                            @elseif($role == 'Admin')
                                <td><span class="badge badge-primary">{{ $role }}</span></td>
                            @else
                                <td><span class="badge badge-secondary">{{ $role }}</span></td>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                            <i class="fas fa-times mr-1"></i>
                            Tutup</button>
                        <button wire:click="destroy({{ $user_id }})" type="button" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash mr-1"></i>
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
