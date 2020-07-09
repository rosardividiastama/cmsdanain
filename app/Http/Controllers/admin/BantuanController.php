<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BantuanRepo;

use App\Constant\typeBantuan;

use DB;

class BantuanController extends Controller
{
    //
    private $bantuanRepoGlobal;

    public function __construct(BantuanRepo $bantuanRepoPbj)
    {
        $this->bantuanRepoGlobal = $bantuanRepoPbj;
    }

    // base function ===================

    public function index(Request $request)
    {
        // $keterangans=$this->syaratRepoGlobal->get_syarat_by_type();
        // dd($keterangans);

        return view('admin.bantuan',[
            'bantuanUmum'=>$this->bantuanRepoGlobal->get_by_type_umum(),
            'bantuanPengaduann'=>$this->bantuanRepoGlobal->get_by_type_pengaduan(),
            'bantuanLender'=>$this->bantuanRepoGlobal->get_by_type_lender(),
            'bantuanBiaya'=>$this->bantuanRepoGlobal->get_by_type_biaya(),
        ]);
    }
    
    //CRUD
    public function create(){
    }

    //method post
    public function store(Request $request){
        // dd($request);
        $this->validate($request, [
            'judul' => 'required',
            'jenisBantuan' => 'required',
            'deskripsi' => 'required',
        ]);

        $array=array(
            'bantuan_type'=>$request->jenisBantuan,
            'bantuan_title'=>$request->judul,
            'bantuan_text'=>$request->deskripsi,
        );

        try {
            //code...
            DB::beginTransaction();
            $this->bantuanRepoGlobal->create($array);
            DB::commit();

            return back()
            ->with('success','Save successfully.');
            // ->with('message','Sukses');

        } catch (\Exception $th) {
            throw $th;
            DB::rollback();
            return back()
            ->with('error',$th);
        }
    }

    //method get
    public function show($id=''){
    }

    //method get
    public function edit($id){
    }

    //method put
    public function update($id, Request $request){
        // dd($request->all(),$id);
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);
        $array=array(
            'bantuan_title'=>$request->judul,
            'bantuan_text'=>$request->deskripsi
        );

        try {
            //code...
            DB::beginTransaction();
            $this->bantuanRepoGlobal->update($array,$id);
            DB::commit();

            return back()
            ->with('success','Update successfully.');
            // ->with('message','Sukses');

        } catch (\Exception $th) {
            throw $th;
            DB::rollback();
            return back()
            ->with('error',$th);
        }

    }

    //method delete
    public function destroy($id){
    }

    // function tambahan ===================
}
