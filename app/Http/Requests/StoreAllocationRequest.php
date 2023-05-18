<?php

namespace App\Http\Requests;

use App\Models\Allocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAllocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('allocation_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'allotted_amount' => [
                'required',
            ],
        ];
    }
}
