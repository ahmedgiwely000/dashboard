<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyprofileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        return view('profile',compact('user'));
    }


    public function update_image(Request $request)
    {
        $user = auth()->user();
        $photoable_type = 'App\User';
        $photoable_id = $user->id;

        if($image = $request->file('image')){
                // $fileName =$image->getClientOriginalName();
                // $fileExtension = $image->getClientOriginalExtension();
                // $fileToStore = time() . '_' . explode('.', $fileName)[0] . '.' . $fileExtension;
            $file_to_store = time(). '_' .$user->name. '_' . '.' .$image->getClientOriginalExtension();

            if( $user->photo()->delete() ){

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
        }
    }
}
