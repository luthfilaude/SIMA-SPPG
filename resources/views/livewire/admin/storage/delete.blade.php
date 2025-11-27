<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteStorageModal" tabindex="-1"
        aria-labelledby="deleteStorageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStorageModalLabel"><i class="fas fa-trash mr-1"></i>Show
                        {{ $title }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <span>Nama Bahan/Barang</span>
                        </div>
                        <div class="col-8">
                            : {{ $name }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <span>SKU</span>
                        </div>
                        <div class="col-8">
                            : {{ $sku }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <span>Kategori</span>
                        </div>
                        <div class="col-8">
                            : {{ $category }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <span>Supplier</span>
                        </div>
                        <div class="col-8">
                            : {{ $supplier }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <span>Stok</span>
                        </div>
                        <div class="col-8">
                            : {{ $stock }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <span>Stok Minimum</span>
                        </div>
                        <div class="col-8">
                            : {{ $stock_min }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <span>Harga Satuan</span>
                        </div>
                        <div class="col-8">
                            :Rp {{ number_format($price_purchase, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <span>Gambar</span>
                        </div>
                        <div class="col-8">
                            {{-- <img src="{{}}" alt=""> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                            <i class="fas fa-times mr-1"></i>
                            Tutup
                        </button>
                        <button wire:click="destroy({{ $item_id }})" type="button" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash mr-1"></i>
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
