<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    private $columns =['posttitle', 'description', 'published','author'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = post::get();
        return view('posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addpost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // $post = new post();
        //$post->posttitle = $request->posttitle;
        //$post->description = $request->description;
        //if(isset($request->published)){
        // $post->published= 1 ;
       // }else{
        // $post->published= 0;
        //}
       // $post->author=$request->author;
        //$post->save();
        $data=$request->validate([
            'posttitle'=>'required|string|max:50',
            'description'=> 'required|string',
            'author'=>'required|string|max:50'
            ]);
           $data['published']= isset($request->published);
           post::create($data);
           return redirect('posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = post::findOrFail($id);
        return view('showpost', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = post::findOrFail($id);
        return view('updatepost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->only($this->columns);
        $data['published']= isset($request->published);
        post::where('id', $id)->update($data);
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        post::where('id', $id)->delete();
        return redirect('posts');
    }
    public function trashed()
    {
        $posts = post::onlyTrashed()->get();
        return view('trashedpost', compact('posts'));
    }
    public function restore(string $id)
    {
        post::where('id', $id)->restore();
        return redirect('posts');
    }
    public function forceDelete(string $id)
    {
        post::where('id', $id)->forceDelete();
        return redirect('posts');
    }

}
