<?php

namespace restaurant\restaurant\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResOrderItem;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use restaurant\restaurant\Requests\StoreResOrderItemRequest;
use restaurant\restaurant\Requests\UpdateResOrderItemRequest;

class ResOrderItemBaseController extends Controller
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
        return view('restaurant::res_order_items.index', [
            'res_order_items' => ResOrderItem::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant::res_order_items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResOrderItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResOrderItemRequest $request)
    {
        try {
            $res_order_item = ResOrderItem::create(['uuid'=> Str::uuid()] + $request->all());
            //handle relationship store
            return redirect()->route('res_order_items.index')->withSuccess(__('Successfully Created'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResOrderItem  $res_order_item
     * @return \Illuminate\Http\Response
     */
    public function show(ResOrderItem $res_order_item)
    {
        return view('restaurant::res_order_items.show', compact('res_order_item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResOrderItem  $res_order_item
     * @return \Illuminate\Http\Response
     */
    public function edit(ResOrderItem $res_order_item)
    {
        return view('restaurant::res_order_items.edit', compact('res_order_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResOrderItemRequest  $request
     * @param  \App\Models\ResOrderItem  $res_order_item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResOrderItemRequest $request, ResOrderItem $res_order_item)
    {
        try {
            $res_order_item->update($request->all());
            //handle relationship update
            return redirect()->route('res_order_items.index')->withSuccess(__('Successfully Updated'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResOrderItem  $res_order_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResOrderItem $res_order_item)
    {
        try {
            $res_order_item->delete();

            return redirect()->route('res_order_items.index')->withSuccess(__('Successfully Deleted'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}