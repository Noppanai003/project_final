<?php

namespace App\Http\Controllers;
use App\Category;
use App\Tag;
use App\Post;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $search=request()->query('search');
        //กระบวนการค้นหา
        if($search){
            $posts=Post::where('title','LIKE',"%{$search}%")->paginate(2);
        }else{
            $posts=Post::paginate(4);
        }
        return view('welcome')
        ->with('categories',Category::all())
        ->with('posts',$posts);
      
    }
}
