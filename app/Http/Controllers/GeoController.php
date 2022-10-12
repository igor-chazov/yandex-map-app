<?php

namespace App\Http\Controllers;

use App\Models\Geo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class GeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $geos = Geo::all();

        return view('/geos', ['geos' => $geos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'longitude' => 'required|numeric|regex:/^\d{2}.\d{6}$/',
            'Latitude' => 'required|numeric|regex:/^\d{2}.\d{6}$/',
        ]);

        $geo = new Geo();
        $geo->name = $request->name;
        $geo->longitude = $request->longitude;
        $geo->Latitude = $request->Latitude;
        $geo->user_id = auth()->user()->id;
        $geo->save();
        return redirect('/geos')->with('success', 'Запись успешно сохранена.');
    }

    /**
     * Display the specified resource.
     *
     * @param Geo $geo
     * @return Response
     */
    public function show(Geo $geo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Geo $geo
     * @return Application|Factory|View
     */
    public function edit(Geo $geo)
    {
        if (auth()->user()->id === $geo->user_id) {
            return view('edit', compact('geo'));
        } else {
            return redirect('/geos');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Geo $geo
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'longitude' => 'required|numeric',
            'Latitude' => 'required|numeric',
        ]);
        $geo = Geo::find($id);
        $geo->name = $request->name;
        $geo->longitude = $request->longitude;
        $geo->Latitude = $request->Latitude;
        $geo->user_id = auth()->user()->id;
        $geo->save();
        return redirect('/geos')->with('success', 'Запись успешно сохранена.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Geo $geo
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $geo = Geo::find($id);
        $geo->delete();
        return redirect('/geos')->with('success', 'Запись успешно удалена');
    }
}
