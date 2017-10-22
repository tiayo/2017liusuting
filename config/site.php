<?php

return [
    'administrator' => env('SITE_ADMINISTRATE'),
    'upload_image_size' => 1024,
    'list_num' => env('SITE_LIST_NUM'),
    'title' => '流星雨青年旅社', //网站标题
    'order_status' => [ //订单状态
        0 => '预约',
        1 => '入住',
        2 => '完成',
        3 => '取消',
    ],
    'user_status' => [
        0 => '禁用',
        1 => '正常'
    ],
    'room_status' => [
        0 => '不可用',
        1 => '可用'
    ],
    'commodity_status' => [
        0 => '下架',
        1 => '上架',
    ],
    'commodity_type' => [
        0 => '普通客房',
        1 => '特价客房',
        2 => '超值客房',
    ],
    'article_group' => [
        0 => '旅游资讯',
    ],
];