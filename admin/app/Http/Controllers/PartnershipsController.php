<?php

namespace App\Http\Controllers;

use App\Partnership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePartnershipsRequest;
use App\Http\Requests\UpdatePartnershipsRequest;

class PartnershipsController extends Controller
{
    /**
     * Display a listing of Partnership.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('partnership_access')) {
            return abort(401);
        }
        $partnerships = Partnership::all();

        return view('partnerships.index', compact('partnerships'));
    }

    /**
     * Show the form for creating new Partnership.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('partnership_create')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'churches' => \App\Church::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        return view('partnerships.create', $relations);
    }

    /**
     * Store a newly created Partnership in storage.
     *
     * @param  \App\Http\Requests\StorePartnershipsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartnershipsRequest $request)
    {
        if (! Gate::allows('partnership_create')) {
            return abort(401);
        }
        $partnership = Partnership::create($request->all());

        return redirect()->route('partnerships.index');
    }


    /**
     * Show the form for editing Partnership.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('partnership_edit')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'churches' => \App\Church::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $partnership = Partnership::findOrFail($id);

        return view('partnerships.edit', compact('partnership') + $relations);
    }

    /**
     * Update Partnership in storage.
     *
     * @param  \App\Http\Requests\UpdatePartnershipsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartnershipsRequest $request, $id)
    {
        if (! Gate::allows('partnership_edit')) {
            return abort(401);
        }
        $partnership = Partnership::findOrFail($id);
        $partnership->update($request->all());

        return redirect()->route('partnerships.index');
    }


    /**
     * Display Partnership.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('partnership_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'churches' => \App\Church::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $partnership = Partnership::findOrFail($id);

        return view('partnerships.show', compact('partnership') + $relations);
    }


    /**
     * Remove Partnership from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('partnership_delete')) {
            return abort(401);
        }
        $partnership = Partnership::findOrFail($id);
        $partnership->delete();

        return redirect()->route('partnerships.index');
    }

    /**
     * Delete all selected Partnership at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('partnership_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Partnership::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
