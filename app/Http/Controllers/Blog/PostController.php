<?php

namespace App\Http\Controllers\Blog;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('blog.show')->with('post', $post);
    }

    public function category(Category $category){
        return view('blog.category')
        ->with('categories',Category::all())      
        ->with('category',$category)
        ->with('posts',$category->posts()->paginate(2));
}
}
