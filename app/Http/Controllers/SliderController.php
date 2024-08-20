<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::all();
        $data = [
            'slider'=>$slider
        ];
        return view('SLIDER.index-slider', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('SLIDER.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slider = new Slider();
        if ($request->hasFile('imgslider')) {
            $filename = time().'.'.$request->imgslider->getClientOriginalName();
            $request->imgslider->move(public_path('images/slider'), $filename);
            $slider->imgslider = $filename;
        }
        $slider->save();
        return redirect()->route('slider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::find($id);
        $data = [
            'slider'=>$slider
        ];
        return view('SLIDER.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::find($id);
        if ($request->hasFile('imgslider')) {
            $filename = time().'.'.$request->imgslider->getClientOriginalName();
            $request->imgslider->move(public_path('images/slider'), $filename);
            $slider->imgslider = $filename;
        }
        $slider->save();
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eliminar = Slider::find($id);
        $eliminar->delete();
        return redirect()->route('slider.index');
    }
}
