<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ public_path('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <title>Nametag</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="position-relative w-100 h-100">
        <img src="{{ public_path('assets/img/pdf/1.png') }}" alt="" style="width: 100%; height: 100%;" class="position-absolute">
        <div class="position-relative h-100 w-100">
            <table class="h-100 w-100">
                <tbody>
                    <tr>
                        <td class="h-100 w-100 align-middle">
                            <table class="text text-center w-100">
                                <tbody>
                                    <tr>
                                        <td class="w-100">
                                            <span style="font-size: 20px;">Nomor Ujian Anda</span>
                                            <h1 class="mt-3">{{ $candidate->test_number }}</h1>
                                        </td>
                                    </tr>
                                    <tr class="text text-justify">
                                        <table class="container px-5 mx-5 mt-4" style="font-size: 25px;">
                                            <tbody>
                                                <tr>
                                                    <td>Nomor Reg. Online</td>
                                                    <td>&nbsp;:&nbsp;&nbsp; {{ $candidate->registration_number }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>&nbsp;:&nbsp;&nbsp; {{ strtoupper($candidate->name) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Kelamin</td>
                                                    <td>&nbsp;:&nbsp;&nbsp; {{ $candidate->gender_formatted }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Asal Polda/Polres</td>
                                                    <td>&nbsp;:&nbsp;&nbsp; {{ $candidate->polda->name }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="h-100 w-100 align-middle position-relative">
                            <img src="{{ public_path('assets/img/pdf/1.png') }}" alt="" style="width: 100%; height: 100%;" class="position-absolute">
                            <table class="text text-center w-100 position-relative">
                                <tbody>
                                    <tr>
                                        <td style="font-size: 90px;" class="font-weight-bold">
                                            {!! join('</br>', explode('/', $candidate->test_number)) !!}
                                        </td>
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
