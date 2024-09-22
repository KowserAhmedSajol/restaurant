<?php

namespace restaurant\restaurant\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResOrder;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class ResOrderApiBaseController extends Controller
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
        $resorders = ResOrder::latest()->get();

        return response()->json([
            'status' => true,
            'data' => $resorders
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
            $res_order = ResOrder::create(['uuid'=> Str::uuid()] + $request->all());
            //handle relationship store
            return response()->json([
                'status' => true,
                'message' => __('Successfully Created'),
                'data' => $res_order
            ], 201);
        } catch (\Exception | QueryException $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
    *
    * @param  \App\Models\ResOrder  $res_order
    * @return \Illuminate\Http\JsonResponse
    */
    public function show(ResOrder $res_order)
    {
        return response()->json([
            'status' => true,
            'data' => $res_order
        ], 200);
    }

    /**
     * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\Request  $request
    * @param  \App\Models\ResOrder  $res_order
    * @return \Illuminate\Http\JsonResponse
    */
    public function update(Request $request, ResOrder $res_order)
    {
        try {
            $res_order->update($request->all());
            //handle relationship update
            return response()->json([
                'status' => true,
                'message' => __('Successfully Updated'),
                'data' => $res_order
            ], 200);
        } catch (\Exception | QueryException $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
    *
    * @param  \App\Models\ResOrder  $res_order
    * @return \Illuminate\Http\JsonResponse
    */
    public function destroy(ResOrder $res_order)
    {
        try {
            $res_order->delete();

            return response()->json([
                'status' => true,
                'message' => __('Successfully Deleted')
            ], 200);
        } catch (\Exception | QueryException $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }
}