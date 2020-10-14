<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use Illuminate\Support\Facades\Gate;

class CompanyController extends Controller
{
    //
    public function list(Request $request)
    {
        // list all the companies of a user
        $companies = Company::where('user_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->take(10)
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
            'phone' => 'required|unique:companys|',
            'address' => 'required'
        ]);
        // create a new company for the specified user
        $company = new Company;
        $company->user_id = Auth::id();
        $company->address = $request->address;
        $company->phone_number = $request->phone_number;
        $company->website = $request->website;
        $company->name = $request->name;
        $company->longlatt = '';
        $company->save();
        // Company::create($request->all());
        return view('/company/create');
    }

    public function update(Request $request)
    {
        // update a specific company of the user

        return view('/dashboard/dashboard');
    }


    public function delete(Request $request)
    {
        // delete a specific company of that user
        return view('dashboard/signup');
    }
    public function view_one(Request $request)
    {
        // show a specific company given its id
        $company = Company::where('id', $request->id)
            ->orderBy('created_at', 'asc')
            ->first();
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
}
