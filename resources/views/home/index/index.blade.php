@extends('home.layouts.app')

@section('title', '首页')

@section('body')
    <div class="index clearfix">
        <div class="swiper-container index-bigpic clearfix">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#"><img src="{{ asset('/style/home/picture/bigpic1.jpg') }}"/></a>
                </div>
                <div class="swiper-slide">
                    <a href="#"><img src="{{ asset('/style/home/picture/bigpic2.jpg') }}"/></a>
                </div>
                <div class="swiper-slide">
                    <a href="#"><img src="{{ asset('/style/home/picture/bigpic3.jpg') }}"/></a>
                </div>
            </div>
            <!-- 分页器 -->
            <div class="swiper-pagination"></div>
        </div>
        <div class="goods clearfix">
            @foreach($commodities as $commodity)
                <div class="swiper-containerRoom1 index-room">
                    <div class="swiper-wrapper">
                        @for($i=0; $i<9; $i++)
                            @if (!empty($commodity['image_'.$i]))
                                <div class="swiper-slide">
                                    <img src="{{ $commodity['image_'.$i] }}"/>
                                </div>
                            @endif
                        @endfor
                    </div>
                    <span class="room-name">{{ $commodity['name'] }}</span>
                </div>
            @endforeach
        </div>
        <div class="swiper-containerScenic">
            <div class="scenic">附近景点</div>
            <div class="swiper-wrapper">
                @foreach($articles as $article)
                    <div class="swiper-slide">
                        <div class="scenic-title">{{ $article['title'] }}</div>
                        <div class="scenic-con">{{ mb_substr(strip_tags($article['content']), 0, 200, 'utf-8') }}...</div>
                        <a href="{{ route('home.article', ['article_id' => $article['id']]) }}" class="scenic-details">查看详情</a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="copyright">
            <h1>© xxx版权所有</h1>
        </div>
    </div>
    <div class="nav clearfix">
        <a href="personal-center.html"></a>
    </div>
    <script type="text/javascript">
        var mySwiper = new Swiper ('.swiper-container', {
            direction: 'horizontal',
            loop: true,
            autoplay: 3000,
            autoplayDisableOnInteraction : false,
            // 分页器
            pagination: '.swiper-pagination',
            paginationClickable: '.swiper-pagination',
            spaceBetween: 30,
            effect: 'fade'
        });
        var mySwiperRoom = new Swiper ('.swiper-containerRoom1', {
            effect: 'cube',
            loop: true,
            autoplay: 3000,
            grabCursor: true,
            cube: {
                shadow: true,
                slideShadows: true,
                shadowOffset: 20,
                shadowScale: 0.94
            }
        });
        var mySwiperRoom = new Swiper ('.swiper-containerRoom2', {
            effect: 'cube',
            loop: true,
            autoplay: 3000,
            grabCursor: true,
            cube: {
                shadow: true,
                slideShadows: true,
                shadowOffset: 20,
                shadowScale: 0.94
            }
        });
        var mySwiperRoom = new Swiper ('.swiper-containerRoom3', {
            effect: 'cube',
            loop: true,
            autoplay: 3000,
            grabCursor: true,
            cube: {
                shadow: true,
                slideShadows: true,
                shadowOffset: 20,
                shadowScale: 0.94
            }
        });
        var mySwiperRoom = new Swiper ('.swiper-containerRoom4', {
            effect: 'cube',
            loop: true,
            autoplay: 3000,
            grabCursor: true,
            cube: {
                shadow: true,
                slideShadows: true,
                shadowOffset: 20,
                shadowScale: 0.94
            }
        });
        var swiper = new Swiper('.swiper-containerScenic', {
            effect: 'coverflow',
            loop: true,
            // autoplay: 3000,
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflow: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows : true
            }
        });
    </script>
@endsection