@extends('manage.layouts.app')

@section('title', '主页')

@section('style')
    <!--dashboard calendar-->
    <link href="{{ asset('/static/adminex/css/clndr.css') }}" rel="stylesheet">
    @parent
@endsection

@section('breadcrumb')

@endsection

@section('body')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    最新订单
                    <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-up"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body" style="display: none">
                    <section id="unseen">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>用户</th>
                                <th>客房</th>
                                <th>房号</th>
                                <th>天数</th>
                                <th>电话</th>
                                <th>价格</th>
                                <th>订单状态</th>
                                <th>更新时间</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>

                            <tbody id="target">
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{ $list['id'] }}</td>
                                    <td>{{ $list->user->name }}</td>
                                    <td>{{ $list->commodity->name }}</td>
                                    <td>
                                        @foreach($list->orderDetail as $key => $detail)
                                            {{ $detail->room->num ?? '未知' }}

                                            @if ($key + 1 < count($list->orderDetail))
                                                |
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $list['day'] }}</td>
                                    <td>{{ $list->user->phone }}</td>
                                    <td>￥{{ $list['price'] }}</td>
                                    <td style="color: red">
                                        {{ config('site.order_status')[$list['status']] }}
                                    </td>
                                    <td>{{ $list['updated_at'] }}</td>
                                    <td>{{ $list['created_at'] }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-success dropdown-toggle" type="button" id="btnGroupDrop1">
                                                更改状态 <span class="caret"></span>
                                            </button>
                                            <ul aria-labelledby="btnGroupDrop1" role="menu" class="dropdown-menu">
                                                @foreach(config('site.order_status') as $key => $order_status)
                                                    <li>
                                                        <a href="{{ route('order_status', ['order_id' => $list['id'], 'status' => $key]) }}"
                                                           onClick="return confirm('“确定”将会执行一系列不可恢复的操作，请选择：?');">
                                                            {{ $order_status }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <button class="btn btn-info" type="button" onclick="location='{{ route('order_update', ['id' => $list['id'] ]) }}'">编辑</button>
                                        <button class="btn btn-danger" type="button" onclick="javascript:if(confirm('确实要删除吗?'))location='{{ route('order_destroy', ['id' => $list['id'] ]) }}'">删除</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    统计情况：空房数量:{{ $avalidate }}，住房数量:{{ $unavailable }}，完成的订单：{{ $order_count }}
                </header>
            </section>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <!--Calendar-->
    <script src="{{ asset('/static/adminex/js/calendar/clndr.js') }}"></script>
    <script src="{{ asset('/static/adminex/js/calendar/evnt.calendar.init.js') }}"></script>
    <script src="{{ asset('/static/adminex/js/calendar/moment-2.2.1.js') }}"></script>
    <script src="{{ asset('http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js') }}"></script>

@endsection
