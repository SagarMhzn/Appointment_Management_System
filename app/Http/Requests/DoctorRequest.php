<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // if ($this->isMethod('POST')) {
        //     $rules =  [
        //         'name' => 'required|max:20|string',
        //         'email' => 'required|email|unique:users|unique:users,email',
        //         'phone' => 'required|regex:/^[0-9]{10}$/|numeric|unique:clients|unique:doctors',
        //         'address' => 'required|string',
        //         'dob' => 'required|date',
        //         'photo' => 'image|mimes:jpeg,png,gif|max:2048',
        //         'license' => 'string|required',
        //         'qualifications' => 'required|string',
        //         'experience' => 'required|string',
        //         'field_of_expertize' => 'required|string',
        //     ];
       

        // } elseif ($this->isMethod('PUT' || 'PATCH')) {
        //     $rules =  [
        //         'name' => 'required|max:20|string',
        //         'address' => 'required|string',
        //         'dob' => 'required|date',
        //         'photo' => 'image|mimes:jpeg,png,gif|max:2048',
        //         'license' => 'string|required',
        //         'qualifications' => 'required|string',
        //         'experience' => 'required|string',
        //         'field_of_expertize' => 'required|string',

        //         'email'=>Rule::unique('users')->ignore($this->route('users')),
        //         // 'phone'=>Rule::unique('doctors','clients')->ignore($this->route('doctors')),
        //         'phone' => [
        //             'required',
        //             'regex:/^[0-9]{10}$/',
        //             'numeric',
        //             Rule::unique('clients')->ignore($this->route('doctors')),
        //             Rule::unique('doctors')->ignore($this->route('doctors')),
        //         ],
        //     ];
        // }
        // return $rules ?? [];

        // dd($doctor);

        $doctor = Doctor::where('doctor_id',auth()->user()->id)->first();
        $id = $doctor->id;
        $rules1 =[
            'name' => 'required|max:20|string',
            'address' => 'required|string',
            'dob' => 'required|date',
            'photo' => 'image|mimes:jpeg,png,gif|max:2048',
            'license' => 'string|required',
            'qualifications' => 'required|string',
            'experience' => 'required|string',
            'field_of_expertize' => 'required|string',
        ];
    if ($this->isMethod('POST')) {
        $rules2 =  [
            'email' => 'required|email|unique:users|unique:users,email',
            'phone' => 'required|regex:/^[0-9]{10}$/|numeric|unique:clients|unique:doctors',
        ];
    } elseif ($this->isMethod('PUT', 'PATCH')) {
        // dd($rules);
        $rules2 =  [
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($doctor->doctor_id,'id'),
            ],
            'phone' => [
                'required',
                'regex:/^[0-9]{10}$/',
                'numeric',
                'unique:doctors,phone,'.$id,
                // Rule::unique('clients')->ignore($doctor,'doctor_id'),
                // Rule::unique('doctors')->ignore($doctor,'doctor_id'),
            ],
        ];
    }
    $combinedRules = array_merge($rules1, $rules2);
    return $combinedRules ?? [];
    }
}
