<?php

namespace App\Http\Controllers\Api;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ResourceTrait;
use App\Traits\ApiReturnFormatTrait;
use App\Models\ApplicantProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



class AuthController extends Controller
{
    use ResourceTrait;

    public function form()
    {
        return view('auth.user-login');
    }
    public function registration()
    {
        return view('auth.user-registration');
    }
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'phone' => 'required',
                'password' => 'required',
            ]);

            $user = User::wherePhone($request->phone)->where('user_type','user')->first();
            if (blank($user)) :
                return redirect()->back()->with('error', 'User not found');
            endif;

            if($user->status == 0) :
                return redirect()->back()->with('error', 'Your account is invalid');
            elseif($user->status == 2):
                return redirect()->back()->with('error', 'Your account is banned');
            endif;
            if (!Hash::check($request->get('password'), $user->password)) :
                return redirect()->back()->with('error', 'Invalid credential');
            endif;

            $credentials = ['phone'=>$request->phone, 'password'=>$request->password];

            if (Auth::attempt($credentials)) {

                return redirect()->route('view.jobs');
            }
            return redirect()->back()->with('error', 'Invalid Credentials');

        } catch (\Exception $e){
            return redirect()->back()->withInput();
        }
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'phone' => 'required|max:15|min:11|unique:users,phone,'.\Request()->id,
            'email' => 'required|email|max:40|unique:users,email,'.\Request()->id,
            'password' => 'required|min:4',
            'image' => 'mimes:jpg,JPG,JPEG,jpeg,png,PNG|max:5120',
            'cv' => 'mimes:pdf,PDF|max:5120',
            'about' => 'max:250',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Required field missing');
        }
            $user = new User();
            $this->save($request, $user);
            return redirect('/user-login')->with('success', 'Successfully registered');

    }

    public function save($request, $user, $update = false)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        if (!blank($request->file('image'))) :
            if ($update):
                $this->deleteImage($user->image);
            endif;
            $requestImage   = $request->file('image');
            $user->image = $this->saveImage($requestImage) ?? [];
        endif;

        $user->save();

        $profile = $update ? $user->profile : new ApplicantProfile();
        $this->saveProfile($request, $user, $profile, $update);
    }

    public function saveProfile($request, $user, $profile, $update = false)
    {

        if (!blank($request->file('cv'))) :
            if ($update):
                $this->deleteFile($profile->cv);
            endif;
            $requestfile   = $request->file('cv');
            $profile->cv = $this->saveFile($requestfile) ?? [];
        endif;
        $profile->user_id = $user->id;
        $profile->about = $request->about;
        $profile->save();
    }

    public function getProfile($user)
    {
        $data['id'] = $user->id;

        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['phone'] = $user->phone;
        return $data;
    }

    public function applyJob($jobId){
            $user = Auth::authenticate();
            $job = Job::where('status',1)->where('id', $jobId)->first();
            if ($job != ''):
                if ($user->jobs()->find($jobId) == ''):
                    $user->jobs()->attach($jobId);
                    return back()->with('message', 'Applied successfully');
                else:
                    return back()->with('message', 'Already Applied');
                endif;
            else:
                return back()->with('message', 'Not Found');
            endif;

    }
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('/user-login');
    }
}
