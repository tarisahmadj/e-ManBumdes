<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use Illuminate\Http\Request;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usaha = Usaha::all();
        return view('usaha/usaha1', [
            'title' => 'usaha yang ada',
            'usaha' => $usaha,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usaha/usaha1_create', [
            'title' => 'Usaha', 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usaha_berjalan'     => 'required',
            'average_omset' => 'required',
            'modal_usaha' => 'required',
        ]);

        // $validatedData['kuota'] = $validatedData['jml_siswa'];
        // $validatedData['ada_pengampu'] = 0;
        Usaha::create($validatedData);

        return redirect('/usaha')->with('success', 'Ruang Kelas baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     $usaha = Usaha::where('id',$id)->first();
    //     return view('usaha/usaha1_detail', [
    //         'title' => 'usaha yang ada',
    //         'usaha' => $usaha,
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usaha = Usaha::where('id',$id)->first();
        return view('usaha/usaha1_edit', [
            'title' => 'usaha yang ada',
            'usaha' => $usaha,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'usaha_berjalan'     => 'required',
            'average_omset' => 'required',
            'modal_usaha' => 'required',
        ]);

        // $validatedData['kuota'] = $validatedData['jml_siswa'];
        // $validatedData['ada_pengampu'] = 0;
        Usaha::where('id', $id)->update($validatedData);

        return redirect('/usaha')->with('success', 'Ruang Kelas baru berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete usaha
        Usaha::destroy($id);

        return redirect('/usaha')->with('deleted', 'Kelas berhasil dihapus');
    }
}