<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PlaneaCreateRequest;
use App\Http\Requests\PlaneaUpdateRequest;
use App\Repositories\PlaneaRepository;
use App\Validators\PlaneaValidator;


class PlaneaController extends Controller
{

    /**
     * @var PlaneaRepository
     */
    protected $repository;

    /**
     * @var PlaneaValidator
     */
    protected $validator;

    public function __construct(PlaneaRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($school_id, $detail_id)
    {
        return \Response::json($this->repository->findWhere([
            'detalle_escuela_id' => $detail_id,
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PlaneaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PlaneaCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $planea = $this->repository->create($request->all());

            $response = [
                'message' => 'Planea created.',
                'data'    => $planea->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planea = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $planea,
            ]);
        }

        return view('planeas.show', compact('planea'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $planea = $this->repository->find($id);

        return view('planeas.edit', compact('planea'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PlaneaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PlaneaUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $planea = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Planea updated.',
                'data'    => $planea->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Planea deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Planea deleted.');
    }
}
