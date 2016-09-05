<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\EscuelaAcademicoRepository as EscuelaAcademico;

class EscuelaAcademicoController extends Controller
{

    protected $repository;

    /**
     * @param App\Repositories\EscuelaAcademicoRepository
     */
    public function __construct(EscuelaAcademico $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int  $school_id
     * @param  int  $detail_id
     * @return \Illuminate\Http\Response
     */
    public function index($school_id, $detail_id)
    {
        return \Response::json($this->repository->findWhere([
            'detalle_escuela_id' => $detail_id 
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $school_id
     * @param  int  $detail_id
     * @param  int  $teacher_id
     * @return \Illuminate\Http\Response
     */
    public function show($school_id, $detail_id, $teacher_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
