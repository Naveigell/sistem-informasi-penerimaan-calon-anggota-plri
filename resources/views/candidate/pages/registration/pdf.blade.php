<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ public_path('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <title>Registrasi Online</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .biodata {
            font-size: 25px;
        }
    </style>
</head>
<body>
<div class="position-relative w-100 h-100">
    <img src="{{ public_path('assets/img/pdf/3.jpeg') }}" alt="" style="width: 100%; height: 100%;" class="position-absolute">
    <div class="container position-relative h-100 w-100">
        <table class="h-100 w-100">
            <tbody>
                <tr>
                    <td class="h-100 align-middle w-100">
                        <div class="text-center text">
                            <img src="{{ $avatar }}" alt="" style="width: 200px; height: 230px;">
                            <h2 class="mt-3">Nomor Reg. Online</h2>
                            <h1>{{ $registrationNumber }}</h1>
                        </div>
                        <table class="w-100 px-5 mx-5 mt-3">
                            <tbody>
                                <tr class="biodata">
                                    <td class="pt-3">Nama Lengkap</td>
                                    <td class="pt-3">: <span style="background: #d2d2d2; color: #222;" class="p-2">{{ $name }}</span></td>
                                </tr>
                                <tr class="biodata">
                                    <td class="pt-3">No Telp</td>
                                    <td class="pt-3">: {{ $phone }}</td>
                                </tr>
                                <tr class="biodata">
                                    <td class="pt-3">Email</td>
                                    <td class="pt-3">: {{ $email }}</td>
                                </tr>
                                <tr class="biodata">
                                    <td class="pt-3">Tgl Lahir</td>
                                    <td class="pt-3">: {{ $birthday }}</td>
                                </tr>
                                <tr class="biodata">
                                    <td class="pt-3">Polres</td>
                                    <td class="pt-3">: {{ $polres }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
