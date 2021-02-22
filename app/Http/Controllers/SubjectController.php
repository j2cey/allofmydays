<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Resources\SearchCollection;
use App\Http\Requests\Subject\FetchRequest;
use App\Http\Resources\Subject as SubjectResource;
use App\Http\Requests\Subject\CreateSubjectRequest;
use App\Repositories\Contracts\ISubjectRepositoryContract;

use Exception;
use \Illuminate\View\View;
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;

class SubjectController extends Controller
{
    /**
     * @var ISubjectRepositoryContract
     */
    private $repository;

    /**
     * ParticipantController constructor.
     *
     * @param ISubjectRepositoryContract $repository [description]
     */
    public function __construct(ISubjectRepositoryContract $repository) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuts = Status::all();
        return view('subjects.index')
            ->with('perPage', new Collection(config('system.per_page')))
            ->with('defaultPerPage', config('system.default_per_page'))
            ->with('statuts', $statuts);
    }

    /**
     * Fetch records.
     *
     * @param  FetchRequest     $request [description]
     * @return SearchCollection          [description]
     */
    public function fetch(FetchRequest $request)
    {
        return new SearchCollection(
            $this->repository->search($request), SubjectResource::class
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->category["id"], $request->title);
        $new_subject = new Subject();
        $new_subject->title = $request->title;
        $new_subject->description = $request->description;
        $new_subject->save();

        $new_subject->setCategory($request->category["id"]);

        return $new_subject;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $subject->load(['category','tasks','tasks.status']);
        return view('subjects.details')
            ->with('subject', $subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
