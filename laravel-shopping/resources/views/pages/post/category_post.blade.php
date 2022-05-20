@section('content2')
@extends('layoutfp')


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Danh mục tin</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="blog__sidebar">
                    <!-- <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div> -->
                    <div class="blog__sidebar__item">
                        <h4>Danh mục tin</h4>
                        @foreach($category_post as $key => $cat_post )
                        <ul>
                            <li><a href="{{url('/category_post/'.$cat_post->cate_post_id)}}">{{$cat_post -> cate_post_name}}</a></li>
                        </ul>
                        @endforeach
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Tin mới nhất</h4>
                        
                        <div class="blog__sidebar__recent">
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6></h6>
                                    <span>MAR 05, 2019</span>
                                </div>
                            </a>
                        </div>
                       
                    </div>
                    <!-- <div class="blog__sidebar__item">
                        <h4>Search By</h4>
                        <div class="blog__sidebar__item__tags">
                            <a href="#">Apple</a>
                            <a href="#">Beauty</a>
                            <a href="#">Vegetables</a>
                            <a href="#">Fruit</a>
                            <a href="#">Healthy Food</a>
                            <a href="#">Lifestyle</a>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="row">
                @foreach($post as $key => $post)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{asset('uploads/posts/'.$post->post_image)}}" height=200px alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="{{URL('/post/'.$post->post_id)}}">{{$post->post_title}}</a></h5>
                                <p>{!!$post->post_desc!!} </p>
                                <a href="{{URL('/post/'.$post->post_id)}}" class="blog__btn">Đọc bài viết <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->





@endsection