<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chefs = Chef::all();
        return view('backend.chefs.index', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chef =   Chef::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        return view('backend.chefs.create', compact('chef'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chef = new Chef();
        $chef->name = $request->name;
        $chef->slug = Str::slug($request->name);
        $chef->designation = $request->designation;
        $chef->save();
        $id = $chef->id;

        $attachment = Chef::find($id);
        $image = new Attachment();
        $imagestore = ($request->file('image'))->store('uploads', 'public');
        $image->attachmentable_image = $imagestore;
        $attachment->image()->save($image);

        return redirect()->route('webadmin.chefs.index')->with('success', 'New chef added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chef = Chef::find($id);
        return view('backend.chefs.show', compact('chef'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chef = Chef::findOrFail($id);
        return view('backend.chefs.edit', compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chef = Chef::find($id);
        $chef->name = $request->input('name');
        $chef->slug = Str::slug($request->name);
        $chef->designation = $request->input('designation');
        $chef->update();

        if ($files = $request->file('image')) {
            Attachment::where('attachmentable_id', $chef->id)->delete();
            $attachment = new Attachment;
            $imagestore = ($request->file('image'))->store('uploads', 'public');
            $attachment->attachmentable_image = $imagestore;
            $chef->image()->save($attachment);
        }
        return redirect()->action([ChefController::class, 'index'])->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chef $Chef)
    {
        $Chef->delete();
        return redirect()->action([ChefController::class, 'index'])->with('success', 'deleted Successfully');
    }
}
