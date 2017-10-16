<?php

namespace App\Services\Manage;

use App\Repositories\RoomRepository;
use Exception;

class RoomService
{
    protected $room;

    public function __construct(RoomRepository $room)
    {
        $this->room = $room;
    }

    /**
     * 通过id验证记录是否存在以及是否有操作权限
     * 通过：返回该记录
     * 否则：抛错
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|static|static[]
     */
    public function validata($id)
    {
        $salesman = $this->room->first($id);

        throw_if(empty($salesman), Exception::class, '未找到该记录！', 404);

        return $salesman;
    }

    /**
     * 获取需要的数据
     *
     * @param int $num
     * @param null $keyword
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function get($num = 10000, $keyword = null)
    {
        if (!empty($keyword)) {
            return $this->room->getSearch($num, $keyword);
        }

        return $this->room->get($num);
    }

    /**
     * 获取需要的数据(顶级栏目)
     *
     * @return mixed
     */
    public function getParent()
    {
        return $this->room->getParent();
    }

    /**
     * 获取需要的数据
     *
     * @param array ...$select
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getSimple(...$select)
    {
        return $this->room->getSimple(...$select);
    }

    /**
     * 查找指定id的用户
     *
     * @param $id
     * @return mixed
     */
    public function first($id)
    {
        return $this->validata($id);
    }

    /**
     * 更新或编辑
     *
     * @param $post
     * @param null $id
     * @return mixed
     */
    public function updateOrCreate($post, $id = null)
    {
        //统计数据
        $data['num'] = $post['num'];
        $data['commodity_id'] = $post['commodity_id'];
        $data['status'] = $post['status'];

        if (!empty($id)) {
            //执行更新
            return $this->room->update($id, $data);
        }

        //执行插入1
        if ($post['bed_num'] == 0) {
            return $this->room->create($data);
        }

        //执行插入2
        for ($i=1; $i <= $post['bed_num']; $i++) {
            $data['num'] = $post['num'].'-'.$i;
            $this->room->create($data);
        }

        return true;

    }

    /**
     * 删除管理员
     *
     * @param $id
     * @return bool|null
     */
    public function destroy($id)
    {
        //验证是否可以操作当前记录
        $this->validata($id)->toArray();

        //执行删除
        return $this->room->destroy($id);
    }
}