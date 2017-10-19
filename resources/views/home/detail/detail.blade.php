@extends('home.layouts.app')

@section('title', '商品详情')

@section('style')
    <style type="text/css">
        #back {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 25px;
            height: 25px;
            background: url(/style/home/icon/icon_arrow_left.png) no-repeat center;
            background-size: 15px;
            box-shadow: 1px 1px 5px #000;
            border-radius: 50%;
            z-index: 999;
        }
        .room-details .room-bigpic {
            position: relative;
            width: 100%;
        }
        .room-details .room-bigpic img {
            float: left;
            width: 100%;
        }
        .room-details .room-bigpic b {
            position: absolute;
            bottom: 10px;
            left: 10px;
            height: 30px;
            color: #fff;
            font-size: 16px;
            line-height: 30px;
            z-index: 999;
        }
        .room-details .room-info {
            padding: 10px 10px 5px;
        }
        .room-details .room-name {
            height: 45px;
            line-height: 45px;
        }
        .room-details .room-name span {
            float: left;
            height: 100%;
            color: #000;
            font-size: 18px;
            font-weight: bold;
        }
        .room-details .surplus {
            height: 25px;
            color: #999;
        }
        .room-details .confirm {
            float: right;
            width: 100px;
            height: 30px;
            outline: none;
            margin-top: 7px;
            border: 0;
            color: #fff;
            background-color: #f00;
            font-size: 14px;
            font-weight: bold;
            text-indent: 5px;
            letter-spacing: 5px;
            text-align: center;
            line-height: 30px;
            box-shadow: 1px 1px 5px #000;
        }
        .room-details .info-con {
            box-shadow: 1px 1px 5px #000;
            padding: 1em;
        }
    </style>
@endsection

@section('body')
    <div class="room-details">
        <div class="swiper-container room-bigpic clearfix">
            <a href="/" id="back"></a>
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
            <b>{{ $commodity['name'] }}</b>
        </div>
        <div class="room-info">
            <div class="room-name">
                <span>房型信息</span>
                <button class="confirm"  onclick="location='{{ route('home.order_add', ['commodity_id' => $commodity['id']])  }}'">
                    马上预约
                </button>
            </div>
            <div class="surplus">剩余 <em>{{ $commodity->room->where('status', 1)->count() }}</em> 间</div>
            <div class="info-con">{!! $commodity['description'] !!}</div>
        </div>
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
    </script>
@endsection