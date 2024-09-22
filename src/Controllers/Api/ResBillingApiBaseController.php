<?php

namespace restaurant\restaurant\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResBilling;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class ResBillingApiBaseController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Response status code
    |--------------------------------------------------------------------------
    | 201 response with created data
    | 200 update/list/show/delete
    | 204 deleted response with no content
    | 500 internal server or db error
    */

    public static $visiblePermissions = [
        'index'     => 'List',
        'create'    => 'Create Form',
        'store'     => 'Save',
        'show'      => 'Details',
        'update'    => 'Update',
        'destroy'   => 'Delete'
    ];

    /**
     * Display a listing of the resource.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function index()
    {
        $resbillings = ResBilling::latest()->get();

        return response()->json([
            'status' => true,
            'data' => $resbillings
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\Request  $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function store(Request $request)
    {
        try {
            $res_billing = ResBilling::create(['uuid'=> Str::uuid()] + $request->all());
            //handle relationship store
            return response()->json([
                'status' => true,
                'message' => __('Successfully Created'),
                'data' => $res_billing
            ], 201);
        } catch (\Exception | QueryException $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
    *
    * @param  \App\Models\ResBilling  $res_billing
    * @return \Illuminate\Http\JsonResponse
    */
    public function show(ResBilling $res_billing)
    {
        return response()->json([
            'status' => true,
            'data' => $res_billing
        ], 200);
    }

    /**
     * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\Request  $request
    * @param  \App\Models\ResBilling  $res_billing
    * @return \Illuminate\Http\JsonResponse
    */
    public function update(Request $request, ResBilling $res_billing)
    {
        try {
            $res_billing->update($request->all());
            //handle relationship update
            return response()->json([
                'status' => true,
                'message' => __('Successfully Updated'),
                'data' => $res_billing
            ], 200);
        } catch (\Exception | QueryException $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
    *
    * @param  \App\Models\ResBilling  $res_billing
    * @return \Illuminate\Http\JsonResponse
    */
    public function destroy(ResBilling $res_billing)
    {
        try {
            $res_billing->delete();

            return response()->json([
                'status' => true,
                'message' => __('Successfully Deleted')
            ], 200);
        } catch (\Exception | QueryException $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }
}