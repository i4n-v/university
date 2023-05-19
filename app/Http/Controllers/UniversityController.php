<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        if (!$request->name) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'O nome da universidade é requerido.');
        }

        University::create([
            'name' => $request->name,
            'location' => $request->location,
            'students_number' => $request->students_number,
            'teachers_number' => $request->teachers_number,
            'most_popular_course' => $request->most_popular_course,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Universidade cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(University $university)
    {
        return $university->toJson();
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
    public function update(Request $request, University $university)
    {

        $userId = $university->user->id;

        if ($userId !== Auth::user()->id) {
            session()->flash('error', 'Você não possui autorização para editar essa universidade.');
            return response('', 400);
        }

        $university->update([
            'name' => $request->name,
            'location' => $request->location,
            'students_number' => $request->students_number,
            'teachers_number' => $request->teachers_number,
            'most_popular_course' => $request->most_popular_course,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Universidade atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university)
    {
        $userId = $university->user->id;

        if ($userId !== Auth::user()->id) {
            session()->flash('error', 'Você não possui autorização para excluir essa universidade.');
            return response('', 400);
        }

        $university->delete();

        session()->flash('success', 'Universidade excluida com sucesso.');
        return response('', 200);
    }
}
