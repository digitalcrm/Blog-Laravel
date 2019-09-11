<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\user\category;
use App\Model\user\post;
use App\Model\user\tag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=post::all();
        return view('admin.post.show',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')){
            $tags = tag::all();
            $categories = category::all();
             return view('admin.post.post',compact('tags','categories'));
        }
        // paste here web.php return 
        return redirect(route('admin.home'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
            'image'=>'required',
        ]);

         if ($request->hasFile('image'))
        {
            $imageName = $request->image->store('public');
        }

        $post = new post;
        $post->title= $request->title;
        $post->image = $imageName;
        $post->subtitle= $request->subtitle;
        $post->slug= $request->slug;
        $post->body= $request->body;
        $post->status= $request->status;
        $post->save();
        //below two line are afer save
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // we have create new file for edit either you can create or not create the file 2 options
        if (Auth::user()->can('posts.update')){
            $post = post::with('tags','categories')->where('id',$id)->first(); //you can use get() instead of first()
            $tags = tag::all();
            $categories = category::all();
            return view('admin.post.edit',compact('tags','categories','post'));
        //return view('admin.post.edit',compact('post'));
        }
        return redirect(route('admin.home'));
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
        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
            'image'=>'required',
        ]);

        if ($request->hasFile('image'))
        {
            $imageName = $request->image->store('public');
        }

        $post = post::find($id);
        $post->image = $imageName;
        $post->title= $request->title;
        $post->subtitle= $request->subtitle;
        $post->slug= $request->slug;
        $post->body= $request->body;
        $post->status= $request->status;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        post::where('id',$id)->delete();
        return redirect()->back();
    }
}
