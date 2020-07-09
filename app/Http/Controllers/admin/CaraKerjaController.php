<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SyaratRepo;
use App\Repositories\KeteranganRepo;

use DB;

class CaraKerjaController extends Controller
{
    //
    private $syaratRepoGlobal;
    private $keteranganRepoGlobal;


    public function __construct(SyaratRepo $syaratRepoObj, KeteranganRepo $keteranganRepoObj )
    {
        $this->syaratRepoGlobal = $syaratRepoObj;
        $this->keteranganRepoGlobal = $keteranganRepoObj;

    }

    // base function ===================

    public function index(Request $request)
    {
        // $keterangans=$this->syaratRepoGlobal->get_syarat_by_type();
        // dd($keterangans);

        return view('admin.carakerja',[
            'syarats'=>$this->syaratRepoGlobal->get_syarat_by_type_pt(),
            'syaratOrg'=>$this->syaratRepoGlobal->get_syarat_by_type_org(),
            'keterangans'=>$this->keteranganRepoGlobal->get_keterangan_by_flow(),
        ]);
    }
    
    //CRUD
    public function create(){
    }

    //method post
    public function store(Request $request){
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
    }

    //method delete
    public function destroy($id){
    }

    // function tambahan ===================

    public function input_flow(Request $request){
        // dd($request);
        $id=$request->ketId;

        $this->validate($request, [
    		'keterangan' => 'required'
        ]);

        $array=array(
            'keterangan_text'=>$request->keterangan,
        );

        try {
            //code...
            DB::beginTransaction();
            $this->keteranganRepoGlobal->update($array,$id);
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

    public function input_syarat_perusahaan(Request $request){
        $this->validate($request, [
    		'tambahSyarat' => 'required'
        ]);
        $array=array(
            'syarat_text'=>$request->tambahSyarat,
            'syarat_type'=>1,
        );

        try {
            //code...
            DB::beginTransaction();
            $this->syaratRepoGlobal->create($array);
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

    public function update_syarat_perusahaan(Request $request){
        // dd('update');
        $this->validate($request, [
    		'syarattext' => 'required'
        ]);
        $id=$request->syaratId;
        $array=array(
            'syarat_text'=>$request->syarattext,
        );

        try {
            //code...
            DB::beginTransaction();
            $this->syaratRepoGlobal->update($array,$id);
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

    public function input_syarat_perorangan(Request $request){
        $this->validate($request, [
    		'tambahSyarat' => 'required'
        ]);
        $array=array(
            'syarat_text'=>$request->tambahSyarat,
            'syarat_type'=>2,
        );

        try {
            //code...
            DB::beginTransaction();
            $this->syaratRepoGlobal->create($array);
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
}
