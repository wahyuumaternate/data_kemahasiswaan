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

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .header h2 {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 5px;
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

        .empty-row {
            height: 40px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>PROGRAM KERJA</h1>
        <h2>BADAN EKSEKUTIF MAHASISWA (BEM)</h2>
        <h2>STMIK TIDORE MANDIRI</h2>
    </div>

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
                        {{-- Loop program kerja untuk departemen ini --}}
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
            {{-- Tambah baris kosong kalau mau --}}
            {{-- @for ($i = 0; $i < 2; $i++)
                <tr class="empty-row">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            @endfor --}}
            @endforeach


        </tbody>
    </table>
</body>

</html>
