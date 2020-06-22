<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view('blog.index',[
            'tags' => Tag::all(),
            'posts' => Post::simplePaginate(1),
            'categories'=> Category::all()
         ]);
    }

    public function show(Post $post){
        $categories = Category::all();
        $tags = Tag::all();
        // dd($post);
        return view('blog.post', compact([
            'post',
            'categories',
            'tags' 
        ]));
    }
    public function category(Category $category){
        return view('blog.index', [
            'tags' => Tag::all(),
            'posts' => $category->posts()->simplePaginate(1),
            'categories'=> Category::all()
        ]);

    }
    public function tag(Tag $tag){
        return view('blog.index', [
            'tags' => Tag::all(),
            'posts' => $tag->posts()->simplePaginate(1),
            'categories'=> Category::all()
        ]);

    }
}
