@extends(__layout())

@section('content')

@php
    $relatedArticles = $article->getRelated();
@endphp
<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="blog__details__content">
                    <div class="blog__details__item">
                        <img src="{{$article->getImage()}}" alt="{{$article->getTitle()}}">
                        <div class="blog__details__item__title">
                            @if($article->category)
                            <span class="tip">{{$article->category->getTitle()}}</span>
                            @endif
                            <h4>
                                {{$article->getTitle()}}
                                @if($article->canEdit())
                                <small><em><a href="{{route('articles.edit', ['article' => $article])}}">{{articles_trans('lang.edit')}}</a></em></small>
                                @endif
                            </h4>
                            <ul>
                                @if($article->user)<li>by <span>{{$article->user->name}}</span></li>@endif
                                <li>{{$article->created_at}} &nbsp;</li>
                                <li>39 Comments</li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog__details__desc">
                        {!! $article->content !!}
                    </div>
                    {{-- <div class="blog__details__quote">
                        <div class="icon"><i class="fa fa-quote-left"></i></div>
                        <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.</p>
                    </div>
                    <div class="blog__details__desc">
                        <p>Occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                        dolor in reprehenderit in voluptate.</p>
                    </div> --}}
                    {{-- <div class="blog__details__tags">
                        <a href="#">Fashion</a>
                        <a href="#">Street style</a>
                        <a href="#">Diversity</a>
                        <a href="#">Beauty</a>
                    </div> --}}
                    <div class="blog__details__btns">
                        <div class="row">
                            @if($relatedArticles[0])
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__details__btn__item">
                                    <h6><a href="{{$relatedArticles[0]->getHref()}}"><i class="fa fa-angle-left"></i> {{articles_trans('lang.previous_article')}}</a></h6>
                                </div>
                            </div>
                            @endif
                            @if($relatedArticles[1])
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__details__btn__item blog__details__btn__item--next">
                                    <h6><a href="{{$relatedArticles[1]->getHref()}}">{{articles_trans('lang.next_article')}} <i class="fa fa-angle-right"></i></a></h6>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="blog__details__comment">
                        <h5>3 Comment</h5>
                        <a href="#" class="leave-btn">Leave a comment</a>
                        <div class="blog__comment__item">
                            <div class="blog__comment__item__pic">
                                <img src="img/blog/details/comment-1.jpg" alt="">
                            </div>
                            <div class="blog__comment__item__text">
                                <h6>Brandon Kelley</h6>
                                <p>Duis voluptatum. Id vis consequat consetetur dissentiet, ceteros commune perpetua
                                mei et. Simul viderer facilisis egimus tractatos splendi.</p>
                                <ul>
                                    <li><i class="fa fa-clock-o"></i> Seb 17, 2019</li>
                                    <li><i class="fa fa-heart-o"></i> 12</li>
                                    <li><i class="fa fa-share"></i> 1</li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog__comment__item blog__comment__item--reply">
                            <div class="blog__comment__item__pic">
                                <img src="img/blog/details/comment-2.jpg" alt="">
                            </div>
                            <div class="blog__comment__item__text">
                                <h6>Brandon Kelley</h6>
                                <p>Consequat consetetur dissentiet, ceteros commune perpetua mei et. Simul viderer
                                facilisis egimus ulla mcorper.</p>
                                <ul>
                                    <li><i class="fa fa-clock-o"></i> Seb 17, 2019</li>
                                    <li><i class="fa fa-heart-o"></i> 12</li>
                                    <li><i class="fa fa-share"></i> 1</li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog__comment__item">
                            <div class="blog__comment__item__pic">
                                <img src="img/blog/details/comment-3.jpg" alt="">
                            </div>
                            <div class="blog__comment__item__text">
                                <h6>Brandon Kelley</h6>
                                <p>Duis voluptatum. Id vis consequat consetetur dissentiet, ceteros commune perpetua
                                mei et. Simul viderer facilisis egimus tractatos splendi.</p>
                                <ul>
                                    <li><i class="fa fa-clock-o"></i> Seb 17, 2019</li>
                                    <li><i class="fa fa-heart-o"></i> 12</li>
                                    <li><i class="fa fa-share"></i> 1</li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__item">
                        <div class="section-title">
                            <h4>{{articles_trans('lang.categories')}}</h4>
                        </div>
                        <ul>
                            <li><a href="{{route('articles.index')}}">{{articles_trans('lang.all')}} <span>(250)</span></a></li>
                            @foreach(articles_categories() as $category)
                            <li><a href="{{$category->gethref()}}">{{$category->getTitle()}}<span>(80)</span></a></li>
                            @endforeach

                            {{-- <li><a href="#">Street style <span>(75)</span></a></li>
                            <li><a href="#">Lifestyle <span>(35)</span></a></li>
                            <li><a href="#">Beauty <span>(60)</span></a></li> --}}
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <div class="section-title">
                            <h4>{{articles_trans('lang.related_articles')}}</h4>
                        </div>
                        @foreach($article->getRelated() as $related)
                        <a href="{{$related->getHref()}}" class="blog__feature__item">
                            <div class="blog__feature__item__pic">
                                <img width="64" src="{{$related->getThumbnailImage(270)}}" alt="{{$related->getTitle()}}">
                            </div>
                            <div class="blog__feature__item__text">
                                <h6>{{$related->getTitle()}}</h6>
                                <span>{{$related->created_at}}</span>
                            </div>
                        </a>
                        @endforeach
                        {{-- <a href="#" class="blog__feature__item">
                            <div class="blog__feature__item__pic">
                                <img src="img/blog/sidebar/fp-2.jpg" alt="">
                            </div>
                            <div class="blog__feature__item__text">
                                <h6>Amf Cannes Red Carpet Celebrities Kend...</h6>
                                <span>Seb 17, 2019</span>
                            </div>
                        </a>
                        <a href="#" class="blog__feature__item">
                            <div class="blog__feature__item__pic">
                                <img src="img/blog/sidebar/fp-3.jpg" alt="">
                            </div>
                            <div class="blog__feature__item__text">
                                <h6>Amf Cannes Red Carpet Celebrities Kend...</h6>
                                <span>Seb 17, 2019</span>
                            </div>
                        </a> --}}
                    </div>
                    {{-- <div class="blog__sidebar__item">
                        <div class="section-title">
                            <h4>Tags cloud</h4>
                        </div>
                        <div class="blog__sidebar__tags">
                            <a href="#">Fashion</a>
                            <a href="#">Street style</a>
                            <a href="#">Diversity</a>
                            <a href="#">Beauty</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection