@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>  {{ $exMember->index }}. {{ $exMember->name }}</h2>
        <h3> {{ $exMember->place }},  {{ $exMember->district }}</h3>
    </div>

    <div class="card-body">
        <div class="form-group">
          
            <table class="table table-bordered table-striped">
                <tbody>
                   <!--  <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.id') }}
                        </th>
                        <td>
                            {{ $exMember->id }}
                        </td>
                    </tr> -->
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.index') }}
                        </th>
                        <td>
                            {{ $exMember->index }} (<b>  {{ $exMember->user->name ?? '' }} </b>)
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
                            {{ $exMember->place }},  {{ $exMember->district }}
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
                            {{ trans('cruds.exMember.fields.distance_total') }}
                        </th>
                        <td>
                            {{ $exMember->distance_total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.ta_calculated') }}
                        </th>
                        <td>
                            {{ (int)$exMember->ta_calculated }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.ta_eligible') }}
                        </th>
                        <td>
                            {{ (int)$exMember->ta_eligible }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.honorarium') }}
                        </th>
                        <td>
                            {{ (int)$exMember->honorarium }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.amount_payable') }}
                        </th>
                        <td>
                            {{ (int)$exMember->amount_payable }}
                        </td>
                    </tr>
                  <!--   <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.actual_amount_paid') }}
                        </th>
                        <td>
                            {{ $exMember->actual_amount_paid }}
                        </td>
                    </tr> -->
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.amount_words') }}
                        </th>
                        <td>
                            {{ $exMember->amount_words }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.exMember.fields.amount_paid') }}
                        </th>
                        <td>
                             {{ $exMember->amount_paid ? 'YES' : 'NO' }}
                        </td>
                    </tr>

                </tbody>
            </table>

                        
           
            <div class="form-group">
            <a class="btn btn-default" href="{{ route('admin.ex-members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
                @can('ex_member_edit')
                  <a class="btn btn-info" href="{{ route('admin.ex-members.edit', $exMember->id) }}">
                                        {{ trans('global.edit') }}
                   </a>
                @endcan
             
               
              
                <a class="btn btn-danger" href="{{ route('admin.ex-members.paid', $exMember->id) }}">
                                        Mark As Paid
                   </a>
               
                   <a class="btn btn-primary float-right"  target="_blank" href="{{ route('admin.ex-members.print', $exMember->id) }}">
                                        Print
                </a>
               
                   <a class="mr-1 btn btn-secondary float-right"  href="{{ route('admin.ex-members.odt', $exMember->id) }}">
                                        Docx
                </a>
                 
                
            </div>
        </div>
    </div>
</div>



@endsection