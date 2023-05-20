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
use Barryvdh\DomPDF\Facade\Pdf;

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

        $users = User::where('name', 'LIKE','%ounter%')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

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

        $users = User::where('name', 'LIKE','%ounter%')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

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
    public function paid(Request $request)
    {
       $exMember = ExMember::FindOrFail($request->id);
       $exMember->update(
        [ 'amount_paid' => true ]
       );
    
     
       return view('admin.exMembers.show', compact('exMember'));
    
    }
    public function print(Request $request)
    {
       $exMember = ExMember::FindOrFail($request->id);
       $exMember->load('user', 'created_by');
       return view('admin.exMembers.print', compact('exMember'));
       $data = [
        'id' => 33,
        'date' => date('m/d/Y')
        ];
      
    //$pdf = PDF::loadView('admin.exMembers.print', $data);

    //return $pdf->download('voucher.pdf');
    }
    public function odt(Request $request)
    {
       $exMember = ExMember::FindOrFail($request->id);
       //copy the example doc file into your storage directory or corret this path
   
       $my_template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('ta_form.docx'));
       $my_template->setValue('name', $exMember->name);
       $my_template->setValue('address', $exMember->address);
       $my_template->setValue('place', $exMember->place);
       $my_template->setValue('district', $exMember->district);
       $my_template->setValue('kms', $exMember->distance_total);
       $my_template->setValue('ta_eli', (int)$exMember->ta_eligible);
       $my_template->setValue('honor', (int)$exMember->honorarium);
       $my_template->setValue('total', (int)$exMember->amount_payable);
       $my_template->setValue('total_words', $exMember->amount_words);
       
       $filename = 'taform' . $exMember->index . '.docx';
       try{
        $my_template->saveAs(storage_path(  $filename));
        }catch (Exception $e){
            //handle exception
        }

        return response()->download(storage_path( $filename))->deleteFileAfterSend(true);;       


    }

    
}
