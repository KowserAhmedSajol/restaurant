<?php

namespace restaurant\restaurant\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use restaurant\restaurant\Models\ResCategory;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use restaurant\restaurant\Requests\StoreResCategoryRequest;
use restaurant\restaurant\Requests\UpdateResCategoryRequest;
use Illuminate\Support\Facades\Storage;


class ResCategoryBaseController extends Controller
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
        return view('restaurant::res_categories.index', [
            'res_categories' => ResCategory::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurant::res_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResCategoryRequest $request)
    {
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/res_categories', $imageName, 'public');
            }
            
            // Generate the slug from the name
            $slug = Str::slug($request->name, '-');
            
            // Create the ResCategory with image path and slug if available
            $resCategoryData = [
                'uuid' => Str::uuid(),
                'slug' => $slug,  // Add the generated slug here
            ] + $request->all();
            
            // Add image path to the data array if an image was uploaded
            if (isset($imagePath)) {
                $resCategoryData['image'] = $imagePath;
            }
            
            // Save the ResCategory with all data
            $res_category = ResCategory::create($resCategoryData);
            //handle relationship store
            return redirect()->route('res_categories.index')->withSuccess(__('Successfully Created'));
        } catch (\Exception | QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResCategory  $res_category
     * @return \Illuminate\Http\Response
     */
    public function show(ResCategory $res_category)
    {
        return view('restaurant::res_categories.show', compact('res_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResCategory  $res_category
     * @return \Illuminate\Http\Response
     */
    public function edit(ResCategory $res_category)
    {
        return view('restaurant::res_categories.edit', compact('res_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResCategoryRequest  $request
     * @param  \App\Models\ResCategory  $res_category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResCategoryRequest $request, ResCategory $res_category)
    {
        try {
            // Check if a new image is uploaded
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($res_category->image) {
                    Storage::disk('public')->delete($res_category->image);
                }
            
                // Upload the new image
                $image = $request->file('image');
                $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('images/res_categories', $imageName, 'public');
                
                // Add the new image path to the update data
                $requestData = $request->all();
                $requestData['image'] = $imagePath;
            } else {
                // If no image is uploaded, just update the other data
                $requestData = $request->all();
            }
            
            // Generate the slug from the name and add it to the request data
            $requestData['slug'] = Str::slug($request->name, '-');
            
            // Update the ResCategory record with the new data
            $res_category->update($requestData);
    
            // Handle relationship update (if necessary)
            // Add any relationship update logic here
    
            // Redirect with success message
            return redirect()->route('res_categories.index')->withSuccess(__('Successfully Updated'));
        } catch (\Exception | QueryException $e) {
            // Redirect back with error message
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResCategory  $res_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResCategory $res_category)
{
    try {
        // Check if the category has an image
        if ($res_category->image) {
            // Delete the image from the storage
            Storage::disk('public')->delete($res_category->image);
        }

        // Delete the ResCategory record
        $res_category->delete();

        // Redirect with success message
        return redirect()->route('res_categories.index')->withSuccess(__('Successfully Deleted'));
    } catch (\Exception | QueryException $e) {
        // Redirect back with error message
        return redirect()->back()->withInput()->withErrors($e->getMessage());
    }
}

}