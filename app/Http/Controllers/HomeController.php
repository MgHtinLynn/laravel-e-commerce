<?php

namespace App\Http\Controllers;

use App\Http\Repository\HomeRepository;
use App\Models\Item;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var HomeRepository
     */
    private $homeRepository;

    /**
     * HomeController constructor.
     * @param  HomeRepository  $homeRepository
     */
    public function __construct(HomeRepository $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    /**
     * @param  Request  $request
     * @return Item[]|Application|Factory|View|Collection
     */
    public function home(Request $request)
    {
        if ($request->ajax()) {
            return $this->homeRepository->getItemList();
        }
        return view('home');
    }

    public function addToCart()
    {
        return view('home.add-to-card');
    }
}
