<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    private const KECAMATAN = [
        'Baleendah', 'Banjaran', 'Bojongsoang', 'Cicalengka', 'Ciparay',
        'Dayeuhkolot', 'Katapang', 'Majalaya', 'Margaasih', 'Pameungpeuk',
        'Rancaekek', 'Soreang',
    ];

    public function create()
    {
        return view('laporan.form', ['kecamatan' => self::KECAMATAN]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pelapor' => ['required', 'string', 'max:100'],
            'kecamatan'    => ['required', 'in:' . implode(',', self::KECAMATAN)],
            'alamat'       => ['required', 'string', 'max:255'],
            'tinggi_air'   => ['required', 'integer', 'min:1', 'max:500'],
            'deskripsi'    => ['nullable', 'string', 'max:1000'],
        ]);

        $data['tanggal_lapor'] = now()->toDateString();

        Laporan::create($data);

        return redirect()->route('laporan.create')
            ->with('success', 'Laporan Anda sudah kami terima dan akan segera ditindaklanjuti oleh petugas BPBD.');
    }

    public function index()
    {
        $laporan = Laporan::orderByDesc('tanggal_lapor')->orderByDesc('id')->get();

        return view('laporan.index', compact('laporan'));
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return back()->with('success', 'Laporan berhasil dihapus.');
    }
}