<?php
/**
 * Created by PhpStorm.
 * User: @htinlynn
 * Date: 03/05/2021
 * Time: 21:54
 */

namespace App\Http\Repository;

use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TransactionRepository
{

    /**
     * @var TransactionItem
     */
    private $transactionItemModel;
    /**
     * @var Transaction
     */
    private $model;

    /**
     * TransactionRepository constructor.
     * @param  Transaction  $transaction
     * @param  TransactionItem  $transactionItem
     */
    public function __construct(Transaction $transaction, TransactionItem $transactionItem)
    {
        $this->model = $transaction;
        $this->transactionItemModel = $transactionItem;
    }

    /**
     * @param $paginate
     * @return LengthAwarePaginator
     */
    public function getTransactionList($paginate): LengthAwarePaginator
    {
        return $this->model->with(['transactionItems', 'user'])->paginate($paginate);
    }

    /**
     * @param $id
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $paginate
     * @param $id
     * @return LengthAwarePaginator
     */
    public function getTransactionItemList($paginate, $id): LengthAwarePaginator
    {
        return $this->transactionItemModel->with('item')->where('transaction_id', '=', $id)->paginate($paginate);
    }
}
