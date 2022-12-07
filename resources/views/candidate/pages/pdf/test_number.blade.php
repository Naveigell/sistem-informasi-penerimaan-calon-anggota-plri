<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ public_path('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <title>Nomor Ujian</title>
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
    <div class="container position-relative h-100">
        <table class="h-100 w-100 px-5 mx-5">
            <tbody>
            <tr>
                <td class="h-100 align-middle">
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <img src="{{ $candidate->avatar_url }}" alt="" style="width: 200px; height: 230px;">
                            </td>
                            <td class="align-top pl-3">
                                <h2>Nomor Ujian</h2>
                                <h1>{{ $candidate->test_number }}</h1>
                            </td>
                        </tr>
                        <tr class="biodata">
                            <td class="pt-3">Nama Lengkap</td>
                            <td class="pt-3">: {{ $candidate->name }}</td>
                        </tr>
                        <tr class="biodata">
                            <td class="pt-3">Jenis Kelamin</td>
                            <td class="pt-3">: {{ $candidate->gender_formatted }}</td>
                        </tr>
                        <tr class="biodata">
                            <td class="pt-3">Hp</td>
                            <td class="pt-3">: {{ $candidate->phone }}</td>
                        </tr>
                        <tr class="biodata">
                            <td class="pt-3">Email</td>
                            <td class="pt-3">: {{ $candidate->email }}</td>
                        </tr>
                        <tr class="biodata">
                            <td class="pt-3">Tgl Pendaftaran</td>
                            <td class="pt-3">: {{ $candidate->created_at->format('d F Y') }}</td>
                        </tr>
                        <tr class="biodata">
                            <td class="pt-3">Asal Polda/Polres</td>
                            <td class="pt-3">: {{ $candidate->polda->name }}</td>
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
