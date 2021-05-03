<?php
/**
 * Created by PhpStorm.
 * User: @htinlynn
 * Date: 04/05/2021
 * Time: 00:21
 */

namespace App\Http\Repository;

use App\Models\User;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class CustomerRepository
{
    /**
     * @var User
     */
    private $model;
    /**
     * @var Repository|Application|mixed
     */
    private $superAdminRole;

    /**
     * CustomerRepository constructor.
     * @param  User  $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
        $this->superAdminRole = config('e-shop.super-admin-role');

    }

    /**
     * @return LengthAwarePaginator
     */
    public function getUserList($paginate)
    {
        return $this->model->with('roles')->whereDoesntHave('roles', function ($role) {
            $role->where('name', '=', $this->superAdminRole);
        })->orderBy('id')->paginate($paginate);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param  Request  $request
     * @param  int  $id
     * @return mixed
     */
    public function updateCustomer(Request $request, int $id)
    {
        $customer = $this->model->findOrFail($id);

        return tap($customer)->update($request->only(['name', 'email', 'phone', 'address']));
    }

    /**
     * @param  int  $id
     * @return mixed
     */
    public function deleteCustomer(int $id)
    {
        $customer = $this->model->find($id);
        return $customer->delete();
    }
}
