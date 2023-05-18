<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\StoreExMemberRequest;
use App\Http\Requests\UpdateExMemberRequest;
use App\Models\ExMember;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExMemberController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('ex_member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exMembers = ExMember::with(['user', 'created_by'])->get();

        return view('admin.exMembers.index', compact('exMembers'));
    }

    public function create()
    {
        abort_if(Gate::denies('ex_member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.exMembers.create', compact('users'));
    }

    public function store(StoreExMemberRequest $request)
    {
        $exMember = ExMember::create($request->all());

        return redirect()->route('admin.ex-members.index');
    }

    public function edit(ExMember $exMember)
    {
        abort_if(Gate::denies('ex_member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $exMember->load('user', 'created_by');

        return view('admin.exMembers.edit', compact('exMember', 'users'));
    }

    public function update(UpdateExMemberRequest $request, ExMember $exMember)
    {
        $exMember->update($request->all());

        //return redirect()->route('admin.ex-members.index');
        return view('admin.exMembers.show', compact('exMember'));
    }

    public function show(ExMember $exMember)
    {
        abort_if(Gate::denies('ex_member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exMember->load('user', 'created_by');

        return view('admin.exMembers.show', compact('exMember'));
    }
}
