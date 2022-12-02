<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ZipCodeRule;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'lastname' => 'required|max:255',
            'firstname' => 'required|max:255',
            'gender' => 'required',
            'email' => 'required|email|max:255',
            'postcode' => ['required', new ZipCodeRule()],
            'address' => 'required|max:255',
            'building_name' => 'max:255',
            'opinion' => 'required|max:120',
        ];
    }
    public function messages()
    {
        return [
            'lastname.required' => '苗字を入力してください',
            'lastname.max:255' => '苗字は255文字以下で入力してください',
            'firstname.required' => '名前を入力してください',
            'firstname.max:255' => '名前は255文字以下で入力してください',
            'gender.required' => '性別を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'email.max:255' => 'メールアドレスは255文字以下で入力してください',
            'postcode.required' => '郵便番号を入力してください',
            'address.required' => '住所を入力してください',
            'address.max:255' => '住所は255文字以下で入力してください',
            'building_name.max:255' => '建物名は255文字以下で入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.max:120' => 'ご意見は120文字以下で入力してください',
        ];
    }
}
