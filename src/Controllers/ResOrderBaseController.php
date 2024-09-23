<?php

namespace restaurant\restaurant\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResOrder;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use restaurant\restaurant\Requests\StoreResOrderRequest;
use restaurant\restaurant\Requests\UpdateResOrderRequest;

class ResOrderBaseController extends Controller
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
        return view('restaurant::res_orders.index', [
            'res_orders' => ResOrder::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant::res_orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResOrderRequest $request)
    {
        try {
            $res_order = ResOrder::create(['uuid'=> Str::uuid()] + $request->all());
            //handle relationship store
            return redirect()->route('res_orders.index')->withSuccess(__('Successfully Created'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResOrder  $res_order
     * @return \Illuminate\Http\Response
     */
    public function show(ResOrder $res_order)
    {
        return view('restaurant::res_orders.show', compact('res_order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResOrder  $res_order
     * @return \Illuminate\Http\Response
     */
    public function edit(ResOrder $res_order)
    {
        return view('restaurant::res_orders.edit', compact('res_order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResOrderRequest  $request
     * @param  \App\Models\ResOrder  $res_order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResOrderRequest $request, ResOrder $res_order)
    {
        try {
            $res_order->update($request->all());
            //handle relationship update
            return redirect()->route('res_orders.index')->withSuccess(__('Successfully Updated'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResOrder  $res_order
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResOrder $res_order)
    {
        try {
            $res_order->delete();

            return redirect()->route('res_orders.index')->withSuccess(__('Successfully Deleted'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}