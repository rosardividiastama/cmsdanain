<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BannerRepo;
use App\Repositories\BackgroundRepo;
use App\Repositories\StatRepo;
use App\Repositories\VideoRepo;
use App\Repositories\TestiRepo;

use App\Constant\typeImage;

use DB;

class HomeController extends Controller
{
    //
    private $bannerRepoGlobal;
    private $backgroundRepoGlobal;
    private $statRepoGlobal;
    private $videoRepoGlobal;
    private $testiRepoGlobal;


    public function __construct(BannerRepo $bannerRepoObj, BackgroundRepo $backgroundRepoObj, StatRepo $statRepoObj, VideoRepo $videoRepoObj, TestiRepo $testiRepoObj)
    {
        $this->bannerRepoGlobal = $bannerRepoObj;
        $this->backgroundRepoGlobal = $backgroundRepoObj;
        $this->statRepoGlobal = $statRepoObj;
        $this->videoRepoGlobal = $videoRepoObj;
        $this->testiRepoGlobal = $testiRepoObj;
    }

    public function index(){
        // $banners = $this->bannerRepoGlobal->all();
        // $backgrounds = $this->backgroundRepoGlobal->all();
        // $videos = $this->videoRepoGlobal->all();
        // $statistiks = $this->statRepoGlobal->all();
        // $testimonies = $this->testiRepoGlobal->all();
        // dd($backgrounds);

		return view('admin.home',[
            'banners'=>$this->bannerRepoGlobal->all(),
            'backgrounds'=>$this->backgroundRepoGlobal->all(),
            'videos'=>$this->videoRepoGlobal->all(),
            'statistiks'=>$this->statRepoGlobal->all(),
            'testimonies'=>$this->testiRepoGlobal->all()
        ]);
    }
    
    /* ========= METHOD CRUD BANNER ========= */

