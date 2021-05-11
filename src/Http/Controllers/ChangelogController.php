<?php

namespace Morsapt\Changelog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Morsapt\Changelog\Http\Requests\ChangelogStore;
use Morsapt\Changelog\Http\Requests\ChangelogUpdate;
use Morsapt\Changelog\Http\Resources\ChangelogCollection;
use Morsapt\Changelog\Http\Resources\Changelog as ChangelogResource;
use Morsapt\Changelog\Models\Changelog;
use Illuminate\Http\Request;

class ChangelogController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $messages = Changelog::paginate();

        return ChangelogCollection::make($messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChangelogStore $request
     * @return Response
     */
    public function store(ChangelogStore $request)
    {
        // validate input data
        $request->validated();
        $changelog = $request->all();

        // create
        $changelog = Changelog::create($changelog);

        return ChangelogResource::make($changelog);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $Changelog_id
     * @return Response
     */
    public function show($changelogId)
    {
        $message = Changelog::findOrFail($changelogId);

        return ChangelogResource::make($message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ChangelogUpdate $request
     * @param int $changelogId
     * @return ChangelogResource
     */
    public function update(ChangelogUpdate $request, int $changelogId)
    {
        $request->validated();
        $message = Changelog::findOrFail($changelogId);
        $message->update($request->all());

        return ChangelogResource::make($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $message_id
     * @return Response
     */
    public function destroy(int $message_id)
    {
        $message = Changelog::findOrFail($message_id);

        if($message->delete()){
            return response(null, 204);
        }

        return response(null, 500);

    }

}
