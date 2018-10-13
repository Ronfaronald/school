<?php

namespace App\Http\Controllers\Admin;

use App\ExamPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExamPapersRequest;
use App\Http\Requests\Admin\UpdateExamPapersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class ExamPapersController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of ExamPaper.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('exam_paper_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('exam_paper_delete')) {
                return abort(401);
            }
            $exam_papers = ExamPaper::onlyTrashed()->get();
        } else {
            $exam_papers = ExamPaper::all();
        }

        return view('admin.exam_papers.index', compact('exam_papers'));
    }

    /**
     * Show the form for creating new ExamPaper.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('exam_paper_create')) {
            return abort(401);
        }
        return view('admin.exam_papers.create');
    }

    /**
     * Store a newly created ExamPaper in storage.
     *
     * @param  \App\Http\Requests\StoreExamPapersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamPapersRequest $request)
    {
        if (! Gate::allows('exam_paper_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $exam_paper = ExamPaper::create($request->all());



        return redirect()->route('admin.exam_papers.index');
    }


    /**
     * Show the form for editing ExamPaper.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('exam_paper_edit')) {
            return abort(401);
        }
        $exam_paper = ExamPaper::findOrFail($id);

        return view('admin.exam_papers.edit', compact('exam_paper'));
    }

    /**
     * Update ExamPaper in storage.
     *
     * @param  \App\Http\Requests\UpdateExamPapersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamPapersRequest $request, $id)
    {
        if (! Gate::allows('exam_paper_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $exam_paper = ExamPaper::findOrFail($id);
        $exam_paper->update($request->all());



        return redirect()->route('admin.exam_papers.index');
    }


    /**
     * Display ExamPaper.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('exam_paper_view')) {
            return abort(401);
        }
        $exam_paper = ExamPaper::findOrFail($id);

        return view('admin.exam_papers.show', compact('exam_paper'));
    }


    /**
     * Remove ExamPaper from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('exam_paper_delete')) {
            return abort(401);
        }
        $exam_paper = ExamPaper::findOrFail($id);
        $exam_paper->delete();

        return redirect()->route('admin.exam_papers.index');
    }

    /**
     * Delete all selected ExamPaper at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('exam_paper_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ExamPaper::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ExamPaper from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('exam_paper_delete')) {
            return abort(401);
        }
        $exam_paper = ExamPaper::onlyTrashed()->findOrFail($id);
        $exam_paper->restore();

        return redirect()->route('admin.exam_papers.index');
    }

    /**
     * Permanently delete ExamPaper from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('exam_paper_delete')) {
            return abort(401);
        }
        $exam_paper = ExamPaper::onlyTrashed()->findOrFail($id);
        $exam_paper->forceDelete();

        return redirect()->route('admin.exam_papers.index');
    }
}
