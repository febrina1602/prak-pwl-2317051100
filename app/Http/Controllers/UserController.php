<?php

namespace App\Http\Controllers;


use App\Models\Kelas;
use App\Models\User;
use App\Models\userModel;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    //
    public function create(){
        $kelas = Kelas::all();
        foreach ($kelas as $kelasItem) {
            if ($kelasItem && !empty($kelasItem->nama_kelas)) {

                try {
                    $decryptedName = Crypt::decryptString($kelasItem->nama_kelas);
                    $kelasItem->nama_kelas = $decryptedName;
                } catch (DecryptException $e) {

                    Log::error('Gagal dekripsi nama_kelas (ID: '.$kelasItem->id.') 
                    saat memuat form create user', 
                    ['error' => $e->getMessage()]);
                    
                    $kelasItem->nama_kelas = '[Data Kelas Rusak]'; 
                }
            }
        }
        // $kelasModel = new Kelas();
        // $kelas = $kelasModel->getKelas();
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
        $users = userModel::with('kelas')->get();
        $title ='test';
        foreach ($users as $user) {
            if ($user->kelas && !empty($user->kelas->nama_kelas)) { 

                try {
                    
                    $decryptedName = Crypt::decryptString($user->kelas->nama_kelas);
                    $user->kelas->nama_kelas = $decryptedName; 
                } catch (DecryptException $e) {

                    Log::error('Gagal dekripsi nama_kelas (ID: '.$user->kelas->id.') 
                    untuk user: ' . $user->id, ['error' => $e->getMessage()]);

                    $user->kelas->nama_kelas = '[Data Kelas Rusak]'; 
                }
            }
        }
        return view('list_user', compact('users','title'));
    
        // $data = [
        //     'title' => 'List User',
        //     'users' => $this->userModel->getUser(),
        // ];
        // return view('list_user', $data);
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
