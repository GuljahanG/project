<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\Api\Admin\CompanyResource;
use Illuminate\Support\Facades\Storage;
use File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::get();
        return CompanyResource::collection($companies)->collection;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        // Upload and save the avatar file
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        } else {
            $logoPath = null;
        }

        // Create the user
        $company = Company::create([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $logoPath,
        ]);

        return CompanyResource::make($company);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return CompanyResource::make($company);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        // Upload and save the updated avatar file
        if ($request->hasFile('logo')) {
            if ($company->logo)
                Storage::disk('public')->delete($company->logo);
            $logoPath = $request->file('logo')->store('logos', 'public');
        } else {
            $logoPath = $company->logo;
        }

        // Update the user's information
        $company->update([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $logoPath,
        ]);

        return CompanyResource::make($company);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if ($company) {
            $company->comments->each(function ($comment) {
                $comment->delete();
            });
            $company->delete();
            return response()->json(['success' => true]);
        }
    }
}
