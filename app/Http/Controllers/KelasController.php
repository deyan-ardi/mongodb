<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('page.kelas',compact('kelas',$kelas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.c_kelas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kelas::create([
            'nama_kelas' => ucwords($request->nama_kelas),
            'prodi' => ucWords($request->prodi_kelas),
            'fakultas' => ucWords($request->fakultas_kelas),
        ]);
        return redirect(route('kelas'))->with('success', 'Data Kelas Berhasil Ditambahkan');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        return view('page.u_kelas', compact('kelas', $kelas));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Kelas::where('_id',$request->id_kelas)->update([
            'nama_kelas' => ucwords($request->nama_kelas),
            'prodi' => ucWords($request->prodi_kelas),
            'fakultas' => ucWords($request->fakultas_kelas),
        ]);
        return redirect(route('kelas'))->with('success', 'Data Kelas Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect(route('kelas'))->with('success', 'Data Kelas Berhasil Dihapus');
    }
}