    public function upload_banner(Request $request){
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file= time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/banner'), $file);

        $array=array(
            'banner_title'=>$request->title,
            'banner_status'=>'off',
            'banner_type'=>typeImage::HomeBanner,
            'banner_file'=>$file,
        );

        try {
            //code...
            DB::beginTransaction();
            $this->bannerRepoGlobal->create($array);
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

    public function destroy_banner($id){
        // dd('remove',$id);
        $data=$this->bannerRepoGlobal->find($id);
        if (empty($data)) {
            return back()
                ->with('Error','Data not found');
        } else {
            try {
                //code...
                DB::beginTransaction();
                $this->bannerRepoGlobal->delete($id);
                DB::commit();
    
                return back()
                ->with('success','Delete Image successfully.');
                // ->with('message','Sukses');
    
            } catch (\Exception $th) {
                throw $th;
                DB::rollback();
                return back()
                ->with('error',$th);
            }
        }
    }

    public function aktif_banner($id){
        // dd('aktif',$id);
        $data=$this->bannerRepoGlobal->find($id);
        // dd($id,$data);
        if ($data->banner_status=='on') {
            $array=array(
                'banner_status'=>'off',
            );

            try {
                //code...
                DB::beginTransaction();
                $this->bannerRepoGlobal->update($array,$id);
                DB::commit();
    
                return back()
                ->with('success','Image Nonactive successfully.');
                // ->with('message','Sukses');
    
            } catch (\Exception $th) {
                throw $th;
                DB::rollback();
                return back()
                ->with('error',$th);
            }

        } elseif ($data->banner_status=='off') {
            $array=array(
                'banner_status'=>'on',
            );

            try {
                //code...
                DB::beginTransaction();
                $this->bannerRepoGlobal->update($array,$id);
                DB::commit();
    
                return back()
                ->with('success','Image Active successfully.');
                // ->with('message','Sukses');
    
            } catch (\Exception $th) {
                throw $th;
                DB::rollback();
                return back()
                ->with('error',$th);
            }
        }
        
    }

    /* ========= METHOD CRUD STATISTIK ========= */

    public function upload_stk_bg(Request $request){
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file= time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/background'), $file);

        $array=array(
            'background_title'=>$request->title,
            'background_status'=>'off',
            'background_type'=>typeImage::StatistikBackground,
            'background_file'=>$file,
        );

        try {
            //code...
            DB::beginTransaction();
            $this->backgroundRepoGlobal->create($array);
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

    public function destroy_stk_bg($id){
        // dd('remove',$id);
        $datas=$this->backgroundRepoGlobal->find($id);
        if (empty($datas)) {
            return back()
                ->with('Error','Data not found');
        } else {
            try {
                //code...
                DB::beginTransaction();
                $this->backgroundRepoGlobal->delete($id);
                DB::commit();
    
                return back()
                ->with('success','Delete Image successfully.');
                // ->with('message','Sukses');
    
            } catch (\Exception $th) {
                throw $th;
                DB::rollback();
                return back()
                ->with('error',$th);
            }
        }
    }

    public function aktif_stk_bg($id){
        // dd('background',$id);
        $datas=$this->backgroundRepoGlobal->find($id);
        // dd($id,$data);
        if ($datas->background_status=='on') {
            $array=array(
                'background_status'=>'off',
            );

            try {
                //code...
                DB::beginTransaction();
                $this->backgroundRepoGlobal->update($array,$id);
                DB::commit();
    
                return back()
                ->with('success','Background Nonactive successfully.');
                // ->with('message','Sukses');
    
            } catch (\Exception $th) {
                throw $th;
                DB::rollback();
                return back()
                ->with('error',$th);
            }

        } elseif ($datas->background_status=='off') {
            $array=array(
                'background_status'=>'on',
            );

            try {
                //code...
                DB::beginTransaction();
                $this->backgroundRepoGlobal->update($array,$id);
                DB::commit();
    
                return back()
                ->with('success','Background Active successfully.');
                // ->with('message','Sukses');
    
            } catch (\Exception $th) {
                throw $th;
                DB::rollback();
                return back()
                ->with('error',$th);
            }
        }
        
    }

    public function input_stat(Request $request){
        // dd($request);
    	$this->validate($request, [
    		'pendanaan' => 'required',
            'pinjaman' => 'required',
            'npl' =>'required',
            'tkb' =>'required',
        ]);

        $array=array(
            'statistik_pendanaan'=>$request->pendanaan,
            'statistik_pinjaman'=>$request->pinjaman,
            'statistik_tkb'=>$request->tkb,
            'statistik_npl'=>$request->npl,
        );

        try {
            //code...
            DB::beginTransaction();
            // $this->statRepoGlobal->create($array);
            $this->statRepoGlobal->update($array,'1');
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

    public function input_video_text(Request $request){
        // dd($request);
    	$this->validate($request, [
            'textDana' => 'required',
            'linkvideo' => 'required',
            'title' => 'required',
            'hashtag' => 'required'
        ]);

        $array=array(
            'video_link'=>$request->linkvideo,
            'video_text'=>$request->textDana,
            'video_hashtag'=>$request->hashtag,
            'video_title'=>$request->title,

        );

        try {
            //code...
            DB::beginTransaction();
            // $this->videoRepoGlobal->create($array);
            $this->videoRepoGlobal->update($array,'1');
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

    /* ========= METHOD CRUD TESTIMONI ========= */

    public function input_testi(Request $request){
        // dd('input testi' ,$request);
    	$this->validate($request, [
            'nama' => 'required',
            'pekerjaan' => 'required',
            'testimoni' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file= time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/testimoni'), $file);

        $array=array(
            'testimoni_nama'=>$request->nama,
            'testimoni_pekerjaan'=>$request->pekerjaan,
            'testimoni_testi'=>$request->testimoni,
            'testimoni_status'=>'off',
            'testimoni_foto'=>$file,
        );

        try {
            //code...
            DB::beginTransaction();
            $this->testiRepoGlobal->create($array);
            DB::commit();

            return back()
            ->with('success','Save successfully.');

        } catch (\Exception $th) {
            throw $th;
            DB::rollback();
            return back()
            ->with('error',$th);
        }
    }

    public function update_testi(Request $request){
        // dd($request);
    	$this->validate($request, [
            'idtes'=> 'required',
    		'nama' => 'required',
            'pekerjaan' => 'required',
            'testimoni' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $id=$request->idtes;

        if (empty($request->image)) {
            $array=array(
                'testimoni_nama'=>$request->nama,
                'testimoni_pekerjaan'=>$request->pekerjaan,
                'testimoni_testi'=>$request->testimoni,
            );
        } else {
            $file= time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/testimoni'), $file);
            $array=array(
                'testimoni_nama'=>$request->nama,
                'testimoni_pekerjaan'=>$request->pekerjaan,
                'testimoni_testi'=>$request->testimoni,
                'testimoni_foto'=>$file,
            );
        }

        try {
            //code...
            DB::beginTransaction();
            $this->testiRepoGlobal->update($array,$id);
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
