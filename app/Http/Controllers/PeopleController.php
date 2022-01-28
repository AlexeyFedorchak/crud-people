<?php

namespace App\Http\Controllers;

use App\Events\PersonCreated;
use App\Events\PersonDeleted;
use App\Events\PersonUpdated;
use App\Http\Requests\CreatePeopleRequest;
use App\Http\Requests\UpdatePeopleRequest;
use App\Models\Interests;
use App\Models\Language;
use App\Models\People;
use App\Models\PeopleToInterests;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class PeopleController extends Controller
{
    /**
     * default per page value
     *
     * @var int
     */
    protected $perPage = 50;

    /**
     * @return View
     */
    public function index(): View
    {
        return view('people')
            ->with([
                'people' => People::with(['language', 'interests', 'creator', 'creator'])
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(),
            ]);
    }

    /**
     * @param People $people
     * @return Application|Factory|View
     */
    public function show(People $people)
    {
        $chosenInterestsIds = PeopleToInterests::where('person_id', $people->id)
            ->get('interest_id')
            ->pluck('interest_id')
            ->toArray();

        return view('update-person')
            ->with([
                'person' => $people,
                'languages' => Language::all(),
                'interests' => Interests::all(),
                'chosenInterestsIds' => $chosenInterestsIds,
            ]);
    }

    /**
     * @param UpdatePeopleRequest $request
     * @param People $people
     * @return RedirectResponse
     */
    public function update(UpdatePeopleRequest $request, People $people)
    {
        $person = $this->updatePeople($request, $people);

        if ($request->interests) {
            $this->updateInterests($request, $people);
        }

        event(new PersonUpdated($person));

        return redirect()
            ->back()
            ->with([
                'person' => $person,
                'languages' => Language::all(),
                'interests' => Interests::all(),
                'success' => 'Successfully updated',
            ]);
    }

    /**
     * @param UpdatePeopleRequest $request
     * @param People $people
     * @return People
     */
    private function updatePeople(UpdatePeopleRequest $request, People $people): People
    {
        $people->update(
            $request->except('interests')
        );

        $people->refresh();

        return $people;
    }

    /**
     * @param UpdatePeopleRequest $request
     * @param People $people
     * @return void
     */
    private function updateInterests(UpdatePeopleRequest $request, People $people)
    {
        PeopleToInterests::where('person_id', $people->id)
            ->delete();

        foreach ($request->interests as $interest) {
            PeopleToInterests::updateOrCreate([
                'person_id' => $people->id,
                'interest_id' => $interest,
            ]);
        }
    }

    /**
     * @return View
     */
    public function showCreatePage(): View
    {
        return view('add-person')
            ->with([
                'languages' => Language::all(),
                'interests' => Interests::all(),
            ]);
    }

    /**
     * @param CreatePeopleRequest $request
     * @return RedirectResponse
     */
    public function create(CreatePeopleRequest $request)
    {
        $person = People::create(
            array_merge(
                $request->except('interests'),
                ['creator_id' => auth()->id()],
            )
        );

        foreach ($request->interests as $interest) {
            PeopleToInterests::updateOrCreate([
                'person_id' => $person->id,
                'interest_id' => $interest,
            ]);
        }

        event(new PersonCreated($person));

        return redirect()->to(route('people.index'));
    }

    /**
     * @param People $people
     * @return RedirectResponse
     */
    public function delete(People $people): RedirectResponse
    {
        $people->delete();

        event(new PersonDeleted(
            json_encode($people))
        );

        return redirect()->to(route('people.index'));
    }
}
