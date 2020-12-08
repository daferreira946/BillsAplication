<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->get('page') : 1;

        $countBills = Bill::all()->count();

        $total = Bill::all()->sum(function ($bill) {
            return $bill->type == 1 ? $bill->value * -1 : $bill->value;
        });

        $bills = Bill::query()->forPage($page, 8)->get();

        $totalPages = ceil($countBills/8);

        $previousPage = $page == 1 ? 1 : $page - 1;
        $nextPage = $page == $totalPages ? $page : $page + 1;

        return response()->json([
            'totalPages' => $totalPages,
            'previousPage' => $previousPage,
            'currentPage' => $page,
            'nextPage' => $nextPage,
            'total' => $total,
            'bills' => $bills,
        ], 200);
    }

    public function show(int $id)
    {
        $bill = Bill::find($id);

        return response()->json(['bill' => $bill], 200);
    }

    public function create(Request $request)
    {
        $bill = Bill::create($request->all());

        return response()->json(['id' => $bill->id], 200);
    }

    public function update(int $id, Request $request)
    {
        $bill = Bill::find($id);

        $bill->update($request->all());

        return response()->json(['bill' => $bill], 200);
    }

    public function destroy(int $id)
    {
        Bill::destroy($id);

        return response()->json(['id' => $id], 200);
    }
}
