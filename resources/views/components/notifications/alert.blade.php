<div class="alert {{ $type ?? 'alert-success' }} alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>×</span>
        </button>
        {{ $message ?? 'Berhasil' }}
    </div>
</div>
