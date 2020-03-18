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
  //   	$request->validate([
		//     'category' => 'required',
		//     'post' => 'required',
		// ]);
    	$category = (Object)$request->category;
		$postData = (Object)$request->post;
        $post = new Post([
	        'title' => $postData->title,
	        'body' => $postData->body,
	        'category_id' =>$category->id,
        ]);

        $post->save();

        return response()->json('success');
    }
    public function index()
    {
        return new PostCollection(Post::with('category')->get());
    }

    public function edit($id)
    {
    	$post = Post::find($id);
  		return response()->json($post);
    }

    public function categories()
    {
    	return new CategoryCollection(Category::all());
    }

    public function update($id, Request $request)
    {
		$post = Post::find($id);
		$category = (Object)$request->category;
		$postData = (Object)$request->post;
		$post->title=$postData->title;
		$post->body=$postData->body;
		$post->category_id=$category->id;
		$result=$post->save();
		return response()->json('successfully updated');
    }

    public function delete($id)
    {
		$post = Post::find($id);

		$post->delete();

		return response()->json('successfully deleted');
    }
}
