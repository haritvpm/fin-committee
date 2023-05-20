<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAllocationRequest;
use App\Http\Requests\StoreAllocationRequest;
use App\Http\Requests\UpdateAllocationRequest;
use App\Models\Allocation;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllocationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('allocation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allocations = Allocation::with(['user'])->get();
        
        $total_allotted_amount = $allocations->sum('allotted_amount');
        $total_payable = $allocations->sum('payable');
        $total_expenditure = $allocations->sum('expenditure');
        $total_mla_count = $allocations->sum('mla_count');
        $total_balance = $allocations->sum('balance');
       
          

    
        return view('admin.allocations.index', compact('allocations', 'total_allotted_amount',
     'total_payable', 'total_expenditure', 'total_mla_count', 'total_balance'));
    }

    public function create()
    {
        abort_if(Gate::denies('allocation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.allocations.create', compact('users'));
    }

    public function store(StoreAllocationRequest $request)
    {
        $allocation = Allocation::create($request->all());

        return redirect()->route('admin.allocations.index');
    }

    public function edit(Allocation $allocation)
    {
        abort_if(Gate::denies('allocation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $allocation->load('user');

        return view('admin.allocations.edit', compact('allocation', 'users'));
    }

    public function update(UpdateAllocationRequest $request, Allocation $allocation)
    {
        $allocation->update($request->all());

        return redirect()->route('admin.allocations.index');
    }

    public function show(Allocation $allocation)
    {
        abort_if(Gate::denies('allocation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allocation->load('user');

        return view('admin.allocations.show', compact('allocation'));
    }

    public function destroy(Allocation $allocation)
    {
        abort_if(Gate::denies('allocation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allocation->delete();

        return back();
    }

    public function massDestroy(MassDestroyAllocationRequest $request)
    {
        $allocations = Allocation::find(request('ids'));

        foreach ($allocations as $allocation) {
            $allocation->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
