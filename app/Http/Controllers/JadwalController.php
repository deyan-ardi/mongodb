<?php

namespace App\Http\Controllers;

use App\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('page.jadwal',compact('jadwal',$jadwal));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('page.c_jadwal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jadwal::create([
            'nama_dosen' => ucwords($request->nama_dosen),
            'nama_kelas' => ucWords($request->nama_kelas),
            'jadwal' => $request->jadwal_kelas,
            'matkul' => ucWords($request->matkul_kelas),
        ]);
        return redirect(route('jadwal'))->with('success', 'Data Jadwal Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect(route('jadwal'))->with('success', 'Data Jadwal Berhasil Dihapus');
    }
}
