<?php

namespace restaurant\restaurant\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResCategory;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class ResCategoryApiBaseController extends Controller
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
        $rescategories = ResCategory::latest()->get();

        return response()->json([
            'status' => true,
            'data' => $rescategories
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
            $res_category = ResCategory::create(['uuid'=> Str::uuid()] + $request->all());
            //handle relationship store
            return response()->json([
                'status' => true,
                'message' => __('Successfully Created'),
                'data' => $res_category
            ], 201);
        } catch (\Exception | QueryException $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
    *
    * @param  \App\Models\ResCategory  $res_category
    * @return \Illuminate\Http\JsonResponse
    */
    public function show(ResCategory $res_category)
    {
        return response()->json([
            'status' => true,
            'data' => $res_category
        ], 200);
    }

    /**
     * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\Request  $request
    * @param  \App\Models\ResCategory  $res_category
    * @return \Illuminate\Http\JsonResponse
    */
    public function update(Request $request, ResCategory $res_category)
    {
        try {
            $res_category->update($request->all());
            //handle relationship update
            return response()->json([
                'status' => true,
                'message' => __('Successfully Updated'),
                'data' => $res_category
            ], 200);
        } catch (\Exception | QueryException $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
    *
    * @param  \App\Models\ResCategory  $res_category
    * @return \Illuminate\Http\JsonResponse
    */
    public function destroy(ResCategory $res_category)
    {
        try {
            $res_category->delete();

            return response()->json([
                'status' => true,
                'message' => __('Successfully Deleted')
            ], 200);
        } catch (\Exception | QueryException $e) {
            return response()->json([$e->getMessage()], 500);
        }
    }
}