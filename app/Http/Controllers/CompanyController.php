<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
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
        $requestArray = $request->all();

        $validator = Validator::make($requestArray, [
            'name' => 'required',
            'email' => 'required',
            'logo' => 'required',
            'website' => 'required'
        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            return view('companies.create', compact('errors'));     
        }

        $company = Company::create($requestArray);
        return redirect()->route('companies.index');
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
        $company = Company::find($id);
        return view('companies.show', compact('company'));
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
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
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
        $requestArray = $request->all();

        $validator = Validator::make($requestArray, [
            'name' => 'required',
            'email' => 'required',
            'logo' => 'required',
            'website' => 'required'
        ]);

        $company = Company::find($id);

        if($validator->fails()){
            $errors = $validator->errors();
            return view('companies.edit', compact(['company', 'errors']));     
        }

        if(!empty($requestArray['logo']))
            $requestArray['logo'] = $this->imageUpload($requestArray['logo']);

        $company->update($requestArray);

        return redirect()->route('companies.index');
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
        $company = Company::find($id);
        $company->delete();
        return redirect()->route('companies.index');
    }

    public function imageUpload($image) {
        // Upload Image
        $image_name = preg_replace('/\s+/', '_', time() . "-" . $image->getClientOriginalName());
        $image->move('uploads', $image_name);

        // Url
        return sprintf('uploads/%s', $image_name);
    }
}
