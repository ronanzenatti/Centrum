<?php

namespace App\Http\Controllers;

use App\Unidade;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Storage;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('unidades.index');
    }

    public function dataTables()
    {
        return Datatables::of(Unidade::query())->addColumn('actions',
            function ($data) {
                return "<a class='btn btn-warning btn-sm' href='/unidades/{$data->id}/edit'><i class='fas fa fa-edit'></i></a>
                     <button onclick='deleteData(\"/unidades\", {$data->id})' class='btn btn-danger btn-sm'><i class='fas fa fa-trash-alt'> </i></button>";
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Unidade $unidade
     * @return \Illuminate\Http\Response
     */
    public function show(Unidade $unidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Unidade $unidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidade $unidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Unidade $unidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidade $unidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Unidade $unidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidade $unidade)
    {
        //
    }
}
