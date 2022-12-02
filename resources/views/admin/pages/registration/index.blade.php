@extends('layouts.admin.admin')

@section('title', 'Registrasi')

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>List Form Registrasi</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $registration)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucwords($registration->name) }}</td>
                                    <td>
                                        <label class="custom-switch pl-0">
                                            <input type="checkbox" data-status="{{ $registration->is_active ? 0 : 1 }}" data-action="{{ route('admins.registrations.update', $registration) }}" name="status_{{ $registration->id }}" @if ($registration->is_active) checked @endif class="custom-switch-input registration-status-checkboxes">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">@if ($registration->is_active) Aktif @endif</span>
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <form action="" id="hidden-status-form" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" id="hidden-status-input" name="is_active">
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script defer>
        $(document).ready(function() {
            $('.registration-status-checkboxes').change(function (evt) {
                var form = $('#hidden-status-form');

                form.find('#hidden-status-input').val($(this).data('status'));
                form.attr('action', $(this).data('action'));
                form.submit();
            });
        });
    </script>
@endpush
