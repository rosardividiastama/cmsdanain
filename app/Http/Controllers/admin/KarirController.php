<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\KarirRepo;

use DB;

class KarirController extends Controller
{
    //
    private $karirRepoGlobal;

    public function __construct(KarirRepo $karirRepoObj)
    {
        $this->karirRepoGlobal = $karirRepoObj;
    }

    // base function ===================

    public function index(Request $request)
    {
        // $keterangans=$this->syaratRepoGlobal->get_syarat_by_type();
        // dd($keterangans);

        return view('admin.karir',[
            'karirs'=>$this->karirRepoGlobal->all(),
        ]);
    }
    
    //CRUD
    public function create(){
    }

    //method post
    public function store(Request $request){
        // dd($request);
        $this->validate($request, [
            'divisi' => 'required',
            'job' => 'required',
            'message' => 'required',
        ]);

        $array=array(
            'karir_divisi'=>$request->divisi,
            'karir_job'=>$request->job,
            'karir_text'=>$request->message,
        );

        try {
            //code...
            DB::beginTransaction();
            $this->karirRepoGlobal->create($array);
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
        // dd('show edit',$id);
        return view('admin.editkarir',[
            'karirs'=>$this->karirRepoGlobal->get_by_id($id),
        ]);
    }

    //method put
    public function update($id, Request $request){
        // dd($request->all(),$id);

        $this->validate($request, [
            'divisi' => 'required',
            'job' => 'required',
            'messageUp' => 'required'
        ]);

        $array=array(
            'karir_divisi'=>$request->divisi,
            'karir_job'=>$request->job,
            'karir_text'=>$request->messageUp
        );

        try {
            //code...
            DB::beginTransaction();
            $this->karirRepoGlobal->update($array,$id);
            DB::commit();

            // return back()
            // ->with('success','Update successfully.');
            // ->with('message','Sukses');
            return view('admin.karir',[
                'karirs'=>$this->karirRepoGlobal->all(),
            ]);

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
