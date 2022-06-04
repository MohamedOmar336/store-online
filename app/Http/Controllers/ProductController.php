<?php

namespace App\Http\Controllers;

use App\Enums\EnumsSettings;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $records = Product::all();
        return view('pages.products.list', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $record = Product::create($request->except('_token', 'image'));

        if ($request->hasFile('image') && $request->image) {
            $path = 'Product';
            $image = uploadImage($request->file('image'), $path);
            $record->update(['image' => $image]);
        } else {
            $record->update(['image' => EnumsSettings::DefaultImagePath]);
        }

        session()->flash('success', __('messages.added_successfully'));
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $companies = Company::select('id', 'name_' . app()->getLocale() . ' as name')->get();
        $statuses = Status::select('id', 'name_' . app()->getLocale() . ' as name')->get();
        $units = Unit::select('id', 'name_' . app()->getLocale() . ' as name')->get();
        $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();
        $tags = Tag::select('id', 'name_' . app()->getLocale() . ' as name')->get();
        $record = Product::find($id);
        return view('pages.products.show', compact('record', 'companies', 'statuses', 'units', 'categories', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $companies = Company::select('id', 'name_' . app()->getLocale() . ' as name')->get();
        $statuses = Status::select('id', 'name_' . app()->getLocale() . ' as name')->get();
        $units = Unit::select('id', 'name_' . app()->getLocale() . ' as name')->get();
        $categories = Category::select('id', 'name_' . app()->getLocale() . ' as name')->get();
        $tags = Tag::select('id', 'name_' . app()->getLocale() . ' as name')->get();
        $record = Product::find($id);
        return view('pages.products.edit', compact('record', 'companies', 'statuses', 'units', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        $record = Product::find($id);
        $record->update($request->except('_token', '_method'));
        session()->flash('success', __('messages.updated_successfully'));
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $record = Product::find($id);
        $record->delete();
        session()->flash('success', __('messages.deleted_successfully'));
        return redirect(route('products.index'));
    }

}

?>
