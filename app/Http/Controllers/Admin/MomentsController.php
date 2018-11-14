<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Models\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Moments;
use App\Models\Momentsclass;
use App\Models\Member;
use DB;
class MomentsController extends AdminBaseController
{
    public function index(Request $request)
    {
        $mod = new Moments();

        $start_at = $mentsclassID = $end_at = '';
        if ($request->has('mentsclassID'))
        {
            $mentsclassID = $request->get('mentsclassID');
            $mod = $mod->where('cnameid', $mentsclassID);
        }		
        if ($request->has('start_at'))
        {
            $start_at = $request->get('start_at');
            $mod = $mod->where('created_at', '>=', $start_at);
        }
        if ($request->has('end_at'))
        {
            $end_at = $request->get('end_at');
            $mod = $mod->where('created_at', '<=',$end_at);
        }

        $data = $mod->Where('statu',1)->orderBy('created_at', 'desc')->paginate(config('admin.page-size'));
      foreach($data as $v){
		  $membername=Member::findOrFail($v->uid);
		  $v->member_name=$membername['name'];	
          $Momentsclass=Momentsclass::findOrFail($v->cnameid);	
          $v->Momentsclass=$Momentsclass['cname'];		  
	  }  
	  $dataMomentsclass=Momentsclass::get();
        return view('admin.moments.index', compact('data','start_at', 'end_at','dataMomentsclass','mentsclassID'));
    }

    public function create()
    {
       // $api_list = Moments::pluck('api_name', 'id');

        return view('admin.activity.create', compact('api_list'));
    }

    public function store(Request $request)
    {
        $validator = $this->verify($request, 'activity.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = $request->all();

        try{
            DB::transaction(function() use($data) {

                $mod = Activity::create($data);

                if (isset($data['api']) && !empty($data['api']))
                    $mod->apis()->sync($data['api']);
            });
        }catch(Exception $e){
            DB::rollback();
            return responseWrong('创建失败');
        }



        return responseSuccess('', '', route('activity.index'));

    }

    public function edit($id)
    {
        $data = Activity::findOrFail($id);

        $api_list = Api::pluck('api_name', 'id');

        return view('admin.activity.edit', compact('data', 'api_list'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->verify($request, 'activity.store');

        if ($validator->fails())
        {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }
        $data = $request->all();
        $mod = Moments::findOrFail($id);
        try{
            DB::transaction(function() use($data, $mod) {

                $mod->update($data);

                if (isset($data['api']) && !empty($data['api']))
                    $mod->apis()->sync($data['api']);
            });
        }catch(Exception $e){
            DB::rollback();
            return responseWrong('创建失败');
        }





        return responseSuccess('', '', route('activity.index'));

    }

    public function destroy($id)
    {
        Moments::destroy($id);

        return respS();
    }

    public function check($id, $status)
    {
        $mod = Moments::findOrFail($id);

        $mod->update([
            'on_line' => $status
        ]);

        return respS();
    }
}
