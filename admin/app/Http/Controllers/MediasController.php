<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreMediasRequest;
use App\Http\Requests\UpdateMediasRequest;

class MediasController extends Controller
{
    /**
     * Display a listing of Media.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('media_access')) {
            return abort(401);
        }
        $medias = Media::all();

        return view('medias.index', compact('medias'));
    }

    /**
     * Show the form for creating new Media.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('media_create')) {
            return abort(401);
        }
        return view('medias.create');
    }

    /**
     * Store a newly created Media in storage.
     *
     * @param  \App\Http\Requests\StoreMediasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMediasRequest $request)
    {
        if (! Gate::allows('media_create')) {
            return abort(401);
        }
        $media = Media::create($request->all());

        return redirect()->route('medias.index');
    }


    /**
     * Show the form for editing Media.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('media_edit')) {
            return abort(401);
        }
        $media = Media::findOrFail($id);

        return view('medias.edit', compact('media'));
    }

    /**
     * Update Media in storage.
     *
     * @param  \App\Http\Requests\UpdateMediasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMediasRequest $request, $id)
    {
        if (! Gate::allows('media_edit')) {
            return abort(401);
        }
        $media = Media::findOrFail($id);
        $media->update($request->all());

        return redirect()->route('medias.index');
    }


    /**
     * Display Media.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('media_view')) {
            return abort(401);
        }
        $media = Media::findOrFail($id);

        return view('medias.show', compact('media'));
    }


    /**
     * Remove Media from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('media_delete')) {
            return abort(401);
        }
        $media = Media::findOrFail($id);
        $media->delete();

        return redirect()->route('medias.index');
    }

    /**
     * Delete all selected Media at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('media_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Media::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
