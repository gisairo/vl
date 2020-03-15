<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostCollection;
use App\Http\Resources\CategoryCollection;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = new Post([
        'title' => $request->get('title'),
        'body' => $request->get('body')
        ]);

        $post->save();

        return response()->json('success');
    }
    public function index()
    {
        // return new PostCollection(Post::all());
        return new PostCollection(Post::with('category')->get());
        // return Category::with('posts')->get();
    }

    public function edit($id)
    {
    	$post = Post::find($id);
  		// $post = Post::with('category')->find($id);
  		// $data = ['post'=>$post, 'categories'=>Category::all()];
  		return response()->json($post);
    }

    public function categories()
    {
    	return new CategoryCollection(Category::all());
    }

    public function update($id, Request $request)
    {
		$post = Post::find($id);
		dd($request->all());

		$post->update($request->all());

		return response()->json('successfully updated');
    }

    public function delete($id)
    {
		$post = Post::find($id);

		$post->delete();

		return response()->json('successfully deleted');
    }
}
