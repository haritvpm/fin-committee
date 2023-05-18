@extends('layouts.admin')
@section('content')
@can('ex_member_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.ex-members.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.exMember.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'ExMember', 'route' => 'admin.ex-members.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.exMember.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ExMember">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.exMember.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.exMember.fields.index') }}
                        </th>
                        <th>
                            {{ trans('cruds.exMember.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.exMember.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.exMember.fields.place') }}
                        </th>
                        <th>
                            {{ trans('cruds.exMember.fields.district') }}
                        </th>
                        <th>
                            {{ trans('cruds.exMember.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.exMember.fields.distance_oneside') }}
                        </th>
                        <th>
                            {{ trans('cruds.exMember.fields.ta_calculated') }}
                        </th>
                        <th>
                            {{ trans('cruds.exMember.fields.ta_eligible') }}
                        </th>
                        <th>
                            {{ trans('cruds.exMember.fields.honorarium') }}
                        </th>
                        <th>
                            {{ trans('cruds.exMember.fields.amount_payable') }}
                        </th>
                        <th>
                            {{ trans('cruds.exMember.fields.amount_paid') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exMembers as $key => $exMember)
                        <tr data-entry-id="{{ $exMember->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $exMember->id ?? '' }}
                            </td>
                            <td>
                                {{ $exMember->index ?? '' }}
                            </td>
                            <td>
                                {{ $exMember->name ?? '' }}
                            </td>
                            <td>
                                {{ $exMember->address ?? '' }}
                            </td>
                            <td>
                                {{ $exMember->place ?? '' }}
                            </td>
                            <td>
                                {{ $exMember->district ?? '' }}
                            </td>
                            <td>
                                {{ $exMember->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $exMember->distance_oneside ?? '' }}
                            </td>
                            <td>
                                {{ $exMember->ta_calculated ?? '' }}
                            </td>
                            <td>
                                {{ $exMember->ta_eligible ?? '' }}
                            </td>
                            <td>
                                {{ $exMember->honorarium ?? '' }}
                            </td>
                            <td>
                                {{ $exMember->amount_payable ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $exMember->amount_paid ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $exMember->amount_paid ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('ex_member_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.ex-members.show', $exMember->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('ex_member_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.ex-members.edit', $exMember->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan


                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-ExMember:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection