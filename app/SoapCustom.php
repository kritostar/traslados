<?php

namespace App;

use SoapClient;;
use Carbon\Carbon;

class SoapCustom extends SoapClient
{

    /**
     * @var string
     */
    protected $name = 'afiliados';

    /**
     * @var string
     */
    protected $wsdl = 'http://sistemaintegral.ipross.rionegro.gov.ar/IPROSS_WS/servlet/abewsvalidaafi?wsdl';

    /**
     * @var boolean
     */
    protected $trace = true;

    /**
     * Get all the available functions
     *
     * @return mixed
     */
    public function functions()
    {
        return $this->__getFunctions();
    }

    public function afiliado($afiliado, $fecha_internacion)
    {
        $data = [
            'Usuario'    => null,
            'Passwd'     => null,
            'Nafiliado'  => $afiliado,
            'Ogorcodigo' => null,
            'Fechpresta' => Carbon::parse($fecha_internacion)->format('Y/m/d'),
        ];

        $afiliado = [
            'apellido_nombre'  => $this->__call('Execute', [$data])->Apenom,
            'fecha_nacimiento' => Carbon::parse($this->__call('Execute', [$data])->Fechanac)->format('d-m-Y'),
            'estado'           => $this->__call('Execute', [$data])->Estado,
            'sexo'             => $this->__call('Execute', [$data])->Sexo,
            'edad'             => $this->__call('Execute', [$data])->Edad,
            'numero_afi'       => $afiliado,
        ];

        return $afiliado;
    }

}
