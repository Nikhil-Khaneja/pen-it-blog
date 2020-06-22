@extends('layouts.blog.layout')

@section('title','Pen-It | Heaven for bloggers!')
    
@section('header')
<header class="pt100 pb100 parallax-window-2" data-parallax="scroll" data-speed="0.5" data-image-src="{{asset('assets/img/bg/img-bg-17.jpg')}}" data-positiony="1000">
    <div class="intro-body text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pt50">
                    <h1 class="brand-heading font-montserrat text-uppercase color-light" data-in-effect="fadeInDown">
                        Pen-It
                        <small class="color-light alpha7">Heaven for Bloggers!</small>
                    </h1>
                </div>
            </div>
        </div>

    </div>
</header>

@endsection

@section('main-content')
<div class="row">
    @foreach ($posts as $post)
        <div class="col-md-4 col-sm-6 col-xs-12 mb50">
        <h4 class="blog-title"><a href="#">{{$post->title}}</a></h4>
            <div class="blog-three-attrib">
                <span class="icon-calendar"> </span> {{ $post->published_at->diffForHumans() }} |
            <span class=" icon-pencil"></span> <a href="#">{{ $post->author->name}}</a>
            </div>
            <img src="{{ asset('storage/'.$post->image) }}" class="img-responsive" alt="image blog">
            <p class="mt25">
               {{$post->excerpt}}
            </p>
        <a href="{{route('blog.show',$post->id)}}" class="button button-gray button-xs" >Read More <i class="fa fa-long-arrow-right"></i></a>
        </div>
    @endforeach
  
    <div class="col-md-4 col-sm-6 col-xs-12 mb50">
        <h4 class="blog-title"><a href="#">Amazing Blog Post Three</a></h4>
        <div class="blog-three-attrib">
            <span class="icon-calendar"></span>Dec 15 2019 |
            <span class=" icon-pencil"></span><a href="#">John Doe</a>
        </div>
        <img src="{{asset('assets/img/blog/img-blog-4.jpg')}}" class="img-responsive" alt="image blog">
        <p class="mt25">
            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
            consequuntur magni dolores eos.
        </p>
        <a href="#" class="button button-gray button-xs">Read More <i
                class="fa fa-long-arrow-right"></i></a>

    </div>

    <div class="col-md-4 col-sm-6 col-xs-12 mb50">
        <h4 class="blog-title"><a href="#">Amazing Blog Post One</a></h4>
        <div class="blog-three-attrib">
            <span class="icon-calendar"></span>Dec 15 2019 |
            <span class=" icon-pencil"></span><a href="#">John Doe</a>
        </div>
        <img src="{{asset('assets/img/blog/img-blog-1.jpg')}}" class="img-responsive" alt="image blog">
        <p class="mt25">
            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
            consequuntur magni dolores eos.
        </p>
        <a href="#" class="button button-gray button-xs">Read More <i
                class="fa fa-long-arrow-right"></i></a>

    </div>

    <div class="col-md-4 col-sm-6 col-xs-12 mb50">
        <h4 class="blog-title"><a href="#">Amazing Blog Post Two</a></h4>
        <div class="blog-three-attrib">
            <span class="icon-calendar"></span>Dec 15 2019 |
            <span class=" icon-pencil"></span><a href="#">John Doe</a>
        </div>
        <img src="{{asset('assets/img/blog/img-blog-2.jpg')}}" class="img-responsive" alt="image blog">
        <p class="mt25">
            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
            consequuntur magni dolores eos.
        </p>
        <a href="#" class="button button-gray button-xs">Read More <i
                class="fa fa-long-arrow-right"></i></a>

    </div>

    <div class="col-md-4 col-sm-6 col-xs-12 mb50">
        <h4 class="blog-title"><a href="#">Amazing Blog Post Three</a></h4>
        <div class="blog-three-attrib">
            <span class="icon-calendar"></span>Dec 15 2019 |
            <span class=" icon-pencil"></span><a href="#">John Doe</a>
        </div>
        <img src="{{asset('assets/img/blog/img-blog-3.jpg')}}" class="img-responsive" alt="image blog">
        <p class="mt25">
            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
            consequuntur magni dolores eos.
        </p>
        <a href="#" class="button button-gray button-xs">Read More <i
                class="fa fa-long-arrow-right"></i></a>

    </div>
</div>

<!-- Blog Paging
===================================== -->
{{-- yeh apne ko resources/views/vendor/pagination se laa rha hai isko aisa edit maarne ke liye humne command chalaya php artisan vendor:publish isse humko manually edit karne mila --}}
{{ $posts->links() }}

@endsection