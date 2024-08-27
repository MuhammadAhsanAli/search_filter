<?php
namespace App\Http\Controllers;

use App\Services\CustomerSearchService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    private CustomerSearchService $customerSearchService;

    public function __construct(CustomerSearchService $customerSearchService)
    {
        $this->customerSearchService = $customerSearchService;
    }

    /**
     * Search for customers.
     *
     * @param Request $request
     * @return View
     */
    public function search(Request $request): View
    {
        $perPage = $request->input('per_page', 10);
        $customers = $this->customerSearchService->search(
            $request->input('email'),
            $request->input('order_number'),
            $request->input('item_name'),
            $perPage
        );

        return view('customers.index', compact('customers'));
    }
}
