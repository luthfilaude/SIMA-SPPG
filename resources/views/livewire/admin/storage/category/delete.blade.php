<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteCategoryModal" tabindex="-1"
        aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCategoryModalLabel"><i class="fas fa-trash mr-1"></i>Hapus
                        {{ $title }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @error('error')
                        <div class="row alert alert-danger">
                            <div class="col-4">
                                <span>{{ $message }}</span>
                            </div>
                        </div>
                    @enderror
                    <div class="row">
                        <div class="col-4">
                            <span>Nama Kategori</span>
                        </div>
                        <div class="col-8">
                            : {{ $name }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <span>Slug</span>
                        </div>
                        <div class="col-8">
                            : {{ $slug }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <span>Deskripsi</span>
                        </div>
                        <div class="col-8">
                            : {{ $description }}
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                            <i class="fas fa-times mr-1"></i>
                            Tutup</button>
                        <button wire:click="destroy({{ $category_id }})" type="button" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash mr-1"></i>
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
