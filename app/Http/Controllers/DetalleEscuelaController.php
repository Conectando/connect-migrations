<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\DetalleEscuelaRepository as DetalleEscuela;

/**
 *
 */
class DetalleEscuelaController extends Controller
{

    /**
     * @var \App\Repositories\EscuelaRepository
     */    
    protected $repository;

    /**
     *
     * @param \App\Repositories\EscuelaRepository
     */
    public function __construct(DetalleEscuela $detalleEscuela)
    {
        $this->repository = $detalleEscuela;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($school_id)
    {
        return \Response::json($this->repository->findWhere([
            'escuela_id' => $school_id,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($school_id, $detail_id)
    {
        return \Response::json($this->repository->findWhere([
            'id' => $detail_id,
            'escuela_id' => $school_id,
        ]));
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
        return \Response::json($this->repository->delete($id));
    }
}
