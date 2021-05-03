<?php
/**
 * Created by PhpStorm.
 * User: @htinlynn
 * Date: 03/05/2021
 * Time: 18:59
 */

namespace App\Http\Repository;

use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Log;
use Exception;

class PaymentRepository
{
    private $model, $transactionItemModel;

    public function __construct(Transaction $model, TransactionItem $transactionItem)
    {
        $this->model = $model;
        $this->transactionItemModel = $transactionItem;
    }

    /**
     * @param $data
     * @return bool
     */
    public function storeTransactionList($data): bool
    {
        try {
            $transaction = $this->model->create([
                'total_price' => $data['total_price'], 'user_id' => $this->getAuthUserId()
            ]);


            foreach ($data['items'] as $item) {
                $transaction->transactionItems()->create([
                    'item_id' => $item['id'], 'total_price' => $item['price'],
                    'quantity' => $item['quantity']
                ]);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }


        return true;
    }

    private function getAuthUserId()
    {
        return auth()->check() ? auth()->user()->id : null;
    }
}
