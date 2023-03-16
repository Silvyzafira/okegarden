<?php

namespace App\Http\Controllers;
use App\Models\Project;

use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class ProjectController extends Controller
{
    //

    public function index()
	{
		$project = Project::all();
		return view('dataproject',['project'=>$project]);
	}

	
	public function create()
    {
        return view('project.create');
    }

	public function store(Request $request)
    {
        $this->validate($request, [
            'namaproject' => 'required|string|max:155',
            'keterangan' => 'required',
            'status' => 'required'
        ]);

        $project = Project::create([
            'namaproject' => $request->namaproject,
            'keterangan' => $request->keterangan,
            'status' => $request->status
        ]);

        if ($project) {
            return redirect()
                ->route('project.index')
                ->with([
                    'success' => 'New project has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

	public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

	public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'namaproject' => 'required|string|max:155',
            'keterangan' => 'required',
            'status' => 'required'
        ]);
        $project->update([
            'namaproject' => $request->namaproject,
            'keterangan' => $request->keterangan,
            'status' => $request->status
        ]);

        if ($project) {
            return redirect()
                ->route('project.index')
                ->with([
                    'success' => 'Project has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function show(Project $project)
    {
        return redirect()
                ->route('project.index')
                ->with([
                    'success' => 'Project has been updated successfully'
                ]);
    }

	public function destroy(Project $project)
    {
        $project->delete();

        if ($project) {
            return redirect()
                ->route('project.index')
                ->with([
                    'success' => 'project has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('project.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
