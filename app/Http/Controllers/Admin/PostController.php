<?php

namespace App\Http\Controllers\Admin;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    protected function slug($title = ""){
        $tmp = Str::slug($title);
        $count = 1;
        while(Post::where("slug",$tmp)->first()){
            $tmp = Str::slug($title)."-".$count;
            $count++;

        }

        return $tmp;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.posts.create');

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
        $request->validate([
            "title"=>"required|string|max:80|unique:posts",
            "content"=>"required|string|max:255"
        ]);

        $data=$request->all();
        $data['slug']=$this->slug($data['title']);
        $newPost= new Post();   
        $newPost->fill($data);     
        $newPost->save();                   
        return redirect()->route('admin.posts.index');   
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('admin.posts.edit', compact('post'));  
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
        //
        $request->validate([
            "title"=>"required|string|max:100|",
            "slug"=>"required|string",
            "content"=>"required|string|",
            "img"=>"string|max:255|url",
        ]);
       $data = $request->all();

       $post->update($data);

       return redirect()->route('admin.posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        
        return redirect()->route('admin.posts.index');
    }
}
