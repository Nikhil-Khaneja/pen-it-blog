<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;

class verifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Category::count() === 0){
            session()->flash('error','minimum one category must exist to create post!');
            return redirect(route('categories.create'));
        }
        return $next($request);
    }//next is to register the middleware in kernal
}
