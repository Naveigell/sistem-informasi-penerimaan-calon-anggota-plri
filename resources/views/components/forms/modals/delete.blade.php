<div class="modal fade" tabindex="-1" role="dialog" id="{{ $id ?? 'modal-delete' }}">
    <div class="modal-dialog modal-md" role="document">
        <form action="" method="post" class="modal-content" id="modal-delete-form">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title">{{ $title ?? 'Hapus ?' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">{{ $message ?? 'Aksi tidak bisa diulangi' }}</div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-shadow" id="">Hapus</button>
                <button type="button" class="btn btn-secondary" id="">Batal</button>
            </div>
        </form>
    </div>
</div>
