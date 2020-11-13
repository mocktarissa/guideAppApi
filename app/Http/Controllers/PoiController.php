<?php

namespace App\Http\Controllers;

use App\Models\Poi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Category;
use Mockery\Undefined;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Support\Facades\File;

class PoiController extends Controller
{
    /**
     * Display a listing of the resource.
   
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
     *
     */
    public function create(Request $request)
    {
        //
        // $categories = Category::where('company_id', $request->company)
        //     ->orderBy('created_at', 'asc')
        //     ->get();
        return view('/poi/create', ['company' => $request->company]);
    }

    /**
     * Store a newly created resource in storage.
     *
     
     */
    public function store(Request $request)
    {


        //This architecture is not very efficient [needs to be modified after the MVP]
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'url' => 'required|unique:pois|',
        ]);

        $temp = $request->category;
        if ($temp == null) {
            $temp = 'nonePtridX';
        }
        $category = Category::firstOrCreate([
            'name' => $temp,
            'company_id' => $request->company,
        ]);








        $poi = new Poi;
        $poi->company_id = $request->company;
        $poi->location = $request->location;
        $poi->name = $request->name;
        $poi->description = $request->description;
        $poi->url = $request->url;
        if (null !== ($request->file('picture1'))) {
            $picture1 = $request->file('picture1')->store('pictures', 's3');
            Storage::disk('s3')->setVisibility($picture1, 'public');
            $poi->picture1 = Storage::disk('s3')->url($picture1);
        }
        if (null !== ($request->file('picture2'))) {
            $picture2 = $request->file('picture2')->store('pictures', 's3');
            Storage::disk('s3')->setVisibility($picture2, 'public');
            $poi->picture2 = Storage::disk('s3')->url($picture2);
        }
        if (null !== ($request->file('picture3'))) {
            $picture3 = $request->file('picture3')->store('pictures', 's3');
            Storage::disk('s3')->setVisibility($picture3, 'public');
            $poi->picture3 = Storage::disk('s3')->url($picture3);
        }
        if (null !== ($request->file('picture4'))) {
            $picture4 = $request->file('picture4')->store('pictures', 's3');
            Storage::disk('s3')->setVisibility($picture4, 'public');
            $poi->picture4 = Storage::disk('s3')->url($picture4);
        }
        if (null !== ($request->file('picture5'))) {
            $picture5 = $request->file('picture5')->store('pictures', 's3');
            Storage::disk('s3')->setVisibility($picture5, 'public');
            $poi->picture5 = Storage::disk('s3')->url($picture5);
        }
        if (null !== ($request->file('picture6'))) {
            $picture6 = $request->file('picture6')->store('pictures', 's3');
            Storage::disk('s3')->setVisibility($picture6, 'public');
            $poi->picture6 = Storage::disk('s3')->url($picture6);
        }

        $poi->category_id = $category->id;

        $poi->save();
        return redirect()->route('company.pois.index', [$request->company])
            ->with('success', 'Project created successfully.');
        // return view('category.test', ['pois' => $poi]);
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
    public function update(Request $request,  $company, Poi $poi)
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
        // $category_id = Category::where(['company_id' => $company, 'name' => $request->category])->first();
        $category_id =
            Category::firstOrCreate([
                'name' => $request->category,
                'company_id' => $company,
            ]);
        $poi->category_id = $category_id->id;
        // $request->category;
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
            ->with('success', 'Project deleted successfully');
    }
}
