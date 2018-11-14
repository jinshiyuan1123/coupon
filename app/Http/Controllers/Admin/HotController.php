<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hot;
class HotController extends Controller
{
    public function index(Request $request)
    {
        $data = Hot::findOrFail(1);
        return view('admin.Hot.index', compact('data'));
    }
	 public function save(Request $request)
    {
		$title=$request->title;
		$subtitle=$request->subtitle;
		$content=$request->content;
		$data = Hot::findOrFail(1);
       if($title<>'' && $subtitle<>'' && $content<>''){
       $mod = Hot::findOrFail(1);
       $mod->update([
            'title' => $title,
			'subtitle'=>$subtitle,
			'content'=>$content
        ]);
		return responseWrong('修改成功'); 
	   }else{
		  return responseWrong('参数不能为空！'); 
	   }
	}




}
