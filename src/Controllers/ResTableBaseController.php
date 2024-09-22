<?php

namespace restaurant\restaurant\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResTable;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use restaurant\restaurant\Requests\StoreResTableRequest;
use restaurant\restaurant\Requests\UpdateResTableRequest;

class ResTableBaseController extends Controller
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
        return view('restaurant::restables.index', [
            'restables' => ResTable::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant::restables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResTableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResTableRequest $request)
    {
        try {
            $res_table = ResTable::create(['uuid'=> Str::uuid()] + $request->all());
            //handle relationship store
            return redirect()->route('res_tables.index')->withSuccess(__('Successfully Created'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResTable  $res_table
     * @return \Illuminate\Http\Response
     */
    public function show(ResTable $res_table)
    {
        return view('restaurant::restables.show', compact('res_table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResTable  $res_table
     * @return \Illuminate\Http\Response
     */
    public function edit(ResTable $res_table)
    {
        return view('restaurant::restables.edit', compact('res_table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResTableRequest  $request
     * @param  \App\Models\ResTable  $res_table
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResTableRequest $request, ResTable $res_table)
    {
        try {
            $res_table->update($request->all());
            //handle relationship update
            return redirect()->route('res_tables.index')->withSuccess(__('Successfully Updated'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResTable  $res_table
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResTable $res_table)
    {
        try {
            $res_table->delete();

            return redirect()->route('res_tables.index')->withSuccess(__('Successfully Deleted'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}