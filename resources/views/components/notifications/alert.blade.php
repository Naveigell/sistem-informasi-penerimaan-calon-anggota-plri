<div class="alert {{ $type ?? 'alert-success' }} alert-dismissible show fade">
    <div class="alert-body">
        @if ($dissmisable ?? true)
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
        @endif
        {{ $message ?? ($slot ?? '') }}
    </div>
</div>
