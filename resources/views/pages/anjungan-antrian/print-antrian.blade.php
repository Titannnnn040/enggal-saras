<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Antrian</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            width: 300px;
            margin: 0 auto;
            padding: 10px;
            text-align: center;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 12px 0;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            line-height: 1.2;
        }

        .subtitle {
            font-size: 16px;
            font-weight: bold;
            margin-top: 18px;
        }

        .queue-number {
            font-size: 120px;
            font-weight: bold;
            margin: 10px 0;
            line-height: 1;
        }

        .info {
            width: 100%;
            margin-top: 10px;
            font-size: 14px;
            text-align: left;
        }

        .info table {
            width: 100%;
        }

        .info td {
            padding: 2px 0;
            vertical-align: top;
        }

        @media print {
            @page {
                size: 80mm auto;
                margin: 5mm;
            }

            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body onload="window.print(); setTimeout(() => window.close(), 500);">

    <div class="title">
        KLINIK ENGGAL SARAS <br>
        MHCC
    </div>

    <div class="line"></div>

    <div class="subtitle">ANTRIAN PENDAFTARAN</div>
    <div>Nomor Antrian Anda :</div>

    <div class="queue-number">{{ $queue->queue }}</div>

    <div class="info">
        <table>
            <tr>
                <td style="width: 90px;">Nama</td>
                <td style="width: 10px;">:</td>
                <td>{{ $queue->patient_name }}</td>
            </tr>
            <tr>
                <td>Tanggal & Jam</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse($queue->date)->format('d-m-Y') }} {{ $queue->time }}</td>
            </tr>
        </table>
    </div>

    <div class="line"></div>

    <button class="no-print" onclick="window.print()">Print Lagi</button>
</body>
</html>