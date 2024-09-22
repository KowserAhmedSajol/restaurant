<?php

namespace restaurant\restaurant\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResBilling;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use restaurant\restaurant\Requests\StoreResBillingRequest;
use restaurant\restaurant\Requests\UpdateResBillingRequest;

class ResBillingBaseController extends Controller
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
        return view('restaurant::res_billings.index', [
            'res_billings' => ResBilling::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant::res_billings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResBillingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResBillingRequest $request)
    {
        try {
            $res_billing = ResBilling::create(['uuid'=> Str::uuid()] + $request->all());
            //handle relationship store
            return redirect()->route('res_billings.index')->withSuccess(__('Successfully Created'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResBilling  $res_billing
     * @return \Illuminate\Http\Response
     */
    public function show(ResBilling $res_billing)
    {
        return view('restaurant::res_billings.show', compact('res_billing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResBilling  $res_billing
     * @return \Illuminate\Http\Response
     */
    public function edit(ResBilling $res_billing)
    {
        return view('restaurant::res_billings.edit', compact('res_billing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResBillingRequest  $request
     * @param  \App\Models\ResBilling  $res_billing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResBillingRequest $request, ResBilling $res_billing)
    {
        try {
            $res_billing->update($request->all());
            //handle relationship update
            return redirect()->route('res_billings.index')->withSuccess(__('Successfully Updated'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResBilling  $res_billing
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResBilling $res_billing)
    {
        try {
            $res_billing->delete();

            return redirect()->route('res_billings.index')->withSuccess(__('Successfully Deleted'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}