<?php

namespace App\Http\Middleware;

use Closure;
use App\Post;
class ValidateAuthorForEditAndDeletePost
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
        if(is_object($request->post)){
            if(!($request->post->user_id == auth()->id())){
                return redirect(abort(401));
            }
        }
        elseif(is_numeric($request->post)){
            if(!(( Post::onlyTrashed()->findOrFail($request->post))->user_id == auth()->id())){
                return redirect(abort(401));
            }
        }
        return $next($request);
    }
}
