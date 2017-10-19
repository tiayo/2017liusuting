<?php

namespace App\Services\Home;

use App\Repositories\ArticleRepository;
use App\Repositories\CommodityRepository;

class IndexService
{
    protected $commodity, $article;

    public function __construct(CommodityRepository $commodity, ArticleRepository $article)
    {
        $this->commodity = $commodity;
        $this->article = $article;
    }

    /**
     * 获取符合要求的商品
     *
     * @param $type
     * @param $limit
     * @return mixed
     */
    public function getByType($type, $limit)
    {
        return $this->commodity->getByType($type, $limit);
    }

    /**
     * 获取符合要求的文章
     *
     * @param $type
     * @param $limit
     * @return mixed
     */
    public function getByGroupArticle($type, $limit)
    {
        return $this->article->getByGroup($type, $limit);
    }

    /**
     * 搜索
     *
     * @param $keyword
     * @return mixed
     */
    public function getSearch($keyword)
    {
        return $this->commodity->selectGet([
            ['name', 'like', "%$keyword%"],
        ], '*');
    }
}