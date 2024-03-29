<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
{

    public function authorize()
    {
        return abilities()->contains('update_admins');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('admin')->id;

        return [
            'name'     => ['required', 'string', 'max:255'],
            'phone'    => ['nullable','numeric','unique:admins,id,' . $id ],
            'email'    => ['required','string','email','unique:admins,id,' . $id ],
            'roles'    => ['required','array','min:1'],
            'password' => ['nullable','exclude_if:password,null','string','min:6','max:255','confirmed'],
            'password_confirmation' => ['nullable','exclude_if:password_confirmation,null','same:password'],
            'photo_identification'  => ['bail', 'nullable', 'file', 'mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf','max:4096'],
        ];
    }
}
