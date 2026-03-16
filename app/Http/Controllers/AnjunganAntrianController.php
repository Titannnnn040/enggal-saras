<?php

namespace App\Http\Controllers;

use App\Models\Antrian;

use Illuminate\Http\Request;

class AnjunganAntrianController extends Controller
{
    public function indexAnjungan(){
        return view('pages.anjungan-antrian.index', ['title' => 'anjungan']);
    }
    public function storeAnjungan(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string',
            'jenis' => 'required|string|in:BPJS,Non BPJS',
        ]);

        $today = now()->toDateString();
        $currentTime = now()->format('H:i:s');

        $lastQueue = Antrian::whereDate('date', $today)->count() + 1;

        $queueNumber = $lastQueue; // angka murni, mis. 3

        $data = [
            'patient_name' => $request->nama,
            'type'         => $request->jenis,
            'date'         => $today,
            'time'         => $currentTime,
            'queue'        => $queueNumber,
            'call_time'    => null,
            'duration'     => null,
            'status'       => 'MENUNGGU',
        ];

        $queue = Antrian::create($data);

        return response()->json([
            'success'   => true,
            'message'   => 'Data berhasil disimpan',
            'data'      => $queue,
            'print_url' => route('print.anjungan', $queue->id)
        ]);
    }
    public function printAntrian($id)
    {
        $queue = Antrian::findOrFail($id);

        return view('pages.anjungan-antrian.print-antrian', compact('queue'));
    }
    public function indexAntrian(){
        $today = now()->toDateString();
        $currentTime = now()->format('H:i:s');

        $antrian = Antrian::whereDate('date', $today)->latest()->get();
        return view('pages.anjungan-antrian.antrian', ['title' => 'antrian', 'antrian' => $antrian]);
    }
    public function callQueue($id)
    {
        $queue = \DB::table('t_patient_queue')->where('id', $id)->first();

        if (!$queue) {
            return response()->json([
            'success' => false,
                'message' => 'Data antrian tidak ditemukan'
            ], 404);
        }

        $callTime = now()->format('H:i:s');

        \DB::table('t_patient_queue')
            ->where('id', $id)
            ->update([
                'call_time' => $callTime,
                'status' => 'DIPANGGIL',
                'updated_at' => now()
            ]);

        return response()->json([
            'success' => true,
            'id' => $id,
            'queue' => $queue->queue,
            'patient_name' => $queue->patient_name,
            'call_time' => $callTime,
            'status' => 'DIPANGGIL'
        ]);
    }
}
