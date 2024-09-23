<?php

namespace restaurant\restaurant\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResProduct;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use restaurant\restaurant\Requests\StoreResProductRequest;
use restaurant\restaurant\Requests\UpdateResProductRequest;

class ResProductBaseController extends Controller
{
    public static $visiblePermissions = [
        'index'     => 'List',
        'create'    => 'Create Form',
        'store'     => 'Save',
        'show'      => 'Details',
        'edit'      => 'Edit Form',
        'update'    => 'Update',
        'destroy'   => 'Delete'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restaurant::res_products.index', [
            'res_products' => ResProduct::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant::res_products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResProductRequest $request)
    {
        try {
            $res_product = ResProduct::create(['uuid'=> Str::uuid()] + $request->all());
            //handle relationship store
            return redirect()->route('res_products.index')->withSuccess(__('Successfully Created'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResProduct  $res_product
     * @return \Illuminate\Http\Response
     */
    public function show(ResProduct $res_product)
    {
        return view('restaurant::res_products.show', compact('res_product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResProduct  $res_product
     * @return \Illuminate\Http\Response
     */
    public function edit(ResProduct $res_product)
    {
        return view('restaurant::res_products.edit', compact('res_product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResProductRequest  $request
     * @param  \App\Models\ResProduct  $res_product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResProductRequest $request, ResProduct $res_product)
    {
        try {
            $res_product->update($request->all());
            //handle relationship update
            return redirect()->route('res_products.index')->withSuccess(__('Successfully Updated'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResProduct  $res_product
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResProduct $res_product)
    {
        try {
            $res_product->delete();

            return redirect()->route('res_products.index')->withSuccess(__('Successfully Deleted'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}