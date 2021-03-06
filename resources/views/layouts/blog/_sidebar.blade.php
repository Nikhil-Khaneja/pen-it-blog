<div id="sidebar" class=" animated" data-animation="fadeInRight" data-animation-delay="250">


    <!-- Search
    ===================================== -->
    <div class="pr25 pl25 clearfix">
        <form action="#">
            <div class="blog-sidebar-form-search">
                <input type="text" name="search" class="" placeholder="e.g. Javascript">
                <button type="submit" name="submit" class="pull-right"><i class="fa fa-search"></i></button>
            </div>
        </form>

    </div>


    <!-- Categories
    ===================================== -->
    <div class="mt25 pr25 pl25 clearfix">
        <h5 class="mt25">
            Categories
            <span class="heading-divider mt10"></span>
        </h5>
        <ul class="blog-sidebar pl25">
            @foreach ($categories as $category)
                <li class="active">
                <a href="{{route('blog.category',$category->id)}}">{{$category->name}}<span class="badge badge-pasific pull-right">{{$category->posts()->count()}}</span></a>
                </li>
                
            @endforeach
            <li><a href="#">Java<span class="badge badge-pasific pull-right">125</span></a></li>
            <li><a href="#">C#<span class="badge badge-pasific pull-right">350</span></a></li>
            <li><a href="#">Adv Java<span class="badge badge-pasific pull-right">7</span></a></li>
        </ul>

    </div>


    <!-- Tags
    ===================================== -->
    <div class="pr25 pl25 clearfix">
        <h5 class="mt25">
            Popular Tags
            <span class="heading-divider mt10"></span>
        </h5>
        <ul class="tag">
        
        @foreach ($tags as $tag)
            <li><a href="{{route('blog.tag',$tag->id)}}">{{$tag->name}}</a></li>
        @endforeach    
            <li><a href="#">Softwares</a></li>
            <li><a href="#">Programming</a></li>
        </ul>

    </div>
</div>