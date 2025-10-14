<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mata_kuliah;

class MataKuliahController extends Controller
{
    public function index(){
        $data = [
            'title' => 'List Mata Kuliah',
            'mks' => mata_kuliah::all(),
        ];
        return view('list_mk', $data);
    }

    public function create(){
        return view('create_mk', ['title' => 'Create Mata Kuliah',]);
    }

    public function store(Request $request){
        mata_kuliah::create([
            'nama_mk' => $request->input('nama_mk'),
            'sks' => $request->input('sks'),
        ]);
        return redirect()->to('/matakuliah');
    }

    public function edit($id){
         $mk = mata_kuliah::find($id); // Define the $mk variable here
        return view('edit_mk', [
            'title' => 'Edit Mata Kuliah',
            'mk' => $mk,
        ]);
    }

    public function update(Request $request, $id){
        request()->validate([
            'nama_mk' => 'required',
            'sks' => 'required|integer|min:1|max:6',
        ]);
        $mk = mata_kuliah::findorfail($id);
        $mk->update([
            'nama_mk' => $request->input('nama_mk'),
            'sks' => $request->input('sks'),
        ]);
        return redirect()->to('/matakuliah')->with('success', 'Mata kuliah berhasil diperbarui');
    }

    public function destroy($id){
        $mk = mata_kuliah::findorfail($id);
        $mk->delete();
        return redirect()->to('/matakuliah')->with('success', 'Mata kuliah berhasil dihapus') ;
    }
}
