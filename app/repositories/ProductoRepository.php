<?php
/**
 * Created by PhpStorm.
 * User: SuZuMa
 * Date: 14/04/2017
 * Time: 13:37
 */

namespace App\Repositories;


use App\Helpers\ResponseHelper;
use App\Models\Producto;
use Illuminate\Support\Collection;

class ProductoRepository
{
    private $producto;
    public function __construct()
    {
        $this->producto=new Producto();
    }

    public function guardar(Producto $model):ResponseHelper{
        $rh=new ResponseHelper();
        try{
            $this->producto->id=$model->id;
            $this->producto->snombre=$model->snombre;
            $this->producto->sdescripcion=$model->sdescripcion;
            $this->producto->dprecio=$model->dprecio;
            $this->producto->ddescuento=$model->ddescuento;
            $this->producto->simagen=$model->simagen;
            if(!empty($model->id)){
                $this->producto->exists=true;
            }
            $this->producto->save();
            $rh->setResponse(true);
        } catch (Exception $e) {
            Log::error(ProductoRepository::class, $e->getMessage());
        }

        return $rh;
    }



    public function listar() : Collection {
        $result = [];
        try {
            $result = $this->producto
                ->orderBy('snombre')
                ->get();
        } catch (Exception $e) {
            Log::error(ProductoRepository::class, $e->getMessage());
        }

        return $result;
    }
}