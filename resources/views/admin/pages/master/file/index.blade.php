@extends('layouts.admin.admin')

@section('title', 'File')

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>List File</h4>
                </div>
                <div class="card-body">
                    @if ($message = session('success'))
                        <x-notifications.alert :message="$message"></x-notifications.alert>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">Ukuran Maksimal</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $file)
                            <tr>
                                <th>{{ $files->firstItem() + $loop->index }}</th>
                                <td>{{ $file->name }}</td>
                                <td>{{ $file->max_size }} MB</td>
                                <td>{{ $file->description ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('admins.master.files.edit', $file) }}" class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pen"></i></a>
                                    <span data-action="{{ route('admins.master.files.destroy', $file) }}" class="delete-confirm-btn display-xs-inline-block" data-toggle="tooltip" title="Hapus">
                                        <button type="button" class="btn btn-danger" data-toggle="modal">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <x-vendor.pagination :collection="$files"></x-vendor.pagination>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <x-forms.modals.delete></x-forms.modals.delete>
@endsection

@push('script')
    <script defer>
        $(document).ready(function() {
            $('.delete-confirm-btn').click(function() {
                $('#modal-delete-form').get(0).setAttribute('action', $(this).data('action'));
                $('#modal-delete').modal('show');
            });
        });
    </script>
@endpush
