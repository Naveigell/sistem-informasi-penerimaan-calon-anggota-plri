<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
{{--    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">--}}
        <link rel="stylesheet" href="{{ public_path('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <style>
        tbody > tr > td {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="mt-5 w-100 text-center">
        <div class="w-100">
            <div>
                <img src="{{ $avatar }}"
                     width="200px"
                     height="230px"
                     alt="">
            </div>
            <div class="mt-5">
                <h4>Nomor Reg. Online</h4>
                <h1>{{ $registrationNumber }}</h1>
            </div>
        </div>
        <div>
            <table class="col-12 mt-5">
                <tbody>
                    <tr>
                        <td class="pt-2 pb-2">Nama</td>
                        <td>:</td>
                        <td>
                            <span style="background-color: #818181;" class="d-block pl-2 font-weight-bold">
                                {{ $name }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="pt-2 pb-2">No Telp</td>
                        <td>:</td>
                        <td>{{ $phone }}</td>
                    </tr>
                    <tr>
                        <td class="pt-2 pb-2">Email</td>
                        <td>:</td>
                        <td>{{ $email }}</td>
                    </tr>
                    <tr>
                        <td class="pt-2 pb-2">Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{ $birthday }}</td>
                    </tr>
                    <tr>
                        <td class="pt-2 pb-2">Polres</td>
                        <td>:</td>
                        <td>{{ $polres }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
