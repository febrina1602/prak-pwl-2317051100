<?php

namespace App\Http\Controllers;


use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function create(){
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public $userModel;
    public $kelasModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
        
    }

    public function store(Request $request){
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'nim' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);
        return redirect()->to('/user')->with('success', 'Data berhasil ditambahkan');
    }

    public function index(){
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }

    public function edit($id){
        $user = $this->userModel->findorfail($id);
        $kelas = $this->kelasModel->getKelas();
        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas,
        ];
        return view('edit_user', $data);
    }

    public function update(Request $request, $id){
        $user = $this->userModel->findorfail($id);
        $user->update([
            'nama' => $request->input('nama'),
            'nim' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);
        return redirect()->to('/user')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id){
        $user = $this->userModel->findorfail($id);
        $user->delete();
        return redirect()->to('/user')->with('success', 'Data berhasil dihapus');
    }
}
