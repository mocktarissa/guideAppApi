<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // select from both Company table and 

        $companies = DB::table('companys')->select('*')
            ->where(
                'LOWER(`name`)',
                'LIKE',
                $request->input('query'),

            )->orWhere(
                'LOWER(`city`)',
                'LIKE',
                $request->input('query'),
            )->orWhereRaw(
                'LOWER(`category`)',
                'LIKE',
                $request->input('query'),
            )
            ->get();

        // $pois = DB::table('pois')->leftJoin('categories', 'categories.company_id', '=', 'pois.company_id')->select('pois.*')
        //     ->whereRaw(
        //         'lower(`categories`.`name`) LIKE ? ',
        //         '`' .
        //             strtolower($request->input('query') . '%') . '`',
        //     )->orWhereRaw(
        //         'lower(`pois`.`name`) LIKE ? ',
        //         '`' . strtolower($request->input('query') . '%') . '`',
        //     )
        //     ->get();

        return json_encode(['companies' => $companies, 'pois' => $pois]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // public function query_response(Request $request)
    // {
    //     $query =        $request->q;
    //     $val= 

    // }
}
