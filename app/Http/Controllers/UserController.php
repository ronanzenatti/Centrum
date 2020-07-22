<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    public function dataTables()
    {
        return Datatables::of(User::query())->addColumn('actions',
            function ($data) {
                return "<a class='btn btn-warning btn-sm' href='/docentes/{$data->id}/edit'><i class='fas fa fa-edit'></i></a>
                     <button onclick='deleteData(\"/docentes\", {$data->id})' class='btn btn-danger btn-sm'><i class='fas fa fa-trash-alt'> </i></button>";
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
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'matricula' => 'required|numeric',
            'email' => 'required|unique:users',
            'password' => 'required|string|min:8'
        ]);

        $dados = $request->only('name', 'email', 'password', 'matricula', 'biografia', 'admin', 'site', 'lattes');
        $dados['password'] = Hash::make($dados['password']);
        $dados['admin'] = (empty($dados['admin'])) ? 0 : 1;

        if (!empty($request->file('foto'))) {
            $path = $request->file('foto')->store('profiles_images');
            $dados['foto'] = $path;
        }

        User::create($dados);

        return redirect()->route('docentes.index')->with('success', 'Docente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obj = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'matricula' => 'required|numeric',
            'email' => 'required',
        ]);

        $dados = $request->only('name', 'email', 'matricula', 'biografia', 'admin', 'site', 'lattes');
        $dados['admin'] = (empty($dados['admin'])) ? 0 : 1;

        if (!empty($request->password)) {
            $dados['password'] = Hash::make($request->password);
        }

        if (!empty($request->file('foto'))) {
            if (!empty($obj->foto)) {
                Storage::delete($obj->foto);
            }
            $path = $request->file('foto')->store('profiles_images');
            $dados['foto'] = $path;
        }
        $obj->update($dados);

        return redirect()->route('docentes.index')->with('warning', 'Docente alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = User::findOrFail($id);
        return $obj->delete();
    }
}
