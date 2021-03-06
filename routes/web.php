<?php

$this->get('password', function() {
    return bcrypt('123456');
});

$this->group(['namespace' => 'Home'], function () {
    //登录注册
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('home.login');
    $this->post('login', 'Auth\LoginController@login');
    $this->get('logout', 'Auth\LoginController@logout')->name('home.logout');
    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('home.register');
    $this->post('register', 'Auth\RegisterController@register');

    $this->get('/', 'IndexController@index')->name('home.index');
    $this->get('/search', 'IndexController@search')->name('home.search');
    $this->get('/commodity/{id}', 'DetailController@view')->name('home.commodity_view');
    $this->get('/category', 'ListController@categoryList')->name('home.category_list');
    $this->get('/category/{id}', 'ListController@view')->name('home.category_view');
    $this->get('/category/group/{id}', 'ListController@group')->name('home.category_group');

    //文章相关
    $this->get('article/list', 'ArticleController@listView')->name('home.article_list');
    $this->get('article/{article_id}', 'ArticleController@articleView')->name('home.article');

    //登录后操作
    $this->group(['middleware' => 'user_auth'], function () {
        //添加订单
        $this->get('/order/add/{commodity_id}', 'OrderController@addView')->name('home.order_add');
        $this->post('/order/addPost', 'OrderController@addPost')->name('home.order_add_post');

        //修改收货信息
        $this->get('/address', 'OrderController@addressView')->name('home.address');
        $this->post('/address', 'OrderController@addressPost');

        //个人页面
        $this->get('person', 'PersonController@view')->name('home.person');
        $this->get('person/update', 'PersonController@update')->name('home.person_update');
        $this->post('person/update', 'PersonController@updatePost');

        $this->get('order/{order_id}', 'OrderController@view')->name('home.order_view');
    });
});
