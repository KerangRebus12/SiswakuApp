<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Telepon;
use App\Kelas;
use App\Hobi;
use Validator;

class SiswaController extends Controller
{
    
    public function index(){
        
        $siswa_list = Siswa::orderBy('nama_siswa', 'asc')->paginate(3);
        $siswa_all = Siswa::all();
        $jumlah_siswa = $siswa_all->count();
        return view('siswa.index', compact('siswa_list', 'jumlah_siswa'));
    }

    public function create(){
        $list_kelas = Kelas::pluck('nama_kelas', 'id');
        $list_hobi = Hobi::pluck('nama_hobi', 'id');
        return view('siswa.create', compact('list_kelas', 'list_hobi'));

    }

    public function show($id){
        
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }


    public function store(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'nisn' => 'required|string|size:4|unique:siswa,nisn',
            'nama_siswa' => 'required|string|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_telepon' => 'sometimes|numeric|digits_between:10,15|unique:telepon,nomor_telepon',
            'id_kelas' => 'required'
        ]);

        if($validator->fails()){
            return redirect('siswa/create')->withInput()->withErrors($validator);
        }

        $siswa = Siswa::create($input);

        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);

        $siswa->hobi()->attach($request->input('hobi_siswa'));

        return redirect('siswa');
    }

    public function edit($id){
        
        $siswa = Siswa::findOrFail($id);
        
        if(!empty($siswa->telepon->nomor_telepon)){
            $siswa->nomer_telepon = $siswa->telepon->nomor_telepon;
        }
        $list_kelas = Kelas::pluck('nama_kelas', 'id');
        $list_hobi = Hobi::pluck('nama_hobi', 'id');
        return view('siswa.edit', compact('siswa', 'list_kelas', 'list_hobi'));
    }

    public function update($id, Request $request){
        $siswa = Siswa::findOrFail($id);
        $input = $request->all();

        $validator = Validator::make($input,[
            'nisn' => 'required|string|size:4|unique:siswa,nisn,'.$request->input('id'),
            'nama_siswa' => 'required|string|max:25',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        if($validator->fails()){
            return redirect('siswa/'.$id.'/edit')->withInput()->withErrors($validator);
        }

        

        
        //update no telp bila sebelumnya sudah ada
        if($siswa->telepon){
            //jika telp diisi, update
            if($request->filled('nomor_telepon')){
                $telepon = $siswa->telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }else{
                //jika telp tdk diisi, delete
                $siswa->telepon()->delete();
            } 
        }else{
                if($request->filled('nomor_telepon')){
                    $telepon = new Telepon;
                    $telepon->nomor_telepon = $request->input('nomor_telepon');
                    $siswa->telepon()->save($telepon);     
            }
        }
        $siswa->update($request->all());
       
        $siswa->hobi()->sync($request->input('hobi_siswa'));    
        return redirect('siswa');
    }

    public function destroy($id){
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect('siswa');
    }

    public function tesCollection(){
        $data = [
            ['nisn'=>'6666', 'nama_siswa'=>'Joni'],
            ['nisn'=>'6543', 'nama_siswa'=>'Bernard Bear'],
            ['nisn'=>'1212', 'nama_siswa'=>'Yoahi']
        ];
        $collection = collect($data);
        $collection->toJson();
        return $collection;
        
    }

    public function dateMutator(){
        $siswa = Siswa::findOrFail(1);
        $nama = $siswa->nama_siswa;
        $tanggal_lahir = $siswa->tanggal_lahir->format('d-m-Y');
        $ulang_tahun = $siswa->tanggal_lahir->addYears(30)->format('d-m-Y');
        return "Siswa {$nama} lahir pada {$tanggal_lahir}.<br>
        Ulang Tahun ke-30 akan jatuh pada {$ulang_tahun}";
    }
}

