<?php
/**
 * Created by PhpStorm.
 * User: @htinlynn
 * Date: 02/05/2021
 * Time: 18:54
 */

namespace App\Http\Repository;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;

class HomeRepository
{
    private $model;

    public function __construct(Item $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection|Item[]
     */
    public function getItemList()
    {
        return $this->model->with('category')->where('is_available','=',1)->get();
    }
}
