@extends('manage.layouts.app')

@section('title', '添加/管理商品属性')

@section('style')
    @parent
@endsection

@section('breadcrumb')
    <li navValue="nav_0"><a href="#">管理专区</a></li>
    <li navValue="nav_0_3"><a href="#">添加/管理商品属性</a></li>
@endsection

@section('body')
    <div class="col-md-12">

        <!--错误输出-->
        <div class="form-group">
            <div class="alert alert-danger fade in @if(!count($errors) > 0) hidden @endif" id="alert_error">
                <a href="#" class="close" data-dismiss="alert">×</a>
                <span>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </span>
            </div>
        </div>

        <section class="panel">
            <header class="panel-heading">
                添加/管理商品属性
            </header>
            <div class="panel-body">
                <form id="form" class="form-horizontal adminex-form" method="post" action="{{ $url }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-sm-2 control-label">名称</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $old_input['name'] }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="value" class="col-sm-2 col-sm-2 control-label">属性值</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="value" name="value" value="{{ $old_input['value'] }}"
                                   placeholder="使用','分隔" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div  class="col-sm-2 col-sm-2 control-label">
                            <button class="btn btn-success" type="submit"><i class="fa fa-cloud-upload"></i> 确认提交</button>
                        </div>
                    </div>

                </form>
            </div>
        </section>
    </div>
@endsection

@section('script')
    @parent
    <script>
        $(document).ready(function () {
            $('#password').bind('input propertychange', function() {
                $(this).attr('name', 'password')
            });
        })
    </script>
@endsection
