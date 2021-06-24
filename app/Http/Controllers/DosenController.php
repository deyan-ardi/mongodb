<?php

namespace App\Http\Controllers;

use App\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = Dosen::all();
        return view('page.dosen', compact('dosen', $dosen));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.c_dosen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dosen::create([
            'nip_dosen' => $request->nip_dosen,
            'nama_dosen' => ucWords($request->nama_dosen),
            'prodi' => ucWords($request->prodi_dosen),
            'fakultas' => ucWords($request->fakultas_dosen),
        ]);
        return redirect(route('dosen'))->with('success', 'Data Dosen Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        return view('page.u_dosen', compact('dosen', $dosen));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Dosen::where('_id', $request->id_dosen)->update([
            'nip_dosen' => $request->nip_dosen,
            'nama_dosen' => ucWords($request->nama_dosen),
            'prodi' => ucWords($request->prodi_dosen),
            'fakultas' => ucWords($request->fakultas_dosen),
        ]);
        return redirect(route('dosen'))->with('success', 'Data Dosen Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect(route('dosen'))->with('success', 'Data Dosen Berhasil Dihapus');
    }
}
