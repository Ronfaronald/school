<?php

namespace App\Http\Controllers\Admin;

use App\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMinistriesRequest;
use App\Http\Requests\Admin\UpdateMinistriesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class MinistriesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Ministry.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('ministry_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('ministry_delete')) {
                return abort(401);
            }
            $ministries = Ministry::onlyTrashed()->get();
        } else {
            $ministries = Ministry::all();
        }

        return view('admin.ministries.index', compact('ministries'));
    }

    /**
     * Show the form for creating new Ministry.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('ministry_create')) {
            return abort(401);
        }
        return view('admin.ministries.create');
    }

    /**
     * Store a newly created Ministry in storage.
     *
     * @param  \App\Http\Requests\StoreMinistriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMinistriesRequest $request)
    {
        if (! Gate::allows('ministry_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $ministry = Ministry::create($request->all());



        return redirect()->route('admin.ministries.index');
    }


    /**
     * Show the form for editing Ministry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('ministry_edit')) {
            return abort(401);
        }
        $ministry = Ministry::findOrFail($id);

        return view('admin.ministries.edit', compact('ministry'));
    }

    /**
     * Update Ministry in storage.
     *
     * @param  \App\Http\Requests\UpdateMinistriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMinistriesRequest $request, $id)
    {
        if (! Gate::allows('ministry_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $ministry = Ministry::findOrFail($id);
        $ministry->update($request->all());



        return redirect()->route('admin.ministries.index');
    }


    /**
     * Display Ministry.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('ministry_view')) {
            return abort(401);
        }
        $ministry = Ministry::findOrFail($id);

        return view('admin.ministries.show', compact('ministry'));
    }


    /**
     * Remove Ministry from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('ministry_delete')) {
            return abort(401);
        }
        $ministry = Ministry::findOrFail($id);
        $ministry->delete();

        return redirect()->route('admin.ministries.index');
    }

    /**
     * Delete all selected Ministry at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('ministry_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Ministry::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Ministry from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('ministry_delete')) {
            return abort(401);
        }
        $ministry = Ministry::onlyTrashed()->findOrFail($id);
        $ministry->restore();

        return redirect()->route('admin.ministries.index');
    }

    /**
     * Permanently delete Ministry from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('ministry_delete')) {
            return abort(401);
        }
        $ministry = Ministry::onlyTrashed()->findOrFail($id);
        $ministry->forceDelete();

        return redirect()->route('admin.ministries.index');
    }
}
