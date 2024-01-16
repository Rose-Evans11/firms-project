<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFarmerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'rsbsa' => 'required|unique:users',
            'firstName' => 'required',
            'middleName'=> 'nullable',
            'lastName' => 'required',
            'extensionName' => 'nullable',
            'sex'=> 'required',
            'birthdate' => 'required',
            'age'=> 'required',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'min:8', 'max:25'],
            'barangayAddress' => 'required',
            'cityAddress' => 'nullable',
            'provinceAddress' => 'nullable',
            'regionAddress' => 'nullable',
            'contactNumber' => 'nullable',
            'validID' => 'nullable',
            'validIDPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'validIDNumber'=> 'nullable',
            'isActive' => 'nullable',
            'photo' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'birthplace' => 'nullable',
            'educationID'=> 'nullable',
            'religionID'=> 'nullable',
            'civilID'=> 'nullable',
            'spouseName'=> 'nullable',
            'motherName'=> 'nullable',
            'fourPs'=> 'nullable',
            'indigenous'=> 'nullable',
            'typeIPID'=> 'nullable',
            'householdHead'=> 'nullable',
            'householdName'=> 'nullable',
            'householdRelation'=> 'nullable',
            'householdCount'=> 'nullable',
            'householdMale'=> 'nullable',
            'householdFemale'=> 'nullable',
            'farmAssociationID'=> 'nullable',
            'contactPerson'=> 'nullable',
            'emergenceNumber'=> 'nullable',
            'beneficiaries1'=> 'nullable',
            'relationBeneficiaries1'=> 'nullable',
            'beneficiaries2'=> 'nullable',
            'relationbeneficiaries2'=> 'nullable',
        ];
    }
}
