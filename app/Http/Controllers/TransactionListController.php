<?php

namespace App\Http\Controllers;

use App\Http\Repository\TransactionRepository;
use App\Http\Resources\TransactionItemResource;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TransactionListController extends Controller
{
    /**
     * @var TransactionRepository
     */
    private $transactionRepository;
    /**
     * @var Repository|Application|mixed
     */
    private $paginate;

    /**
     * TransactionListController constructor.
     * @param  TransactionRepository  $transactionRepository
     */
    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->paginate = config('e-shop.paginate');
    }


    /**
     * @param  Request  $request
     * @return Application|Factory|View|AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $this->paginate = $request->input('per_page');
            $data = $this->transactionRepository->getTransactionList($this->paginate);

            return TransactionResource::collection($data);
        }
        return view('transactionList.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param $id
     * @return Application|Factory|View
     */
    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $this->paginate = $request->input('per_page');
            $data = $this->transactionRepository->getTransactionItemList($this->paginate, $id);
            return TransactionItemResource::collection($data);
        }
        $transaction = $this->transactionRepository->findById($id);
        return view('transactionList.show', compact('transaction'));
    }
}
