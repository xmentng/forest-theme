<?php

namespace App\Http\Controllers;

use App\Cell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCellsRequest;
use App\Http\Requests\UpdateCellsRequest;

class CellsController extends Controller
{
    /**
     * Display a listing of Cell.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('cell_access')) {
            return abort(401);
        }
        $cells = Cell::all();

        return view('cells.index', compact('cells'));
    }

    /**
     * Show the form for creating new Cell.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('cell_create')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'churches' => \App\Role::get()->pluck('display_name', 'id')->prepend('Please select', ''),
        ];

        return view('cells.create', $relations);
    }

    /**
     * Store a newly created Cell in storage.
     *
     * @param  \App\Http\Requests\StoreCellsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCellsRequest $request)
    {
        if (! Gate::allows('cell_create')) {
            return abort(401);
        }
        $cell = Cell::create($request->all());

        return redirect()->route('cells.index');
    }


    /**
     * Show the form for editing Cell.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('cell_edit')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'churches' => \App\Role::get()->pluck('display_name', 'id')->prepend('Please select', ''),
        ];

        $cell = Cell::findOrFail($id);

        return view('cells.edit', compact('cell') + $relations);
    }

    /**
     * Update Cell in storage.
     *
     * @param  \App\Http\Requests\UpdateCellsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCellsRequest $request, $id)
    {
        if (! Gate::allows('cell_edit')) {
            return abort(401);
        }
        $cell = Cell::findOrFail($id);
        $cell->update($request->all());

        return redirect()->route('cells.index');
    }


    /**
     * Display Cell.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('cell_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'churches' => \App\Role::get()->pluck('display_name', 'id')->prepend('Please select', ''),
        ];

        $cell = Cell::findOrFail($id);

        return view('cells.show', compact('cell') + $relations);
    }


    /**
     * Remove Cell from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('cell_delete')) {
            return abort(401);
        }
        $cell = Cell::findOrFail($id);
        $cell->delete();

        return redirect()->route('cells.index');
    }

    /**
     * Delete all selected Cell at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('cell_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Cell::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
