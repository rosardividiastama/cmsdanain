<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\KeteranganRepo;
use App\Repositories\TeamRepo;
use App\Repositories\StatRepo;

use DB;

class TentangKamiController extends Controller
{
    //
    private $keteranganRepoGlobal;
    private $teamRepoGlobal;
    private $statRepoGlobal;


    public function __construct(KeteranganRepo $keteranganRepoObj,TeamRepo $teamRepoObj,StatRepo $statRepoObj)
    {
        $this->keteranganRepoGlobal = $keteranganRepoObj;
        $this->teamRepoGlobal = $teamRepoObj;
        $this->statRepoGlobal = $statRepoObj;

    }

    public function index(Request $request)
    {
        // $keterangans=$this->syaratRepoGlobal->get_syarat_by_type();
        // dd($keterangans);

        return view('admin.tentangkami',[
            'keterangans'=>$this->keteranganRepoGlobal->get_keterangan_by_deskripsi(),
            'teams'=>$this->teamRepoGlobal->all(),
            'stats'=>$this->statRepoGlobal->all(),
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

    public function input_deskripsi(Request $request){
        $this->validate($request, [
    		'tambahKeterangan' => 'required'
        ]);
        $array=array(
            'keterangan_text'=>$request->tambahKeterangan,
            'keterangan_type'=>2,
        );

        try {
            //code...
            DB::beginTransaction();
            $this->keteranganRepoGlobal->create($array);
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

    public function update_deskripsi(Request $request){
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
            $this->keteranganRepoGlobal->update($array,$id);
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

    public function upload_team(Request $request){
        $this->validate($request, [
            'pekerjaan' => 'required',
    		'nama' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file= time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/team'), $file);

        $array=array(
            'team_nama'=>$request->nama,
            'team_jabatan'=>$request->pekerjaan,
            'team_file'=>$file,
        );

        try {
            //code...
            DB::beginTransaction();
            $this->teamRepoGlobal->create($array);
            DB::commit();

            return back()
            ->with('success','Image Uploaded successfully.');
            // ->with('message','Sukses');

        } catch (\Exception $th) {
            throw $th;
            DB::rollback();
            return back()
            ->with('error',$th);
        }
    }

    public function update_team(Request $request){
        // dd($request);
        $this->validate($request, [
            'pekerjaan' => 'required',
    		'nama' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id=$request->idTeam;

        if (empty($request->image)) {
            // dd('image kosong');
            $array=array(
                'team_nama'=>$request->nama,
                'team_jabatan'=>$request->pekerjaan,
            );
        } else {
            // dd('image ada');
            $file= time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/team'), $file);

            $array=array(
                'team_nama'=>$request->nama,
                'team_jabatan'=>$request->pekerjaan,
                'team_file'=>$file,
            );
        }

        try {
            //code...
            DB::beginTransaction();
            $this->teamRepoGlobal->update($array,$id);
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

    public function update_stat(Request $request){
        // dd('$request');
        $this->validate($request, [
            'tkb' => 'required|numeric',
            'totpinjaman' => 'required|numeric',
            'totoutstand' => 'required|numeric',
            'jumborrow' => 'required|numeric',
            'jumborrowaktif' => 'required|numeric',
            'pinjterrendah' => 'required|numeric',
            'pinjtertinggi' => 'required|numeric'
        ]);

        $array=array(
            'statistik_tkb'=>$request->tkb,
            'stat_tot_pinjaman'=>$request->totpinjaman,
            'stat_tot_outstanding'=>$request->totoutstand,
            'stat_jml_borrower'=>$request->jumborrow,
            'stat_jml_borrower_aktif'=>$request->jumborrowaktif,
            'stat_nilai_pinj_terendah'=>$request->pinjterrendah,
            'stat_nilai_pinj_tertinggi'=>$request->pinjtertinggi
        );

        $id = $request->idStat;

        try {
            //code...
            DB::beginTransaction();
            $this->statRepoGlobal->update($array,$id);
            DB::commit();

            return back()
            ->with('success','Image Uploaded successfully.');
            // ->with('message','Sukses');

        } catch (\Exception $th) {
            throw $th;
            DB::rollback();
            return back()
            ->with('error',$th);
        }


    }
}
