<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
        return [
            'task_assigner'=>'required',
            'task_receiver'=>'required',
            'task_desc'=>'required',
            'task_name'=>'required|max:255|unique:tasks',
            'expired_at'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'task_assigner.required'=>'Có lỗi xảy ra với người giao task',
            'task_receiver.required'=>'Bạn chưa nhập tên người nhận task',
            'task_name.unique'=>'Tên Task đã có, xin nhập tên khác',
            'task_name.required'=>'Bạn chưa nhập tên Task',
            'expired_at.required'=>'Bạn chưa nhập ngày hết hạn của task',
            'task_desc.required'=>'Bạn chưa nhập nội dung chi tiết task',
        ];
    }
}
