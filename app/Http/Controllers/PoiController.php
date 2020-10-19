<?php

namespace App\Http\Controllers;

use App\Models\Poi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Category;

class PoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //\
        $company = Company::where('id', $request->company)
            ->first();

        if (isset($company)) {
            if (Gate::allows('view-company', $company)) {
                // shows the current company
                //will be used to update specific companies

                $poi = Poi::with('category')
                    ->where('company_id', $request->company)
                    ->orderBy('created_at', 'asc')
                    ->get();
                return  view('poi.index', ['pois' => $poi, 'company' => $request->company]);
            }
            if (Gate::denies('view-company', $company)) {
                // shows the current company
                //will be used to update specific companies
                abort('401');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $categories = Category::where('company_id', $request->company)
            ->orderBy('created_at', 'asc')
            ->get();
        return view('/poi/create', ['company' => $request->company, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'url' => 'required|unique:pois|',

        ]);
        $poi = new Poi;
        $poi->company_id = $request->company;
        $poi->location = $request->location;
        $poi->name = $request->name;
        $poi->description = $request->description;
        $poi->url = $request->url;
        $poi->category_id = $request->category;
        $poi->save();
        return redirect()->route('company.pois.index', [$request->company])
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *

     */

    public function show(Request $request)
    {
        //
        $poi = Poi::where('id', $request->poi)->get()->first();

        return view('poi.show', ['poi' => $poi, 'company' => $request->company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poi  $poi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $poi =  Poi::with('category')->where('id', $request->poi)->get()->first();
        return view('poi.edit', ['poi' => $poi, 'company' => $request->company]);
    }

    /**
     * Update the specified resource in storage.
     *

     */
    public function update(Request $request, Company $company, Poi $poi)
    {
        //
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'url' => 'required',

        ]);
        // $poi = Poi::find('id', $request->poi);
        $poi->location = $request->location;
        $poi->name = $request->name;
        $poi->description = $request->description;
        $poi->url = $request->url;
        $poi->category_id = $request->category;
        $poi->save();


        return redirect()->route('company.pois.index', ['company' => $request->company])
            ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poi  $poi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Company $company, Poi $poi)
    {
        $poi->delete();

        return redirect()->route('company.pois.index', $company)
            ->with('success', 'Poi deleted successfully');
    }
}
