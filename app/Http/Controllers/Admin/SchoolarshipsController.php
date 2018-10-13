<?php

namespace App\Http\Controllers\Admin;

use App\Schoolarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSchoolarshipsRequest;
use App\Http\Requests\Admin\UpdateSchoolarshipsRequest;

class SchoolarshipsController extends Controller
{
    /**
     * Display a listing of Schoolarship.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('schoolarship_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('schoolarship_delete')) {
                return abort(401);
            }
            $schoolarships = Schoolarship::onlyTrashed()->get();
        } else {
            $schoolarships = Schoolarship::all();
        }

        return view('admin.schoolarships.index', compact('schoolarships'));
    }

    /**
     * Show the form for creating new Schoolarship.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('schoolarship_create')) {
            return abort(401);
        }
        return view('admin.schoolarships.create');
    }

    /**
     * Store a newly created Schoolarship in storage.
     *
     * @param  \App\Http\Requests\StoreSchoolarshipsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSchoolarshipsRequest $request)
    {
        if (! Gate::allows('schoolarship_create')) {
            return abort(401);
        }
        $schoolarship = Schoolarship::create($request->all());



        return redirect()->route('admin.schoolarships.index');
    }


    /**
     * Show the form for editing Schoolarship.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('schoolarship_edit')) {
            return abort(401);
        }
        $schoolarship = Schoolarship::findOrFail($id);

        return view('admin.schoolarships.edit', compact('schoolarship'));
    }

    /**
     * Update Schoolarship in storage.
     *
     * @param  \App\Http\Requests\UpdateSchoolarshipsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSchoolarshipsRequest $request, $id)
    {
        if (! Gate::allows('schoolarship_edit')) {
            return abort(401);
        }
        $schoolarship = Schoolarship::findOrFail($id);
        $schoolarship->update($request->all());



        return redirect()->route('admin.schoolarships.index');
    }


    /**
     * Display Schoolarship.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('schoolarship_view')) {
            return abort(401);
        }
        $schoolarship = Schoolarship::findOrFail($id);

        return view('admin.schoolarships.show', compact('schoolarship'));
    }


    /**
     * Remove Schoolarship from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('schoolarship_delete')) {
            return abort(401);
        }
        $schoolarship = Schoolarship::findOrFail($id);
        $schoolarship->delete();

        return redirect()->route('admin.schoolarships.index');
    }

    /**
     * Delete all selected Schoolarship at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('schoolarship_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Schoolarship::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Schoolarship from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('schoolarship_delete')) {
            return abort(401);
        }
        $schoolarship = Schoolarship::onlyTrashed()->findOrFail($id);
        $schoolarship->restore();

        return redirect()->route('admin.schoolarships.index');
    }

    /**
     * Permanently delete Schoolarship from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('schoolarship_delete')) {
            return abort(401);
        }
        $schoolarship = Schoolarship::onlyTrashed()->findOrFail($id);
        $schoolarship->forceDelete();

        return redirect()->route('admin.schoolarships.index');
    }
}
