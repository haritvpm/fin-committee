<?php

namespace App\Http\Requests;

use App\Models\ExMember;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExMemberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ex_member_edit');
    }

    public function rules()
    {
        return [
            'index' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:ex_members,index,' . request()->route('ex_member')->id,
            ],
            'name' => [
                'string',
                'required',
            ],
            'address' => [
                'required',
            ],
            'place' => [
                'string',
                'required',
            ],
            'district' => [
                'string',
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'distance_oneside' => [
                'required',
            ],
        ];
    }
}
