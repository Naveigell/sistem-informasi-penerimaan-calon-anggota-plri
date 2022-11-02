@if (@$collection && $collection->isNotEmpty())
    <div class="col-sm-12 col-md-12">
        <div role="status">
            <div class="mt-3 float-left">
                Menampilkan {{ $collection->firstItem() }} sampai {{ $collection->lastItem() }}
                dari
                {{ $collection->total() }} data
            </div>
        </div>
        <div class="mt-3 float-right">
            {{ $collection->links() }}
        </div>
    </div>
@endif
