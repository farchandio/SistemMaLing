<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\AgentRequest;

class AgentController extends Controller
{
   
    public function index(): View
    {
        $agents = Agent::get();

        return view('admin.agents.index', compact('agents'));
    }

    public function create(): View
    {
        return view('admin.agents.create');
    }

    public function store(AgentRequest $request): RedirectResponse
    {
        if($request->validated()){
    
        }
        Agent::create($request->validated());

        return redirect()->route('agents.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Agent $agent): View
    {
        return view('agents.show', compact('agent'));
    }

    public function edit(Agent $agent): View
    {
        return view('agents.edit', compact('agent'));
    }

    public function update(AgentRequest $request, Agent $agent): RedirectResponse
    {
        $agent->update($request->validated());

        return redirect()->route('agents.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Agent $agent): RedirectResponse
    {
        $agent->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}