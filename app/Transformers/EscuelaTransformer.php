<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Escuela;

/**
 * Class EscuelaTransformer
 * @package namespace App\Transformers;
 */
class EscuelaTransformer extends TransformerAbstract
{

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
    ];

    /**
     * Transform the \Escuela entity
     * @param \Escuela $model
     *
     * @return array
     */
    public function transform(Escuela $model)
    {
        return [
            'id'          => (int) $model->id,
            'name'        => $model->nombre_ct,
            'address'     => $model->direccion,
            'colony'      => $model->colonia,
            'postal_code' => $model->codigo_postal,
            'latitude'    => $model->latitud,
            'longitude'   => $model->longitud,
            'links'   => [
                [
                    'rel' => 'self',
                    'href' => '/v0.1/schools/' . $model->id
                ],
                [
                    'rel' => 'details',
                    'href' => '/v0.1/schools/' . $model->id . '/details'
                ],
            ],
        ];
    }

    /**
     * Include Detalles
     *
     * @param App\Entities\Escuela $escuela
     * @return \League\Fractal\Resource\Item
     */
    public function includeDetalles(Escuela $escuela)
    {
        $detalles = $escuela->detalles;

        return $this->collection($detalles, new DetalleEscuelaTransformer);
    }

    /**
     * Include Location
     *
     * @param App\Entities\Escuela $escuela
     * @return \League\Fractal\Resource\Item
     */
    public function includeLocation(Escuela $escuela)
    {
        $localidad = $escuela->localidad;

        return $this->item($localidad, new LocalidadInegiTransformer);
    }

    /**
     * Include Municipality
     *
     * @param App\Entities\Escuela $escuela
     * @return \League\Fractal\Resource\Item
     */
    public function includeMunicipality(Escuela $escuela)
    {
        $municipality = $escuela->municipio;

        return $this->item($municipality, new MunicipioInegiTransformer);
    }



}
