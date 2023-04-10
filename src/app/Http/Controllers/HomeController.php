<?php

namespace App\Http\Controllers;

use App\Services\HomeService;

class HomeController extends Controller
{
    /**
     * @var HomeService
     */
    private $homeService;

    /**
     * HomeController constructor.
     *
     * @param HomeService $homeService
     */
    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }
    /**
     * Displays home website.
     *
     * @return \Illuminate\View\View
     */
    public function index() 
    {
        return view('client.index', $this->homeService->index());
    }
}
