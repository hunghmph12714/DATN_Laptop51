<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class User_FormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $ruleArr =  [
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->id)
            ],
            'phone' => 'required|numeric',
            'password' => 'required',
            'address' => 'required',
            'description' => 'required',
            'id_role' => 'required',
            'status' => 'required',
        ];
        if($this->id == null){
            $ruleArr['avatar'] = 'required|mimes:jpg,bmp,png,jpeg';
        }else{
            $ruleArr['avatar'] = 'mimes:jpg,bmp,png,jpeg';
        }
        return $ruleArr;
    }
    public function messages(){
        return [
            'name.required' => "Hãy nhập tên",
            'email.required' => "Email không được để trống",
            'email.unique' => "Email đã tồn tại",
            'phone.required' => "Hãy nhập số điện thoại",
            'phone.numeric' => "Số điện thoại không đúng định dạng",
            'password.required' => "Mật khẩu không được để trống",
            'address.required' => "Cho xin cái địa chỉ bạn ey",
            'description.required' => "Hãy ghi mô tả",
            'id_role.required' => "Hãy chọn chức vụ",
            'status.required' => "Hãy chọn trạng thái",
            'avatar.required' => 'Hãy chọn avatar',
            'avatar.mimes' => 'File ảnh sản phẩm không đúng định dạng (jpg, bmp, png, jpeg)',
        ];
    }
}