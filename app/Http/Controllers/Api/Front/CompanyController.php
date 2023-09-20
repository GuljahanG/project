<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\Admin\CompanyResource;
use App\Http\Resources\Api\Front\CommentResource;
use App\Models\Company;

class CompanyController extends Controller
{
    //get Comments by company id
    public function comments($id){
        $company = Company::find($id);
        return CommentResource::collection($company->comments)->collection;
    }
    //get average rate of company by company id
    public function rate($id){
        $company = Company::find($id);
        $sumOfRate = $company->comments->sum('rate');
        if (count($company->comments) !== 0)
            $rate = $sumOfRate / count($company->comments);
        else
            $rate = 0;

        return $rate;
    }
    //get top 10 companies by rates
    public function top(Request $request){

        $companies = Company::with('comments')
        ->withAvg('comments', 'rate')
        ->orderBy('comments_avg_rate', 'desc')
        ->limit(10)
        ->get();

        return CompanyResource::collection($companies)->collection;

    }
}
