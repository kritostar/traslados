<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SoapCustom;

class WebserviceController extends Controller
{
    public function abewsvalidaafi(){

        /*$mode = array (
            'soap_version'  => 'SOAP_1_1', // use soap 1.1 client
            'keep_alive'    => true,
            'trace'         => true,
            'encoding'      => 'utf-8',
            'compression'   => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE,
            'exceptions'    => true,
            'cache_wsdl'    => WSDL_CACHE_NONE,
            'stream_context' => stream_context_create ( 
                array (
                    'http' => array('header' => 'Content-Encoding: XXXXXXX'),
                )
            )
        );
        $client = new SoapClient('http://sistemaintegral.ipross.rionegro.gov.ar/IPROSS_WS/servlet/abewsvalidaafi?wsdl', $mode);
        $results = $client->Execute("02-3867691/00", "2019-09-19");

        print_r($results);*/
        ini_set("soap.wsdl_cache_enabled", "0");
        $soap = new SoapCustom('http://sistemaintegral.ipross.rionegro.gov.ar/IPROSS_WS/servlet/abewsvalidaafi?wsdl');
        $functions = $soap->functions();
        echo "<pre>";
        var_dump ($functions);
        echo "</pre>";
        $afiliado = $soap->afiliado("02-3867691/00", "2019-09-19");
        return response()->json($afiliado, 200);
        
    }
}
