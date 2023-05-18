@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.allocation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.allocations.update", [$allocation->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.allocation.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $allocation->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.allocation.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="allotted_amount">{{ trans('cruds.allocation.fields.allotted_amount') }}</label>
                <input class="form-control {{ $errors->has('allotted_amount') ? 'is-invalid' : '' }}" type="number" name="allotted_amount" id="allotted_amount" value="{{ old('allotted_amount', $allocation->allotted_amount) }}" step="0.01" required>
                @if($errors->has('allotted_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('allotted_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.allocation.fields.allotted_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection