<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{

    public function index()
    {
        $videos = Video::orderBy('id','desc')->paginate(20);
        return view('admin.videos.index',compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $rules =[
            'title' =>'required|min:3|max:50',
            'course_id' =>'required|integer',
            'link' =>'required|url',
        ];

        $this->validate($request, $rules);
        if($video = Video::create($request->all())){
            return redirect('/admin/videos')->withStatus('videos successfully created');
        }else{
            return redirect('/admin/videos')->withStatus('something wrong to created');
        }
    }

    public function show($id)
    {
        $video =Video::find($id);
        return view('admin.videos.show',compact('video','id'));
    }

    public function edit($id)
    {
        $video = Video::find($id);
        return view('admin.videos.edit',compact('video'));
    }

    public function update(Request $request,Video $video)
    {
        $rules =[
            'title' =>'required|min:3|max:50',
            'course_id' =>'required|integer',
            'link' =>'required|url',
        ];

        $this->validate($request, $rules);

        // if($video->update($request->all())){
        //     return redirect('/admin/videos')->withStatus('video successfully updated');
        // }else{
        //     return redirect('/admin/videos/'.$video->id.'/edit')->withStatus('nothing updated');
        // }

        if($request->has('title','course_id','link')){
            $video->title =$request->title;
            $video->link =$request->link;
            $video->course_id =$request->course_id;
        }
        if($video->isDirty()){
            $video->save();
            return redirect('/admin/videos')->withStatus('video successfully updated');
        }else{
            return redirect('/admin/videos/'.$video->id.'/edit')->withStatus('nothing updated');
        }
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect('/admin/videos')->withStatus('video successfully deleted');
    }
}
