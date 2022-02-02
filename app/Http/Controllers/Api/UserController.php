<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    public function index(){
        $request = Request::create('/api/jobs' , 'GET');
        $response = Route::dispatch($request);
        $responseBody = json_decode($response->getContent(), true);
        $data['jobs'] = $responseBody['data'];
        return view('user/index', $data);
    }

    public function jobs(){
        $request = Request::create('/api/jobs' , 'GET');
        $response = Route::dispatch($request);
        $responseBody = json_decode($response->getContent(), true);
        $data['jobs'] = $responseBody['data'];
        return view('user.jobs', $data);
    }

    public function jobDetails($slug){
        $request = Request::create('/api/job-detail/'.$slug , 'GET');
        $response = Route::dispatch($request);
        $responseBody = json_decode($response->getContent(), true);
        $data['jobDetails'] = $responseBody['data'];
        return view('user.job_details', $data);
    }
    public function userDetail($id)
    {
        $applicant = User::where('user_type', 'user')->where('id', $id)->first();
        return view('user.user_detail', compact('applicant'));
    }

}
