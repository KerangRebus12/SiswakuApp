<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Telepon;
use App\Kelas;
use App\Hobi;
use App\Http\Requests\SiswaRequest;
use Storage;



class SiswaController extends Controller
{
    
    public function index(){
        
        $siswa_list = Siswa::orderBy('nama_siswa', 'asc')->paginate(3);
        $siswa_all = Siswa::all();
        $jumlah_siswa = $siswa_all->count();
        return view('siswa.index', compact('siswa_list', 'jumlah_siswa'));
    }

    public function create(){
        return view('siswa.create');
    }

    public function show(Siswa $siswa){
        return view('siswa.show', compact('siswa'));
    }


    public function store(SiswaRequest $request){
        $input = $request->all();

        // Foto
        if($request->hasFile('foto')){
            $input['foto'] = $this->uploadFoto($request);
        }

        // Simpan Data Siswa
        $siswa = Siswa::create($input);

        // Simpan Data Telepon
        if($request->filled('nomor_telepon')){
            $this->insertTelepon($siswa, $request);
        }

        // Simpan Hobi
        $siswa->hobi()->attach($request->input('hobi_siswa'));

        return redirect('siswa');
    }

    public function edit(Siswa $siswa){
        $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Siswa $siswa , SiswaRequest $request){
        $input = $request->all();

        // Update foto
        if($request->hasFile('foto')){
            $input['foto'] = $this->updateFoto($siswa, $request);
        }
         // Update Siswa
        $siswa->update($input);

        //update telepon
        $this->updateTelepon($siswa, $request);

        // update hobi
        $siswa->hobi()->sync($request->input('hobi_siswa'));    
        return redirect('siswa');
    }

    public function destroy(Siswa $siswa){
        // hapus foto
        $this->hapusFoto($siswa);
        
        
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

    private function insertTelepon(Siswa $siswa, SiswaRequest $request){
        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);
    }

    private function updateTelepon(Siswa $siswa, Request $request){
        if($siswa->telepon){
            // jika tel terisi, update
            if($request->filled('nomor_telepon')){
                $telepon = $siswa->telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
            // jika tel tidak diisi, hapus
            else{
                $siswa->telepon()->delete();
            } 
        }
        // buat entry baru
        else{
            if($request->filled('nomor_telepon')){
                $telepon = new Telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
        }
    }

    private function uploadFoto(SiswaRequest $request){
        $foto = $request->file('foto');
        $ext = $foto->getClientOriginalExtension();

        if($request->file('foto')->isValid()){
            $foto_name = date('YdmHis'). ".$ext";
            $request->file('foto')->move('fotoupload', $foto_name);
            return $foto_name;
        }
        return false;
    }

    private function updateFoto(Siswa $siswa, SiswaRequest $request){
        // jika user mengisi foto
        if($request->hasFile('foto')){
            // hapus foto lama jika ada baru
            $exist = Storage::disk('foto')->exists($siswa->foto);
            if(isset($siswa->foto) && $exist){
                $delete = Storage::disk('foto')->delete($siswa->foto);
            }
            // upload foto baru
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();
            if($request->file('foto')->isValid()){
                $foto_name = date('YdmHis').".$ext";
                $upload_path = 'fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                return $foto_name;
            }
        }
    }

    private function hapusFoto(Siswa $siswa){
        $is_foto_exist = Storage::disk('foto')->exists($siswa->foto);

        if($is_foto_exist){
            Storage::disk('foto')->delete($siswa->foto);
        }
    }

}

