<?php

namespace App\Http\Requests;

use App\Models\ExMember;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExMemberRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ex_member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ex_members,id',
        ];
    }
}
