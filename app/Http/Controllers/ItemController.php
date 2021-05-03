<?php

namespace App\Http\Controllers;

use App\Http\Repository\ItemRepository;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ItemResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    private $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->input('per_page') && (!empty($request->input('per_page')))) {
                $this->paginate = $request->input('per_page');
            }
            $itemList = $this->itemRepository->getItemList($this->paginate);

            return ItemResource::collection($itemList);
        }
        return view('item.index');
    }

    public function getCategoryList()
    {
        return CategoryResource::collection($this->itemRepository->getCategoryList());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->itemRepository->createItem($request);

        return redirect()->route('item-list.index')->with(['success' => trans('item.created')]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $item = $this->itemRepository->findById($id);
        return view('item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $this->itemRepository->updateItem($request, $id);

        return redirect()->route('item-list.index')->with(['success' => trans('item.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $deleteItemResult = $this->itemRepository->deleteItem($id);
        if ($deleteItemResult) {
            return redirect()->route('item-list.index')->with(['success' => trans('item.deleted')]);
        }

        abort(500);
    }
}
