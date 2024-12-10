<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function sort(Request $request)
    {
    $field = $request->input('field', 'judul_tugas'); // Kolom default
    $order = $request->input('order', 'asc'); // Urutan default

    $tugas = Tugas::orderBy($field, $order)->get();
    return view('tugas.tampil', compact('tugas'));
    }

    public function getTugas()
    {
        $tugas = Tugas::all(); // Ambil semua tugas
        return response()->json($tugas);
    }

    function tampil(Request $request) {
        // Cek apakah ada query pencarian
        $search = $request->input('search');

        if ($search) {
            // Jika ada, lakukan pencarian berdasarkan judul_tugas, mata_kuliah, atau deskripsi_tugas
            $tugas = Tugas::where('judul_tugas', 'like', "%$search%")
                ->orWhere('mata_kuliah', 'like', "%$search%")
                ->orWhere('deskripsi_tugas', 'like', "%$search%")
                ->get();
        } else {
            // Jika tidak ada, ambil semua data tugas
            $tugas = Tugas::all();
        }

        return view('tugas.tampil', compact('tugas'));
    }

    function tambah(){
        return view('tugas.tambah');
    }

    function submit(Request $request){
        $tugas = new Tugas();
        $tugas->judul_tugas = $request->judul_tugas;
        $tugas->mata_kuliah = $request->mata_kuliah;
        $tugas->deskripsi_tugas = $request->deskripsi_tugas;
        $tugas->deadline_tugas = $request->deadline_tugas;
        $tugas->prioritas = $request->prioritas;
        $tugas->save();

        return redirect()->route('tugas.tampil');
    }

    function edit($id){
        $tugas = Tugas::find($id);
        return view('tugas.edit', compact('tugas'));
    }

    function update(Request $request, $id){
        $tugas = Tugas::find($id);
        $tugas->judul_tugas = $request->judul_tugas;
        $tugas->mata_kuliah = $request->mata_kuliah;
        $tugas->deskripsi_tugas = $request->deskripsi_tugas;
        $tugas->deadline_tugas = $request->deadline_tugas;
        $tugas->prioritas = $request->prioritas;
        $tugas->update();

        return redirect()->route('tugas.tampil');
    }

    function delete($id){
        $tugas = Tugas::find($id);
        $tugas->delete();
        return redirect()->route('tugas.tampil');
    }
}