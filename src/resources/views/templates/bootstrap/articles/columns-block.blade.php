@if(size_of($items))
<section class="">
    <div class="container">
        @if(isset($title))
        <div class="section-title">
            <h4>{{isset($title) ? $title : ''}}</h4>
        </div>
        @endif
        <div class="row">
            @foreach(array_to_columns($items) as $colKey => $col)
            <div class="col-lg-4 col-md-4 col-sm-6">
                @foreach($col as $rowKey => $article)
                <div class="blog__item">
                    <div class="blog__item__pic set-bg {{!$colKey && !$rowKey ? 'large__item' : ''}}" data-setbg="{{$article->getImage()}}"></div>
                    <div class="blog__item__text">
                        <h6><a href="{{$article->getHref()}}">{{$article->getTitle()}}</a></h6>
                        <ul>
                            @if($article->user)<li>by <span>{{$article->user->name}}</span></li>@endif
                            <li>{{$article->created_at}}&nbsp;</li>
                            <li><a href="{{$article->getHref()}}">{{articles_trans('lang.read_more')}}</a></li>
                        </ul>
                    </div>
                </div>
                @endforeach
                {{-- <div class="blog__item">
                    <div class="blog__item__pic large__item set-bg" data-setbg="img/blog/blog-7.jpg"></div>
                    <div class="blog__item__text">
                        <h6><a href="#">Pot Party! See Farrah Abraham Flaunt Smoking Body At...</a></h6>
                        <ul>
                            <li>by <span>Ema Timahe</span></li>
                            <li>Seb 17, 2019</li>
                        </ul>
                    </div>
                </div>
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-9.jpg"></div>
                    <div class="blog__item__text">
                        <h6><a href="#">CMT Awards 2019 Red Carpet Arrivals Carrie Underwood, Sheryl...</a></h6>
                        <ul>
                            <li>by <span>Ema Timahe</span></li>
                            <li>Seb 17, 2019</li>
                        </ul>
                    </div>
                </div> --}}
            </div>
            @endforeach
            {{-- <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-2.jpg"></div>
                    <div class="blog__item__text">
                        <h6><a href="#">Amf Cannes Red Carpet Celebrities Kendall Jenner, Pamela...</a></h6>
                        <ul>
                            <li>by <span>Ema Timahe</span></li>
                            <li>Seb 17, 2019</li>
                        </ul>
                    </div>
                </div>
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-4.jpg"></div>
                    <div class="blog__item__text">
                        <h6><a href="#">Ireland Baldwin Shows Off Trendy Ilse Valfre Tattoo At Stagecoach...</a>
                        </h6>
                        <ul>
                            <li>by <span>Ema Timahe</span></li>
                            <li>Seb 17, 2019</li>
                        </ul>
                    </div>
                </div>
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-8.jpg"></div>
                    <div class="blog__item__text">
                        <h6><a href="#">Kim Kardashian Steps Out In Paris Wearing Shocking Sparkly...</a></h6>
                        <ul>
                            <li>by <span>Ema Timahe</span></li>
                            <li>Seb 17, 2019</li>
                        </ul>
                    </div>
                </div>
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-10.jpg"></div>
                    <div class="blog__item__text">
                        <h6><a href="#">A-list Battle! Angelina Jolie & Lady Gaga Fighting Over Who...</a></h6>
                        <ul>
                            <li>by <span>Ema Timahe</span></li>
                            <li>Seb 17, 2019</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-3.jpg"></div>
                    <div class="blog__item__text">
                        <h6><a href="#">Gigi Hadid, Rita Ora, Serena & Other Hot Celebs Stun At 2019...</a></h6>
                        <ul>
                            <li>by <span>Ema Timahe</span></li>
                            <li>Seb 17, 2019</li>
                        </ul>
                    </div>
                </div>
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-5.jpg"></div>
                    <div class="blog__item__text">
                        <h6><a href="#">Billboard Music Awards: Best, Worst & Wackiest Dresses On The...</a></h6>
                        <ul>
                            <li>by <span>Ema Timahe</span></li>
                            <li>Seb 17, 2019</li>
                        </ul>
                    </div>
                </div>
                <div class="blog__item">
                    <div class="blog__item__pic large__item set-bg" data-setbg="img/blog/blog-6.jpg"></div>
                    <div class="blog__item__text">
                        <h6><a href="#">Stephanie Pratt Busts Out Of Teeny Black Bikini During Hawaii...</a></h6>
                        <ul>
                            <li>by <span>Ema Timahe</span></li>
                            <li>Seb 17, 2019</li>
                        </ul>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-lg-12 text-center">
                <a href="#" class="primary-btn load-btn">Load more posts</a>
            </div> --}}
        </div>
    </div>
</section>
@endif