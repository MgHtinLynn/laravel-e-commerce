<?php

namespace App\Http\Controllers;

use App\Http\Repository\CustomerRepository;
use App\Http\Resources\CustomerResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CustomerController extends Controller
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;
    private $paginate;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->paginate = config('e-shop.paginate');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return Application|Factory|View|AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->input('per_page') && (!empty($request->input('per_page')))) {
                $this->paginate = $request->input('per_page');
            }
            $customerList = $this->customerRepository->getUserList($this->paginate);

            return CustomerResource::collection($customerList);
        }
        return view('customer.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $customer = $this->customerRepository->findById($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $this->customerRepository->updateCustomer($request, $id);

        return redirect()->route('customer-list.index')->with(['success' => trans('customer.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): ?RedirectResponse
    {
        $deleteCustomerResult = $this->customerRepository->deleteCustomer($id);
        if ($deleteCustomerResult) {
            return redirect()->route('customer-list.index')->with(['success' => trans('admin.deleted')]);
        }

        abort(500);
    }
}
