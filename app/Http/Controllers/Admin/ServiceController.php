<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Attachment;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('backend.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $service = new Service();
       
        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();
        $id = $service->id;
// dd($service);
        $attachment = Service::find($id);
        $image = new Attachment();
        $imagestore = ($request->file('image'))->store('uploads', 'public');
        $image->attachmentable_image = $imagestore;
        $attachment->image()->save($image);

        return redirect()->route('webadmin.services.index')->with('success', 'New service added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('backend.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('backend.services.edit', compact('service'));
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
        $service = Service::find($id);
        $service->title = $request->input('title');
      
        $service->description = $request->input('description');
        $service->update();

        if ($files = $request->file('image')) {
            Attachment::where('attachmentable_id', $service->id)->delete();
            $attachment = new Attachment;
            $imagestore = ($request->file('image'))->store('uploads', 'public');
            $attachment->attachmentable_image = $imagestore;
            $service->image()->save($attachment);
        }
        return redirect()->action([ServiceController::class, 'index'])->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $Service)
    {
        $Service->delete();
        return redirect()->action([ServiceController::class, 'index'])->with('success', 'deleted Successfully');
    }
}
