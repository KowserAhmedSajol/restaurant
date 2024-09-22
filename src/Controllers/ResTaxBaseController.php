<?php

namespace restaurant\restaurant\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResTax;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use restaurant\restaurant\Requests\StoreResTaxRequest;
use restaurant\restaurant\Requests\UpdateResTaxRequest;

class ResTaxBaseController extends Controller
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
        return view('restaurant::restaxes.index', [
            'restaxes' => ResTax::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant::restaxes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResTaxRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResTaxRequest $request)
    {
        try {
            $res_tax = ResTax::create(['uuid'=> Str::uuid()] + $request->all());
            //handle relationship store
            return redirect()->route('res_taxes.index')->withSuccess(__('Successfully Created'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResTax  $res_tax
     * @return \Illuminate\Http\Response
     */
    public function show(ResTax $res_tax)
    {
        return view('restaurant::restaxes.show', compact('res_tax'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResTax  $res_tax
     * @return \Illuminate\Http\Response
     */
    public function edit(ResTax $res_tax)
    {
        return view('restaurant::restaxes.edit', compact('res_tax'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResTaxRequest  $request
     * @param  \App\Models\ResTax  $res_tax
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResTaxRequest $request, ResTax $res_tax)
    {
        try {
            $res_tax->update($request->all());
            //handle relationship update
            return redirect()->route('res_taxes.index')->withSuccess(__('Successfully Updated'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResTax  $res_tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResTax $res_tax)
    {
        try {
            $res_tax->delete();

            return redirect()->route('res_taxes.index')->withSuccess(__('Successfully Deleted'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}