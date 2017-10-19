@inject('index', 'App\Services\Home\IndexService')
@extends('home.layouts.app')

@section('title', '结算页面')

@section('body')
    <form action="{{ route('home.order_add_post') }}" method="post">
        {{ csrf_field() }}
        <input name="commodity_id" type="hidden" value="{{ $commodity['id'] }}">
        <input name="status" type="hidden" value="0">
        <div class="goods-settlement clearfix" id="vue">
            <div class="content">
                <div class="info">
                    <h1 class="name">{{ config('site.title') }}</h1>
                    <ul class="clearfix">
                        <li><strong>房型：</strong><span>{{ $commodity['name'] }}</span></li>
                        <li><strong>单价：</strong><span>￥<em class="dj">{{ $commodity['price'] }}</em></span></li>
                        <li><strong>入住时间：</strong><span class="now">{{ date('Y-m-d') }}</span></li>
                        <li class="addressName">
                            <label for="">姓名：</label>
                            <input class="name-input" name="name" type="text" value="{{ $user['name'] }}"
                                   placeholder="点击填写入住人姓名"/>
                        </li>
                        <li class="addressTel">
                            <label for="">电话：</label>
                            <input class="tel-input" name="phone" type="text" value="{{ $user['phone'] }}"
                                   placeholder="点击填写联系电话"/>
                        </li>
                        <li class="addressName">
                            <label for="">身份证：</label>
                            <input class="name-input" name="id_number" type="text" value="{{ $user['id_number'] }}"
                                   placeholder="点击填写身份证"/>
                        </li>
                        <li class="addressDay">
                            <label for="">入住天数：</label>
                            <input class="address-input" name="day" type="number"
                                   placeholder="点击输入天数" value="1"/>
                        </li>
                        <li class="addressRoom">
                            <label for="">房间数：</label>
                            <input class="room-input" type="number" name="num"
                                   placeholder="点击输入天数" value="1"/>
                        </li>
                        <li class="addressName">
                            <label for="">备注：</label>
                            <input class="name-input" name="remark" type="text" value="点击填写备注"/>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-bottom">
                <h1>合计:<span></span></h1>
                <button type="submit" href="payfor-success.html">提交订单</button>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        var mydate = new Date();
        var time = "" + mydate.getFullYear() + "年";
        time += (mydate.getMonth()+1) + "月";
        time += mydate.getDate() + "日";
        $(".now").html(time);
        $(".nav-bottom h1 span").html($(".dj").text());
        $(".address-input").blur(function() {
            $(".nav-bottom h1 span").html($(".dj").text()*parseInt($(".address-input").val())*parseInt($(".room-input").val()));
        });
        window.onload = function() {
            $(".nav-bottom h1 span").html($(".dj").text()*parseInt($(".address-input").val())*parseInt($(".room-input").val()));
        }
        $(".room-input").blur(function() {
            $(".nav-bottom h1 span").html($(".dj").text()*parseInt($(".address-input").val())*parseInt($(".room-input").val()));
        });
    </script>
@endsection