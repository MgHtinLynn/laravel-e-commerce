<?php
/**
 * Created by PhpStorm.
 * User: @htinlynn
 * Date: 04/05/2021
 * Time: 02:20
 */

namespace App\Http\Repository;


use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ItemRepository
{
    private $model, $categoryModel;

    public function __construct(Item $model, Category $category)
    {
        $this->model = $model;
        $this->categoryModel = $category;
    }

    /**
     * @param $paginate
     * @return mixed
     */
    public function getItemList($paginate)
    {
        return $this->model->paginate($paginate);
    }

    /**
     * @return Category[]|Collection
     */
    public function getCategoryList()
    {
        return $this->categoryModel->all();
    }

    /**
     * @param  Request  $request
     * @return bool
     */
    public function createItem(Request $request): bool
    {
        $this->model->create($request->only([
            'name', 'item_model', 'price', 'image_url', 'category_id', 'description', 'is_available'
        ]));
        return true;
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param  Request  $request
     * @param  int  $id
     * @return mixed
     */
    public function updateItem(Request $request, int $id)
    {
        $item = $this->model->findOrFail($id);

        return tap($item)->update($request->only([
            'name', 'item_model', 'price', 'image_url', 'category_id', 'description', 'is_available'
        ]));
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function deleteItem(int $id)
    {
        $item = $this->model->find($id);
        return $item->delete();
    }
}
