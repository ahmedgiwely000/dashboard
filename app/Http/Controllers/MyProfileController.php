<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;

class MyprofileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $tracks = $user->tracks;
        return view('profile',compact('user','tracks'));
    }


    public function update(Request $request)
    {
        $user = auth()->user();

        if($image = $request->file('image')){
            $photoable_type = 'App\User';
            $photoable_id = $user->id;
                // $fileName =$image->getClientOriginalName();
                // $fileExtension = $image->getClientOriginalExtension();
                // $file_to_store = time() . '_' . explode('.', $fileName)[0] . '.' . $fileExtension;
            $file_to_store = time(). '_' .$user->name. '_' . '.' .$image->getClientOriginalExtension();

            //لو اليوزر عنده صوره
            if($user->photo){

                  if($user->photo->delete()){
                  if($user->photo()->create(['filename'=> $file_to_store ,
                                           'photoable_type' =>$photoable_type ,
                                             'photoable_id' => $photoable_id ])
                   ){
                   $image->move(public_path('images'), $file_to_store);
                  }

            }

            }else{
                if($user->photo()->create(['filename'=> $file_to_store ,
                                           'photoable_type' =>$photoable_type ,
                                             'photoable_id' => $photoable_id ])
                   ){
                   $image->move(public_path('images'), $file_to_store);
                  }
            }




            return response()->json([
                'message' => 'Your Profile images successfully uploaded',
                'uploaded_image' => '<img src="/images/'.$file_to_store.'" class="img-fluid img-thumbnail">',
            ]);
        }else{

            $rules=[
                'name' =>'required', 'min:3',
                'email' => 'required','integer' ,'email',
                'password' => 'nullable' , 'confirmed', 'min:6',
            ];

            $this->validate($request , $rules);

            $password = password_hash($request->password , PASSWORD_DEFAULT);
            if($request->password == null){
                if ($user->update(['name'=>$request->name ,
                               'email'=>$request->email,])){
                                //    return redirect('/profile')->withStatus('Profile Updated Successfully');
                                return response()->json([
                                    'message' => 'Your Profile info successfully updated',
                                ]);
                               }
            }else{
                if ($user->update(['name'=>$request->name ,
                               'email'=>$request->email,
                               'password'=>$password])){
                                //    return redirect('/profile')->withStatus('Profile Updated Successfully');
                                return response()->json([
                                    'message' => 'Your Profile info successfully updated',

                                ]);
                               }
            }

             }
            }
}
