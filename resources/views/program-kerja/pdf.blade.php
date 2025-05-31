<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Program Kerja BEM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .kop-surat {
            text-align: center;
            margin-bottom: 5px;
        }

        .kop-table {
            width: 100%;
        }

        .kop-table img {
            width: 80px;
            height: auto;
        }

        .kop-title {
            text-align: center;
        }

        .kop-title h1 {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }

        .kop-title h2 {
            font-size: 14px;
            margin: 0;
            font-weight: normal;
        }

        .garis-ganda {
            border-bottom: 3px solid black;
            margin-top: 5px;
        }

        .garis-tipis {
            border-bottom: 1px solid black;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .kop-table {
            width: 100%;
            border: none;
        }

        .kop-table td {
            border: none;
            padding: 0;
        }

        .kop-table img {
            width: 80px;
            height: auto;
        }

        .kop-title {
            text-align: center;
        }

        .kop-title h1 {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }

        .kop-title h2 {
            font-size: 14px;
            margin: 0;
            font-weight: normal;
        }

        .kop-line-top {
            border-top: 3px solid #000;
            height: 0;
        }

        .kop-line-gap {
            height: 2px;
            /* Atur jarak antar garis */
        }

        .kop-line-bottom {
            border-top: 1px solid #000;
            height: 0;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        <table class="kop-table">
            <tr>
                <td width="20%">
                    <img src="{{ public_path('logo/logo_stimik.png') }}" alt="Logo Universitas" height="70">
                </td>
                <td width="60%" class="kop-title">
                    <h1>PROGRAM KERJA</h1>
                    <h1>BADAN EKSEKUTIF MAHASISWA (BEM)</h1>
                    <h1>STMIK TIDORE MANDIRI</h1>
                </td>
                <td width="20%">
                    <img src="{{ public_path('logo/logo_bem.png') }}" alt="Logo BEM" height="70">
                </td>
            </tr>

        </table>
    </div>
    <div class="kop-line-top"></div>
    <div class="kop-line-gap"></div>
    <div class="kop-line-bottom"></div>

    <table>
        <thead>
            <tr>
                <th width="8%">No</th>
                <th width="30%">Departemen</th>
                <th width="35%">Program kerja</th>
                <th width="27%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($departemen as $dept)
                <tr>
                    <td rowspan="{{ max(1, $structured[$dept]->count()) }}">{{ $loop->iteration }}</td>
                    <td rowspan="{{ max(1, $structured[$dept]->count()) }}">{{ $dept }}</td>
                    @if (isset($structured[$dept]) && $structured[$dept]->isNotEmpty())
                        @foreach ($structured[$dept] as $index => $program)
                            @if ($index > 0)
                <tr>
            @endif
            <td>{{ $program->program_kerja }}</td>
            <td>{{ $program->keterangan }}</td>
            @if ($index > 0)
                </tr>
            @endif
            @endforeach
        @else
            <td colspan="2">-</td>
            @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
