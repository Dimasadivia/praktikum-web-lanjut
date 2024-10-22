<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Faker\Provider\UserAgent;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index() 
    { 
        $users = $this->userModel->getUser(); // Ambil data user dari model
        
        $data = [ 
            'title' => 'Create User', 
            'users' => $users,
            'kelas' => $this->userModel->getUser(), // Kirim variabel $users ke view
        ]; 

        return view('list_user', $data); 
    }


    // public function index() 
    // { 
    //     $data = [ 
    //         'title' => 'Create User', 
    //         'kelas' => $this->userModel->getUser(), 
    //     ]; 
    
    //     return view('list_user', $data); 
    // }

    public function create(){

        $kelas = $this->kelasModel->getKelas();

        // $kelasModel = new Kelas ();

        // $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
        // return view('create_user', [
        //     'kelas' => Kelas::all(),
        // ]);
    }

    public function store(Request $request) 
    { 
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'required|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi foto
        ]);

        // Proses upload foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName(); // Buat nama file unik
            $foto->storeAs('uploads', $fotoName); // Simpan foto di folder storage/app/uploads
        } else {
            $fotoName = null;
        }

        // Simpan data user ke database
        $this->userModel->create([ 
            'nama' => $request->input('nama'), 
            'npm' => $request->input('npm'), 
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoName, // Menyimpan nama file ke database
        ]); 

        // Redirect dengan pesan sukses
        return redirect()->to('/')->with('success', 'User berhasil ditambahkan'); 
    }

    public function show($id)
    {
        $user = UserModel::findOrFail($id);
        $kelas = Kelas::findOrFail($user->kelas_id);

        $title = 'Detail' . $user->nama;

        return view('show_user', compact('user','kelas','title'));
    }

    // public function show($id){
    //     $user = $this->userModel->getUser($id);

    //     $data = [
    //         'title' => 'Profile',
    //         'user' => $user,

    //     ];

    //     return view ('profile', $data);
    // }

    public function edit ($id)
    {
        $user = UserModel::findorFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit_user', compact('user','kelas','title'));
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi foto (nullable)
        ]);

        // Update data user
        $user->nama = $request->input('nama');
        $user->npm = $request->input('npm');
        $user->kelas_id = $request->input('kelas_id');

        // Proses upload foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName(); // Buat nama file unik
            $foto->storeAs('uploads', $fotoName); // Simpan foto di folder storage/app/uploads
            $user->foto = $fotoName; // Menyimpan nama file ke database
        }

        $user->save();

        return redirect()->route('user.list')->with('success', 'User updated successfully');
    }


    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete(); // Memanggil fungsi delete
    
        return redirect()->route('user.list')->with('success', 'User has been deleted successfully');
    }
    

    // public function store(UserRequest $request)
    // {
    //     $validatedData = $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'npm' => 'required|string|max:255',
    //         'kelas_id' => 'required|exists:kelas,id',
    //        ]);

    //        $user = $this->userModel->create($validatedData);

    //     //    $user = UserModel::create($validatedData);
           
    //        $user->load('kelas');

    //     return view('profile', [
    //         'nama' => $user->nama,
    //         'npm' => $user->npm,
    //         'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
            
    //     ]);
    // }
}