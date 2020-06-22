<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Photo;
use App\Course;
use App\Track;

class CourseController extends Controller
{

    public function index()
    {
        $courses =Course::orderBy('id','desc')->paginate(15);
        return view('admin.courses.index',compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' =>  'required|min:3|max:500',
            'description' => 'required|min:5|max:500',
            'status' =>  'required|integer|in:0,1',
            'link' =>  'required|url',
            'track_id' =>  'required|integer',
        ];
        $this->validate($request ,$rules);

        $request['slug'] = strtolower(str_replace(' ' ,'-',$request->title));

        if($course = Course::create($request->all())){
            if($file = $request->file('img')){

                $fileName =$file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $fileToStore = time() . '_' . explode('.', $fileName)[0] . '.' . $fileExtension;

                if($file->move('images',$fileToStore)){
                    Photo::create([
                        'filename' => $fileToStore,
                        'photoable_id' => $course->id,
                        'photoable_type' => 'App\Course',
                    ]);
                }
            }
            return redirect('/admin/courses')->withStatus('courses successfully created');
        }else{
            return redirect('/admin/courses')->withStatus('something wrong to created');
        };
    }

    public function show($id)
    {
        $course =Course::find($id);
        return view('admin.courses.show',compact('course','id'));
    }

    public function edit($id)
    {   $tracks = Track::all();
        $course = Course::find($id);
        return view('admin.courses.edit' ,compact('course','tracks'));
    }

    public function update(Request $request,Course $course)
    {
        $rules = [
            'title' =>  'required|min:3|max:500',
            'status' =>  'required|integer|in:0,1',
            'link' =>  'required|url',
            'track_id' =>  'required|integer',
        ];
        $this->validate($request ,$rules);

        $course->update($request->all());

            if($file = $request->file('img')){

                $fileName =$file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $fileToStore = time() . '_' . explode('.', $fileName)[0] . '.' . $fileExtension;

                if($file->move('images',$fileToStore)){
                    if($course->photo){
                        $photo = $course->photo;

                        $filename = $photo->filename;
                        unlink('images/'.$filename);

                        $photo ->filename = $fileToStore;
                        $photo->save();
                    }else{
                        Photo::create([
                            'filename' => $fileToStore,
                            'photoable_id' => $course->id,
                            'photoable_type' => 'App\Course',
                        ]);
                    }

                }
            }
            return redirect('/admin/courses')->withStatus('courses successfully updated');
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        if($course->photo){
           $filename = $course->photo->filename;
           unlink('images/'.$filename);
        }
        $course->photo->delete();
        $course->delete();
        return redirect('/admin/courses')->withStatus('tracks successfully deleted');
    }
}
