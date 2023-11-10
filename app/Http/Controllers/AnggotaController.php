<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = DB::table('anggota')->get();
        return view('anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'kode' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'jurusan' => 'required',
            'no' => 'required',
            'alamat' => 'required',
        ]);

        $query = DB::table('anggota')->insert([
            'id' => $request['id'],
            'kode' => $request['kode'],
            'nama' => $request['nama'],
            'jk' => $request['jk'],
            'jurusan' => $request['jurusan'],
            'no' => $request['no'],
            'alamat' => $request['alamat'],
        ]);

        return redirect('/anggota');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $anggota = DB::table('anggota')->where('id',$id)->get();
        return view('anggota.show', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $anggota = DB::table('anggota')->where('id', $id)->get();
        return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'jurusan' => 'required',
            'no' => 'required',
            'alamat' => 'required',
        ]);

        $query = DB::table('anggota')->where('id', $id)->update([
            //'field yang ada di table' => $request['name yang dikirim dari form']
            'kode' => $request['kode'],
            'nama' => $request['nama'],
            'jk' => $request['jk'],
            'jurusan' => $request['jurusan'],
            'no' => $request['no'],
            'alamat' => $request['alamat'],
        ]);

        return redirect()->route('anggota.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $query = DB::table('anggota')->where('id', $id)->delete();
        return redirect()->route('anggota.index');
    }
}