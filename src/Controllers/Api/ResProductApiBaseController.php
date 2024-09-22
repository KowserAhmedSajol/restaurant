<?php

namespace restaurant\restaurant\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResProduct;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class ResProductApiBaseController extends Controller
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
        $resproducts = ResProduct::latest()->get();

        return response()->json([
            'status' => true,
            'data' => $resproducts
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
            $res_product = ResProduct::create(['uuid'=> Str::uuid()] + $request->all());
            //handle relationship store
            return response()->json([
                'status' => true,
                'message' => __('Successfully Created'),
                'data' => $res_product
            ], 201);
        } catch (\Exception | QueryException $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
    *
    * @param  \App\Models\ResProduct  $res_product
    * @return \Illuminate\Http\JsonResponse
    */
    public function show(ResProduct $res_product)
    {
        return response()->json([
            'status' => true,
            'data' => $res_product
        ], 200);
    }

    /**
     * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\Request  $request
    * @param  \App\Models\ResProduct  $res_product
    * @return \Illuminate\Http\JsonResponse
    */
    public function update(Request $request, ResProduct $res_product)
    {
        try {
            $res_product->update($request->all());
            //handle relationship update
            return response()->json([
                'status' => true,
                'message' => __('Successfully Updated'),
                'data' => $res_product
            ], 200);
        } catch (\Exception | QueryException $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
    *
    * @param  \App\Models\ResProduct  $res_product
    * @return \Illuminate\Http\JsonResponse
    */
    public function destroy(ResProduct $res_product)
    {
        try {
            $res_product->delete();

            return response()->json([
                'status' => true,
                'message' => __('Successfully Deleted')
            ], 200);
        } catch (\Exception | QueryException $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }
}