<?php

namespace App\Http\Controllers;

use App\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreTestimoniesRequest;
use App\Http\Requests\UpdateTestimoniesRequest;

class TestimoniesController extends Controller
{
    /**
     * Display a listing of Testimony.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('testimony_access')) {
            return abort(401);
        }
        $testimonies = Testimony::all();

        return view('testimonies.index', compact('testimonies'));
    }

    /**
     * Show the form for creating new Testimony.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('testimony_create')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        return view('testimonies.create', $relations);
    }

    /**
     * Store a newly created Testimony in storage.
     *
     * @param  \App\Http\Requests\StoreTestimoniesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimoniesRequest $request)
    {
        if (! Gate::allows('testimony_create')) {
            return abort(401);
        }
        $testimony = Testimony::create($request->all());

        return redirect()->route('testimonies.index');
    }


    /**
     * Show the form for editing Testimony.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('testimony_edit')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $testimony = Testimony::findOrFail($id);

        return view('testimonies.edit', compact('testimony') + $relations);
    }

    /**
     * Update Testimony in storage.
     *
     * @param  \App\Http\Requests\UpdateTestimoniesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimoniesRequest $request, $id)
    {
        if (! Gate::allows('testimony_edit')) {
            return abort(401);
        }
        $testimony = Testimony::findOrFail($id);
        $testimony->update($request->all());

        return redirect()->route('testimonies.index');
    }


    /**
     * Display Testimony.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('testimony_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $testimony = Testimony::findOrFail($id);

        return view('testimonies.show', compact('testimony') + $relations);
    }


    /**
     * Remove Testimony from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('testimony_delete')) {
            return abort(401);
        }
        $testimony = Testimony::findOrFail($id);
        $testimony->delete();

        return redirect()->route('testimonies.index');
    }

    /**
     * Delete all selected Testimony at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('testimony_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Testimony::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
