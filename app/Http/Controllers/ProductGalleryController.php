<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGalleryRequest;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductGalleryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Product $product)
	{
		if (request()->ajax()) {
			$query = ProductGallery::query();

			return DataTables::of($query)
				->addColumn('action', function ($item) {
					return '
						<form class="inline-block" action="' . route('dashboard.product.gallery.destroy', $item->id) . '" method="post">
							<button class="bg-red-500 text-white font-bold rounded-lg px-3 py-2 m-2 text-sm"><i class="fas fa-trash"></i></button>
						' . method_field('delete') . csrf_field() . '
						</form>
					';
				})
				->editColumn('url', function ($item) {
					return '<img style="max-width="30px" class="rounded-lg" src="' . Storage::url($item->url) . '" />';
				})
				->editColumn('is_featured', function ($item) {
					return $item->is_featured ? 'Yes' : 'No';
				})
				->rawColumns(['action', 'url'])
				->make();
		}
		return view('pages.dashboard.gallery.index', compact('product'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Product $product)
	{
		return view('pages.dashboard.gallery.create', compact('product'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ProductGalleryRequest $request, Product $product)
	{
		$files = $request->file('files');
		if ($request->hasFile('files')) {
			foreach ($files as $file) {
				$path = $file->store('public/gallery');

				ProductGallery::create([
					'products_id' => $product->id,
					'url'         => $path
				]);
			}
		}
		return redirect()->route('dashboard.product.gallery.index', $product->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(ProductGallery $gallery)
	{
		$gallery->delete();

		return redirect()->route('dashboard.product.gallery.index', $gallery->id);
	}
}
