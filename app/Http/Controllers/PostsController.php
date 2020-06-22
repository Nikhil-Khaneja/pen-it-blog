<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;

use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['verifyCategoriesCount'])->only('create','store');
        $this->middleware(['validateAuthor'])->only('edit', 'update', 'destroy', 'trash');
    }
    public function index()
    {
        if(!auth()->user()->isAdmin()){
            $posts = Post::withoutTrashed()->where('user_id',auth()->id())->paginate(10);
        }
        else{
            $posts = Post::paginate(10);
        }
        return view('posts.index',compact([
            'posts'
        ]));
    }

    public function create()
    {
        $post = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create',compact([
            'categories',
            'tags',
            'post'
        ]));
    }

    public function store(CreatePostRequest $request)
    {
        //image uploading and storing
        $image = $request->file('image')->store('posts');
        //run command: php artisan storage:link
        //create post
        Post::create([
            'title'=>$request->title,
            'excerpt'=>$request->excerpt,
            'content'=>$request->content,
            'image'=>$image,
            'published_at'=>$request->published_at,
        ]);

        //session storage
        session()->flash('success','post created successfully');

        //redirefct
        return redirect(route('posts.index'));
        
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact([
            'post'
        ]));
    }
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
        
        $data = $request->only(['title','excerpt','content','published_at' ]);
        if($request->hasFile('image')){
            $image= $request->image->store('posts');
            $post->deleteImage();
            $data['image']= $image;
        }
        // update() is an built in function provided by laravel to update the data in db
        // dd($data);
        $post->update($data);

        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        session()->flash('success','Post UpdatedSuccessfully!');
        return redirect(route('posts.index'));
    }

    public function destroy($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->deleteImage();
        $post->forceDelete();
        session()->flash('success','Post deleted successfully');
        return redirect()->back();
    }

    public function trash(Post $post)
    {
        //dd($post);    
        $post->delete();
        session()->flash('success','post trashed successfully');
        return redirect(route('posts.index'));
    }

    public function trashed(){
        $trashed = Post::onlyTrashed()->paginate(10);
        return view('posts.trashed')->with('posts',$trashed);
        //with same as compact
        
    }

    public function restore($id){
        $trashedPost = Post::onlyTrashed()->findOrFail($id);
        $trashedPost->restore();
        session()->flash('success','Post restored successfully');
        return redirect(route('posts.index'));
    }
}
