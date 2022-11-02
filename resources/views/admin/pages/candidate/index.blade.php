@extends('layouts.admin.admin')

@section('title', 'Peserta')

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>List Peserta</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Ttl</th>
                            <th scope="col">Kota</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($candidates as $candidate)
                            <tr>
                                <th>{{ $candidates->firstItem() + $loop->index }}</th>
                                <td>{{ $candidate->name }}</td>
                                <td>{{ $candidate->email }}</td>
                                <td>{{ $candidate->gender_formatted }}</td>
                                <td>{{ $candidate->birth_place }}, {{ $candidate->birth_date->format('d F Y') }}</td>
                                <td>{{ $candidate->city }}</td>
                                <td>{{ $candidate->phone }}</td>
                                <td>
                                    <a href="{{ route('admins.candidates.show', $candidate) }}" class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-eye"></i></a>
                                    <!-- Use this action to remove Jurusan -->
                                    <span data-action="{{ route('admins.candidates.destroy', $candidate) }}" class="delete-confirm-btn display-xs-inline-block" data-toggle="tooltip" title="Hapus">
                                        <button type="button" class="btn btn-danger" data-toggle="modal">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <x-vendor.pagination :collection="$candidates"></x-vendor.pagination>
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
