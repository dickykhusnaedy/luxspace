<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (request()->ajax()) {
			$query = Transaction::query();

			return DataTables::of($query)
				->addColumn('action', function ($item) {
					return '
						<a href="' . route('dashboard.transaction.show', $item->id) . '" class="bg-indigo-500 text-white rounded-lg px-3 py-2 m-2"><i class="fas fa-eye"></i></a>
						<a href="' . route('dashboard.transaction.edit', $item->id) . '" class="bg-black text-white font-bold rounded-lg px-3 py-2 m-2 text-sm"><i class="fas fa-edit"></i></a>
					';
				})
				->editColumn('total_price', function ($item) {
					return 'Rp' . number_format($item->total_price);
				})
				->rawColumns(['action'])
				->make();
		}
		return view('pages.dashboard.transaction.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Transaction $transaction)
	{
		if (request()->ajax()) {
			$query = TransactionItem::with(['product'])->where('transactions_id', $transaction->id);

			return DataTables::of($query)
				->editColumn('product.price', function ($item) {
					return 'Rp' . number_format($item->product->price);
				})
				->make();
		}
		return view('pages.dashboard.transaction.show', compact('transaction'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Transaction $transaction)
	{
		return view('pages.dashboard.transaction.edit', compact('transaction'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(TransactionRequest $request, Transaction $transaction)
	{
		$data = $request->all();
		$transaction->update($data);

		return redirect()->route('dashboard.transaction.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
