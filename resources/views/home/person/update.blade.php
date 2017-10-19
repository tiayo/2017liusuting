@extends('home.layouts.app')

@section('title', '我的信息')

@section('style')
    <style type="text/css">
        body {
            position: fixed;
            overflow: scroll;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #f3f5f9;
        }
        .user-info {
            background-color: #fff;
        }
        .user-info li {
            height: 45px;
            margin: 0 15px;
            padding-left: 5px;
            background-color: #fff;
            border-bottom: 1px solid #e7e7e7;
            color: #666;
            font-size: 16px;
            line-height: 45px;
        }
        .user-info li input {
            float: right;
            height: 100%;
            padding-right: 5px;
            outline: none;
            border: 0;
            text-align: right;
        }
        .user-info li:nth-child(1) {
            position: relative;
            height: 70px;
            margin-top: 10px;
            line-height: 70px;
        }
        .user-info li:nth-child(1) .pic {
            position: relative;
            position: absolute;
            top: 5px;
            right: 5px;
            width: 55px;
            height: 55px;
            border-radius: 50%;
        }
        .user-info li:nth-child(1) .pic #portrait-file {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 100%;
            padding: 0;
            opacity: 0;
        }
        .user-info li:nth-child(1) .pic #user-portrait {
            float: left;
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }
        .save {
            float: left;
            width: 45%;
            height: 40px;
            border: 1px solid #000;
            background-color: rgba(255, 255, 255, 0.5);
            color: #333;
            margin-left: 2%;
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            line-height: 40px;
        }
        .Pullout {
            float: right;
            width: 45%;
            height: 40px;
            margin-right: 2%;
            margin-top: 20px;
            background-color: #f5f5f5;
            color: #333;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            line-height: 40px;
            border: 1px solid #000;
            background-color: rgba(255, 255, 255, 0.5);
        }
    </style>
@endsection

@section('body')
    <form action="{{ route('home.person_update') }}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        <ul class="user-info">
            <li>
                头像
                <div class="pic">
                    <input name="avatar" type="file" id="portrait-file" />
                    <img src="{{ $user['avatar'] }}" id="user-portrait"/>
                </div>
            </li>
            <li>
                姓名<input name="name" type="text" value="{{ $user['name'] }}" id="user-name"/>
            </li>
            <li>
                手机<input name="phone" type="text" value="{{ $user['phone'] }}" id="user-phone"/>
            </li>
        </ul>
        <button type="submit" class="save">保存</button>
    </form>
    <button type="button" class="Pullout" onclick="location='{{ route('home.logout') }}'">退出登录</button>
@endsection