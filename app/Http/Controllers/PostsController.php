<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Session;

use App\Category;

use App\Post;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();

        if($categories->count()==0){

           Session::flash('info','To create a post, at least one category must be found');

           return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[

             'title'=>'required|max:225',

             'featured'=>'required|image',

             'content'=>'required',

             'category_id'=>'required'
        ]);

        $featured= $request->featured;

        $featured_new_name=time().$featured->getClientOriginalName();

        $featured->move('uploads/posts',$featured_new_name);

        $post = Post::create([
          'title' => $request->title,

          'featured' => 'uploads/posts/'. $featured_new_name,

          'content' => $request->content,

          'category_id' => $request->category_id,

          'slug' =>  str_slug($request->title)//create somthing like (laravel framework 5.3) -> (laravel-framework-53)
                ]);

        Session::flash('success','Post created successfuly');

        return redirect()->back();
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
        $post= Post::find($id);

         return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all());
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
        $request->validate([

            'title'=>'required',

            'content'=>'required',

            'category_id'=>'required'
        ]);

        $post= Post::find($id);

        if($request->hasFile('featured')){

            $featured=$request->featured;

            $featured_new_name= time(). $featured->getClientOriginalName();

            $featured->move('uploads/posts/', $featured_new_name);

            $post->featured= 'uploads/posts/'. $featured_new_name;
            
        }

        $post->title= $request->title;

        $post->content= $request->content;

        $post->category_id= $request->category_id;

        $post->save();

        Session::flash('success','Post has been updated successfuly');

        return redirect()->route('post');
    }

    public function restore($id){

        $post= Post::withTrashed()->where('id',$id)->first();

        $post->restore();

        Session::flash('success', 'Post restored successfuly');

        return redirect()->route('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post= Post::find($id);

        $post->delete();

        Session::flash('success', 'The post has been deleted successfuly');

        return redirect()->back();
    }

    public function trashed(){

        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts',$posts);
    }

    public function kill($id){
        
        $post = Post::withTrashed()->where('id',$id)->first();
        
        $post->forceDelete();

        Session::flash('success','post has been deleted permanently');

        return redirect()->back();
    }
}
