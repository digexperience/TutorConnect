<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

class Tutor extends Controller
{
    public function index()
    {
        return view('learner.tutor')->with(['user' => Auth()->user()]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (
            !empty($user->region) &&
            !empty($user->province) &&
            !empty($user->municipality) &&
            !empty($user->about) &&
            !empty($user->specialties) &&
            !empty($user->specialties_description) &&
            !empty($user->highest_level_of_education) &&
            !empty($user->institution_name) &&
            !empty($user->field_of_study) &&
            !empty($user->education_start_date) &&
            !empty($user->graduation_date)
        ) {
            if ($request->filled(['jobTitle'])) {
                try {
                    $request->validate([
                        'jobTitle' => 'required|string|max:255',
                        'companyName' => 'required|string|max:255',
                        'startDate' => 'required|date',
                        'endDate' => 'required|date|after_or_equal:startDate',
                        'jobDescription' => 'required|string|max:500',
                    ]);
            
                $user->update([
                    'job_title' => $request->jobTitle,
                    'company_name' => $request->companyName,
                    'job_start_date' => $request->startDate,
                    'job_end_date' => $request->endDate,
                    'job_description' => $request->jobDescription,
                ]);

                $user->roles[0]->role = '1';
                $user->roles[0]->save();
                
                flash()->success('Success', 'Successfully switched to Tutor Account.');
                return redirect()->route('tutor.index')->with('success');

                } catch (\Exception $e) {
                    flash()->error('Error', 'Please fill in all fields if you enter a job title.');
                return back()->withInput();
                }
            }
            else {
                $user->roles[0]->role = '1';
                $user->roles[0]->save();

                flash()->success('Success', 'Successfully switched to Tutor Account.');
                return redirect()->route('tutor.dashboard')->with('success');
            }
        }
    }
}
