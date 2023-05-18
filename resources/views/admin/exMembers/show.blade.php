@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.exMember.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ex-members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.id') }}
                        </th>
                        <td>
                            {{ $exMember->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.index') }}
                        </th>
                        <td>
                            {{ $exMember->index }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.name') }}
                        </th>
                        <td>
                            {{ $exMember->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.address') }}
                        </th>
                        <td>
                            {{ $exMember->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.place') }}
                        </th>
                        <td>
                            {{ $exMember->place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.district') }}
                        </th>
                        <td>
                            {{ $exMember->district }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.user') }}
                        </th>
                        <td>
                            {{ $exMember->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.distance_oneside') }}
                        </th>
                        <td>
                            {{ $exMember->distance_oneside }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.ta_calculated') }}
                        </th>
                        <td>
                            {{ $exMember->ta_calculated }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.ta_eligible') }}
                        </th>
                        <td>
                            {{ $exMember->ta_eligible }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.honorarium') }}
                        </th>
                        <td>
                            {{ $exMember->honorarium }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.amount_payable') }}
                        </th>
                        <td>
                            {{ $exMember->amount_payable }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.amount_paid') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $exMember->amount_paid ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ex-members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection