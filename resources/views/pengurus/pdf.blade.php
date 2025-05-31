<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Pengurus BEM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .kop-table {
            width: 100%;
            margin-bottom: 10px;
        }

        .kop-title {
            text-align: center;
        }

        .kop-title h1 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }

        .kop-title h2 {
            margin: 2px 0;
            font-size: 14px;
            font-weight: bold;
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

        .section-header {
            background-color: #e6e6e6;
            font-weight: bold;
            text-align: center;
        }

        .department-header {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .department-header td {
            text-align: center;
            font-weight: bold;
            font-size: 13px;
            padding: 10px 0;
        }

        .empty-row {
            height: 25px;
        }

        .kop-table {
            width: 100%;
            border: none;
        }

        .kop-table td {
            border: none;
            padding: 0;
        }
    </style>
</head>

<body>
    <table class="kop-table">
        <tr>
            <td width="20%">
                <img src="{{ public_path('logo/logo_stimik.png') }}" alt="Logo Universitas" height="60">
            </td>
            <td width="60%" class="kop-title">
                <h1>PENGURUS</h1>
                <h1>BADAN EKSEKUTIF MAHASISWA (BEM)</h1>
                <h1>STMIK TIDORE MANDIRI</h1>
            </td>
            <td width="20%">
                <img src="{{ public_path('logo/logo_bem.png') }}" alt="Logo BEM" height="60">
            </td>
        </tr>
    </table>

    <div class="kop-line-top"></div>
    <div class="kop-line-gap"></div>
    <div class="kop-line-bottom"></div>


    <table>
        <thead>
            <tr>
                <th width="25%">Jabatan</th>
                <th width="25%">Nama</th>
                <th width="25%">NPM</th>
                <th width="25%">Angkatan</th>
            </tr>
        </thead>
        <tbody>
            <!-- Pengurus Inti -->
            <tr class="section-header">
                <td colspan="4"><strong>Pengurus BEM</strong></td>
            </tr>
            @foreach ($structured['pengurus_inti'] as $pengurus)
                <tr>
                    <td>{{ $pengurus->jabatan }}</td>
                    <td>{{ $pengurus->nama ?: '' }}</td>
                    <td>{{ $pengurus->npm ?: '' }}</td>
                    <td>{{ $pengurus->angkatan ?: '' }}</td>
                </tr>
            @endforeach

            <tr class="section-header">
                <td colspan="4" style="text-align: center;"><strong>Bidang - Bidang</strong></td>
            </tr>

            @foreach ($structured['departemen'] as $departemen => $pengurusList)
                <tr class="department-header">
                    <td class="text-center" colspan="4">{{ $departemen }}</td>
                </tr>
                @foreach ($pengurusList as $pengurus)
                    <tr>
                        <td>{{ $pengurus->jabatan }}</td>
                        <td>{{ $pengurus->nama ?: '' }}</td>
                        <td>{{ $pengurus->npm ?: '' }}</td>
                        <td>{{ $pengurus->angkatan ?: '' }}</td>
                    </tr>
                @endforeach

                @for ($i = 0; $i < 3 - count($pengurusList); $i++)
                    <tr class="empty-row">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                @endfor
            @endforeach
        </tbody>
    </table>
</body>

</html>
