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
        $picture1 = $request->file('picture1')->store('pictures', 's3');
        $picture2 = $request->file('picture2')->store('pictures', 's3');
        $picture3 = $request->file('picture3')->store('pictures', 's3');
        $picture4 = $request->file('picture4')->store('pictures', 's3');
        $picture5 = $request->file('picture5')->store('pictures', 's3');
        $picture6 = $request->file('picture6')->store('pictures', 's3');

        // $extension1 = $picture1->getClientOriginalExtension();
        // $extension2 = $picture2->getClientOriginalExtension();
        // $extension3 = $picture3->getClientOriginalExtension();
        // $extension4 = $picture4->getClientOriginalExtension();
        // $extension5 = $picture5->getClientOriginalExtension();
        // $extension6 = $picture6->getClientOriginalExtension();
        Storage::disk('s3')->setVisibility($picture1, 'public');
        Storage::disk('s3')->setVisibility($picture2, 'public');
        Storage::disk('s3')->setVisibility($picture3, 'public');
        Storage::disk('s3')->setVisibility($picture4, 'public');
        Storage::disk('s3')->setVisibility($picture5, 'public');
        Storage::disk('s3')->setVisibility($picture6, 'public');


        // $path1 = Storage::putFile('public/poiPictures', new \Illuminate\Http\File($request->file('picture1')), 'public');
        // $path2 = Storage::putFile('public/poiPictures', new \Illuminate\Http\File($request->file('picture2')), 'public');
        // $path3 = Storage::putFile('public/poiPictures', new \Illuminate\Http\File($request->file('picture3')), 'public');
        // $path4 = Storage::putFile('public/poiPictures', new \Illuminate\Http\File($request->file('picture4')), 'public');
        // $path5 = Storage::putFile('public/poiPictures', new \Illuminate\Http\File($request->file('picture5')), 'public');
        // $path6 = Storage::putFile('public/poiPictures', new \Illuminate\Http\File($request->file('picture6')), 'public');
        $poi = new Poi;
        $poi->company_id = $request->company;
        $poi->location = $request->location;
        $poi->name = $request->name;
        $poi->description = $request->description;
        $poi->url = $request->url;

        $poi->picture1 = Storage::disk('s3')->url($picture1);
        $poi->picture2 = Storage::disk('s3')->url($picture2);
        $poi->picture3 = Storage::disk('s3')->url($picture3);
        $poi->picture4 = Storage::disk('s3')->url($picture4);
        $poi->picture5 = Storage::disk('s3')->url($picture5);
        $poi->picture6 = Storage::disk('s3')->url($picture6);
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
            ->with('success', 'Project deleted successfully');
    }
}
