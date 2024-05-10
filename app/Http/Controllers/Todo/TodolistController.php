<?php

namespace App\Http\Controllers\Todo;

use Exception;
use App\Models\TodoList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todoList = TodoList::count();
        $todo = TodoList::select('id', 'name', 'keinginan', 'status')->latest()->get();
        return view('pages.index', compact(
            'todo',
            'todoList'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Vlidate 
        $this->validate($request, [
            'name' => 'required',
            'keinginan' => 'required',
            'status' => 'required'
        ]);

        try {

            // Create category
            $data = $request->all();
            $data = TodoList::create($data);

            // dd($data);
            return redirect()->back()->with('success', 'data berhasil');
        } catch (Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to add category');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Melakukan Validasi
        $this->validate($request, [
            'name' => 'required',
            'keinginan' => 'required',
            'status' => 'required'
        ]);

        try {
            //get data by id
            $todo = TodoList::find($id);
            $data = $request->all();
            $todo->update($data);

            return redirect()->back()->with('success', 'Data Berhasil Di EDIT');
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed Something wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            //get dadt by id
            $todo = TodoList::find($id);

            // Hapus data
            $todo->delete();

            return redirect()->back()->with('success', 'data berhaisl di hapus');
        } catch (Exception $th) {
            return redirect()->back()->with('error', 'Failed Someting Wrong!');
        }
    }
}
