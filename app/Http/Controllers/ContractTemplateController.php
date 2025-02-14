<?php

namespace App\Http\Controllers;

use App\Models\ContractTemplate;
use Illuminate\Http\Request;

class ContractTemplateController extends Controller
{
    public function index()
    {
        return view('contracts_template.index', [
            'contractsTemplate' => ContractTemplate::all()->where('user_id', auth()->id())
        ]);
    }

    public function create()
    {
        return view('contracts_template.create');
    }

    public function show(ContractTemplate $contractTemplates, $id)
    {
        $contractTemplate = $contractTemplates->find($id);

        $this->isUser($contractTemplate);

        return view('contracts_template.show', [
            'contract_template' => $contractTemplate,
        ]);
    }

    public function store(Request $request)
    {
        $contractTemplate = new ContractTemplate();
        $contractTemplate->name = $request->get('name');
        $contractTemplate->content = $request->get('content');
        $contractTemplate->user_id = auth()->id();

        $contractTemplate->save();

        return redirect()->route('contracts_template.index');
    }

    public function edit(ContractTemplate $contractTemplates, $id)
    {
        $contractTemplate = $contractTemplates->find($id);

        $this->isUser($contractTemplate);

        return view('contracts_template.edit', [
            'contract_template' => $contractTemplate
        ]);
    }

    public function update(Request $request)
    {
        $contractTemplate = ContractTemplate::find($request->id);

        $this->isUser($contractTemplate);

        $contractTemplate->name = $request->get('name');
        $contractTemplate->content = $request->get('content');

        $contractTemplate->save();

        return redirect()->route('contracts_template.show', ['id' => $contractTemplate->id]);
    }

    public function destroy($id)
    {
        $contractTemplate = ContractTemplate::findOrFail($id);

        $this->isUser($contractTemplate);

        $contractTemplate->delete();

        return redirect()->route('contracts_template.index');
    }
}
