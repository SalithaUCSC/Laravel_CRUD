<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Storage;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(5);
        return view('index',['users' => $users])->withTitle('Users in Database');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create')->withTitle('Create a user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate inputs
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'user_image' => 'image|nullable|max:1999'
        ]);
                // file upload
        if($request->hasFile('user_image')){
            $fileNameWithExt = $request->file('user_image')->getClientOriginalName();
            // get file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get extension
            $extension = $request->file('user_image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload
            $path = $request->file('user_image')->storeAs('public/user_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }
        // create user
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_image = $fileNameToStore;
        $user->save();
        // redirect to the create page with success message
        return redirect('/crud/create')->with('success', 'User created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);   
        return view('show')->with('user',$user)->withTitle('User Details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);   
        return view('edit')->with('user',$user)->withTitle('Edit User');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'user_image' => 'image|nullable|max:1999'
        ]);
                // file upload
        if($request->hasFile('user_image')){
            $fileNameWithExt = $request->file('user_image')->getClientOriginalName();
            // get file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get extension
            $extension = $request->file('user_image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload
            $path = $request->file('user_image')->storeAs('public/user_images', $fileNameToStore);
        }
        $user = User::find($id);    
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($request->hasFile('user_image')){
            $user->user_image = $fileNameToStore;
        }

        $user->save();
        // redirect to the create page with success message
        return redirect('/crud')->with('success', 'User updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id); 
        if($user->user_image != 'noimage.jpg'){
            Storage::delete('public/user_images/'.$user->user_image);
        }  
        $user->delete();
        
        return redirect('/crud')->with('success', 'User Deleted');
    }
}
