<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

class Profile extends Controller
{
    public function index()
    {
        return view('profile')->with(['user' => Auth()->user()]);
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            if ($request->filled('active_tab')) {
                session(['active_tab' => $request->active_tab]);
            }
            else {
                session(['active_tab' => 'profile-overview']);
            }

            if ($request->filled(['fname', 'lname', 'email'])) {
                $request->validate([
                    'fname' => 'required|string|min:3|max:255|regex:/^[\pL\s\-\.]+$/u',
                    'mi' => 'nullable|string|max:2|regex:/^[\pL\s\-\.]+$/u',
                    'lname' => 'required|string|min:2|max:255|regex:/^[\pL\s\-\.]+$/u',
                    'email' => 'required|string|email|max:255',
                ]);
    
                $user->update([
                    'fname' => $request->fname,
                    'mi' => $request->mi ?? '',
                    'lname' => $request->lname,
                    'email' => $request->email,
                ]);
    
                flash()->success('Success', 'Profile updated successfully!');
                return back();
            }

            if ($request->filled(['currentpassword', 'newpassword', 'renewpassword'])) {
                $request->validate([
                    'currentpassword' => 'required|string|min:8|regex:/^\S*$/u',
                    'newpassword' => 'required|string|min:8|regex:/^\S*$/u',
                    'renewpassword' => 'required|string|same:newpassword'
                ]);
    
                if (Hash::check($request->currentpassword, $user->password)) {
                    $user->update(['password' => Hash::make($request->newpassword)]);
                    flash()->success('Success', 'Password changed successfully!');
                    return back();
                } else {
                    flash()->error('Error', 'Current password is incorrect.');
                    return back()->withInput();
                }
            }

            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);

                if ($user->image) {
                    $path = public_path('/assets/images/');
                    $image_old = $path . $user->image;

                    if (file_exists($image_old)) {
                        unlink($image_old);
                    }
                }

                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('assets/images'), $imageName);
                $user->image = $imageName;
                $user->save();

                flash()->success('Success', 'Profile picture updated successfully!');
                return back();
            }

            if ($request->filled(['firstName', 'lastName', 'Temail', 'Tdob', 'region', 'province', 'municipality', 'about'])) {
                $request->validate([
                    'firstName' => 'required|string|min:3|max:255|regex:/^[\pL\s\-\.]+$/u',
                    'middleInitial' => 'nullable|string|max:2|regex:/^[\pL\s\-\.]+$/u',
                    'lastName' => 'required|string|min:2|max:255|regex:/^[\pL\s\-\.]+$/u',
                    'Temail' => 'required|string|email|max:255',
                    'Tdob' => 'required|date',
                    'region' => 'required|string|max:255',
                    'province' => 'required|string|max:255',
                    'municipality' => 'required|string|max:255',
                    'about' => 'required|string|min:20|max:500',
                ]);
    
            $user->update([
                'fname' => $request->firstName,
                'mi' => $request->middleInitial ?? '',
                'lname' => $request->lastName,
                'email' => $request->Temail,
                'date_of_birth' => $request->Tdob,
                'region' => $request->region,
                'province' => $request->province,
                'municipality' => $request->municipality,
                'about' => $request->about,
            ]);

                session(['next' => "2"]);
                return back();
            }

            if ($request->filled(['specialty', 'specialties_description'])) {
                $request->validate([
                    'specialty' => 'required|string|max:255',
                    'specialties_description' => 'required|string|min:10|max:500',
                ]);

            $user->update([
                'specialties' => $request->specialty,
                'specialties_description' => $request->specialties_description,
            ]);

                session(['next' => "3"]);
                return back();
            }

            if ($request->filled(['highestEducation', 'institutionName', 'fieldOfStudy', 'TstartDate', 'graduationDate'])) {
                $request->validate([
                    'highestEducation' => 'required|string|max:255',
                    'institutionName' => 'required|string|max:255',
                    'fieldOfStudy' => 'required|string|max:255',
                    'TstartDate' => 'required|date',
                    'graduationDate' => 'required|date|after_or_equal:TstartDate',
                ]);
            
                $user->update([
                    'highest_level_of_education' => $request->highestEducation,
                    'institution_name' => $request->institutionName,
                    'field_of_study' => $request->fieldOfStudy,
                    'education_start_date' => $request->TstartDate,
                    'graduation_date' => $request->graduationDate,
                ]);
            
                session(['next' => "4"]);
                return back();
            }
            

            flash()->info('Info', 'No changes were made.');
            return back();
            
        } catch (\Exception $e) {
            flash()->error('Error', 'An unexpected error occurred. Please try again.');
            return back()->withInput();
        }
    }
}
