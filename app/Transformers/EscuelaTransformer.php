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
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'details',
        'location',
        'municipality',
    ];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'details',
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
            'id'           => (int) $model->id,
            'name'         => $model->nombre_ct,
            'address'      => $model->direccion,
            'colony'       => $model->colonia,
            'postal_code'  => (int) $model->codigo_postal,
            'location'     => $model->localidad->nombre,
            'municipality' => $model->municipio->nombre,
            'state'        => $model->estado,
            'latitude'     => (double) $model->latitud,
            'longitude'    => (double) $model->longitud,
            'links'   => [
                'self' => '/api/v0.1/schools/' . $model->id,
                'details' => '/api/v0.1/schools/' . $model->id . '/details',
                'location' => '/api/v0.1/inegi/locations/' . $model->localidad_inegi_id,
                'municipality' => '/api/v0.1/inegi/municipalities/' . $model->municipio_inegi_id,
            ],
        ];
    }

    /**
     * Include Details
     *
     * @param App\Entities\Escuela $escuela
     * @return \League\Fractal\Resource\Collection
     */
    public function includeDetails(Escuela $escuela)
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
