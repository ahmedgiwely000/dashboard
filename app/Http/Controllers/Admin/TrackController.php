<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Track;
use App\Course;

class TrackController extends Controller
{

    public function index()
    {
        $tracks = Track::orderBy('id' , 'desc')->paginate(20);
        return view('admin.tracks.index', compact('tracks'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        // $tracks = Track::create([
        //     'name'=>$request->name,
        // ]);
        // return redirect('/admin/tracks');

        $rules = [
            'name' =>  'required|min:3|max:50',
        ];
        $this->validate($request ,$rules);

        if(Track::create($request->all())){
            return redirect('/admin/tracks')->withStatus('tracks successfully created');
        }else{
            return redirect('/admin/tracks')->withStatus('something wrong to created');
        };
    }

    public function edit($id)
    {
        $tracks = Track::find($id);
        return view('admin.tracks.edit',compact('tracks'));
    }


    public function update(Request $request, Track $track)
    {
        // $tracks = Track::find($id);
        //     $tracks->name =$request->inputname;

        //     $tracks->save();
        //     return redirect('/admin/tracks');

        $rules = [
            'name' =>  'required|min:3|max:50',
        ];
        $this->validate($request ,$rules);

        if($request->has('name')){
            $track->name =$request->name;
        }
        if($track->isDirty()){
            $track->save();
            return redirect('/admin/tracks')->withStatus('tracks successfully updated');
        }else{
            return redirect('/admin/tracks/'.$track->id.'/edit')->withStatus('nothing updated');
        }

    }

    public function show($id)
    {
        $track = Track::find($id);
        return view('admin.tracks.show',compact('track','id'));
    }

    public function destroy($id)
    {
        $track = Track::find($id);
        $track->delete();
        return redirect('/admin/tracks')->withStatus('tracks successfully deleted');
    }
}
