<?php
/**
 * Created by PhpStorm.
 * User: SuZuMa
 * Date: 14/04/2017
 * Time: 13:43
 */

namespace App\Validations;

use Couchbase\Exception;
use Respect\Validation\Validator as v;
use App\Helpers\ResponseHelper;

class ProductoValidation
{
    public static function validate(array $model){
        try{
            $v=v::key('nombre',v::stringType()->notEmpty())
                ->key('descripcion',v::stringType()->notEmpty())
                ->key('imagen',v::stringType()->notEmpty())
                ->key('precio',v::stringType()->notEmpty());
            $v->assert($model);
        }catch (Exception $e){
            $rh = new ResponseHelper();
            $rh->setResponse(false, null);
            $rh->validations = $e->findMessages([
                'nombre'=>'{{name}} es requerido',
                'descripcion'=>'{{name}} es requerido',
                'imagen'=>'{{name}} es requerido',
                'precio'=>'{{name}} es requerido'
            ]);
            exit(json_encode($rh));
        }

    }

}