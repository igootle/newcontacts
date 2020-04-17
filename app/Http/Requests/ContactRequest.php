<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      // dd($this->route('contact'));
      // dd($this->method());
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required|email',
          'address' => 'required',
          'company_id' => 'required|exists:companies,id'
        ];
    }

    public function attributes()
    {
      return [
        'company_id' => 'company',
        'email' => 'email address'
      ];
    }

    public function messages()
    {
      return [
        'email.email' => "รูปแบบ Email ไม่ถูกต้อง",
        // 'first_name.required' => "กรุณาใส่ข้อมูล ชื่อ"
        '*.required' => " กรุณาใส่ข้อมูล :attribute"
      ];
    }
}
