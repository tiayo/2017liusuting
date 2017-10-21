<!--sidebar nav start-->
<ul class="nav nav-pills nav-stacked custom-nav">

    <li class="menu-list active nav-active" id="nav_1"><a href=""><i class="fa fa-shopping-cart"></i> <span>客房类型</span></a>
        <ul class="sub-menu-list">
            <li id="nav_1_1"><a href="{{ route('commodity_list') }}">客房类型</a></li>
            <li id="nav_1_2"><a href="{{ route('commodity_add') }}">添加类型</a></li>
        </ul>
    </li>

    <li class="menu-list active nav-active" id="nav_0"><a href=""><i class="fa fa-home"></i> <span>房间管理</span></a>
        <ul class="sub-menu-list">
            <li id="nav_0_1"><a href=" {{ route('room_list') }} ">房间管理</a></li>
            <li id="nav_0_2"><a href=" {{ route('room_add') }} ">添加房间</a></li>
        </ul>
    </li>

    <li class="menu-list active nav-active" id="nav_3"><a href=""><i class="fa fa-truck"></i> <span>订单管理</span></a>
        <ul class="sub-menu-list">
            <li id="nav_3_1"><a href="{{ route('order_list') }}">订单管理</a></li>
            <li id="nav_3_2"><a href="{{ route('order_add') }}">添加订单</a></li>
            <li id="nav_3_3"><a href="{{ route('order_complet') }}">结束订单</a></li>
        </ul>
    </li>

    <li class="menu-list active nav-active" id="nav_4"><a href=""><i class="fa fa-book"></i> <span>旅游资讯</span></a>
        <ul class="sub-menu-list">
            <li id="nav_4_1"><a href="{{ route('article_list') }}">资讯管理</a></li>
            <li id="nav_4_2"><a href="{{ route('article_add') }}">添加资讯</a></li>
        </ul>
    </li>

    <li class="menu-list active nav-active" id="nav_2"><a href=""><i class="fa fa-user"></i> <span>会员管理</span></a>
        <ul class="sub-menu-list">
            <li id="nav_2_1"><a href="{{ route('user_list') }}">会员管理</a></li>
        </ul>
    </li>
</ul>
<!--sidebar nav end-->