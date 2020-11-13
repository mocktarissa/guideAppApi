<?php


namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


class CompanyController extends Controller
{
    //
    public function index(Request $request)
    {
        // list all the companies of a user
        $companies = Company::where('user_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->take(30)
            ->get();

        return view('/company/list', ['companies' => $companies]);
    }
    public function create(Request $request)
    {
        // create a new company for the specified user

        return view('/company/create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'website' => 'required|unique:companys|',
            'phone_number' => 'required|unique:companys|',

            'logo' => 'required|file',
            'city' => 'required',
            'province' => 'required',
            'neighbourhood' => 'required',
            'address_line1' => 'required',

            'address_line2' => 'required',
        ]);

        $path = $request->file('logo')->store('logos', 's3');
        Storage::disk('s3')->setVisibility($path, 'public');
        // create a new company for the specified user
        $company = new Company;
        $company->user_id = Auth::id();

        $company->city = $request->city;
        $company->province = $request->province;
        $company->neighbourhood = $request->neighbourhood; // mahalle
        $company->phone_number = $request->phone_number;
        $company->address_line1 = $request->address_line1;
        $company->address_line2 = $request->address_line2;
        $company->postal_code = $request->postal_code;
        $company->phone_number = $request->phone_number;
        $company->website = $request->website;
        $company->name = $request->name;
        $company->longlatt = $request->longlatt;
        $company->logo = Storage::disk('s3')->url($path);
        $company->save();
        //create a null category for each new company
        $category = new Category();
        $category->name = 'nonePtridX';
        $category->company_id = $company->id;
        $category->save();
        // Company::create($request->all());
        return redirect()->route('company.index',)
            ->with('success', 'Company created successfully.');
    }
    // display the edit page
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }
    public function update(Request $request, Company $company)
    {
        // update a specific company of the user
        $request->validate([
            'website' => 'required|unique:companys|',
            'phone_number' => 'required|unique:companys|',

            'logo' => 'required|file',
            'city' => 'required',
            'province' => 'required',
            'neighbourhood' => 'required',
            'address_line1' => 'required',

            'address_line2' => 'required',
        ]);
        $path =
            $request->file('logo')->store('logos', 's3');
        // $company = Company::find($company);
        $company->city = $request->city;
        $company->province = $request->province;
        $company->neighbourhood = $request->neighbourhood; // mahalle
        $company->phone_number = $request->phone_number;
        $company->address_line1 = $request->address_line1;
        $company->address_line2 = $request->address_line2;
        $company->postal_code = $request->postal_code;
        $company->phone_number = $request->phone_number;
        $company->website = $request->website;
        $company->name = $request->name;
        $company->longlatt = '';
        $company->logo =        Storage::disk('s3')->url($path);
        $company->save();
        // $company->update($request->all());

        return redirect()->route('company.index')
            ->with('success', 'Company updated successfully');
    }


    public function delete(Request $request)
    {
        // delete a specific company of that user
        return view('dashboard/signup');
    }
    public function show(Request $request, Company $company)
    {
        // // show a specific company given its id
        // $company = Company::where('id', $request->id)
        //     ->orderBy('created_at', 'asc')
        //     ->first();
        if (isset($company)) {

            if (Gate::allows('view-company', $company)) {
                // shows the current company
                //will be used to update specific companies
                return view('/company/one', ['company' => $company]);
            }
            if (Gate::denies('view-company', $company)) {
                // The current user can't viw the company...
                abort(401);
            }
        } else {
            abort(404);
        }
    }
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('company.index')
            ->with('success', 'Company deleted successfully');
    }
}
