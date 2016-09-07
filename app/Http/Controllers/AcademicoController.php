<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Supports\RepositoryTrait;
use App\Http\Requests;
use App\Repositories\AcademicoRepository as Academico;

/**
 *
 */
class AcademicoController extends Controller
{

    /**
     * @var \App\Repositories\AcademicoRepository
     */
    protected $repository;

    /**
     *
     * @param \App\Repositories\AcademicoRepository
     */
    public function __construct(Academico $academico) 
    {

        $this->repository = $academico;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \Response::json($this->repository->paginate());
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

        try {

            return \Response::json($this->repository->create( $this->transformToOrigin($request) ));

        } catch (\Prettus\Validator\Exceptions\ValidatorException $e) {

            return \Response::json([
                'message' => $e->getMessageBag(),
            ]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \Response::json($this->repository->find($id));
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
        try {

            return \Response::json($this->repository->update( $this->transformToOrigin($request), $id ));

        } catch (\Prettus\Validator\Exceptions\ValidatorException $e) {

            return \Response::json([
                'message' => $e->getMessageBag(),
            ]);

        }
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

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function transformToOrigin(Request $request)
    {
        $origin = [];

        if($request->isMethod('post'))
        {
            $origin = [
                'rfc' => $request->input('rfc'),
                'nombre' => $request->input('name'),
                'apaterno' => $request->input('last_name'),
                'amaterno' => $request->input('second_last_name'),
                'correo' => $request->input('email'),
                'telefono' => $request->input('telephone'),
                'celular' => $request->input('mobile_phone'),
            ];   
        } else {
            if($request->has('rfc'))
                $origin['rfc'] = $request->input('rfc');
            if($request->has('name'))
                $origin['nombre'] = $request->input('name');
            if($request->has('last_name'))
                $origin['apaterno'] = $request->input('last_name');
            if($request->has('second_last_name'))
                $origin['amaterno'] = $request->input('second_last_name');
            if($request->has('email'))
                $origin['correo'] = $request->input('email');
            if($request->has('telephone'))
                $origin['telefono'] = $request->input('telephone');
            if($request->has('mobile_phone'))
                $origin['celular'] = $request->input('mobile_phone');
        }

        return $origin;
    }

}
