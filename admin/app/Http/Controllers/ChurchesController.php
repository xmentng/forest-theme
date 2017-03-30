<?php

namespace App\Http\Controllers;

use App\Church;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreChurchesRequest;
use App\Http\Requests\UpdateChurchesRequest;

class ChurchesController extends Controller
{
    /**
     * Display a listing of Church.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('church_access')) {
            return abort(401);
        }
        $churches = Church::all();

        return view('churches.index', compact('churches'));
    }

    /**
     * Show the form for creating new Church.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('church_create')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        return view('churches.create', $relations);
    }

    /**
     * Store a newly created Church in storage.
     *
     * @param  \App\Http\Requests\StoreChurchesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChurchesRequest $request)
    {
        if (! Gate::allows('church_create')) {
            return abort(401);
        }
        $church = Church::create($request->all());

        return redirect()->route('churches.index');
    }


    /**
     * Show the form for editing Church.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('church_edit')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $church = Church::findOrFail($id);

        return view('churches.edit', compact('church') + $relations);
    }

    /**
     * Update Church in storage.
     *
     * @param  \App\Http\Requests\UpdateChurchesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChurchesRequest $request, $id)
    {
        if (! Gate::allows('church_edit')) {
            return abort(401);
        }
        $church = Church::findOrFail($id);
        $church->update($request->all());

        return redirect()->route('churches.index');
    }


    /**
     * Display Church.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('church_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'partnerships' => \App\Partnership::where('church_id', $id)->get(),
        ];

        $church = Church::findOrFail($id);

        return view('churches.show', compact('church') + $relations);
    }


    /**
     * Remove Church from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('church_delete')) {
            return abort(401);
        }
        $church = Church::findOrFail($id);
        $church->delete();

        return redirect()->route('churches.index');
    }

    /**
     * Delete all selected Church at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('church_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Church::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
