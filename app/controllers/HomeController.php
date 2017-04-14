<?php
/**
 * Created by PhpStorm.
 * User: SuZuMa
 * Date: 14/04/2017
 * Time: 13:49
 */

namespace App\Controllers;


use App\Models\Producto;
use App\Repositories\ProductoRepository;
use App\Validations\ProductoValidation;
use Core\Controller;

class HomeController extends Controller
{
    private $productoRepo;
    public function __construct() {
        parent::__construct();
        $this->productoRepo=new ProductoRepository();
    }
    public function getindex(){
        $datos=$this->productoRepo->listar();
        return $this->render('home/index.twig',[
            'title'=>'Catalogo de Productos',
            'datos'=>$datos
        ]);
    }
    public function getficharegistro(){
        return $this->render('home/ficharegistro.twig',[
           'title'=>'Ficha de Registro'
        ]);
    }
    public function getlistaproducto(){
        print_r(
            json_encode($this->productoRepo->listar())
        );
    }

    public function postguardar(){
        ProductoValidation::validate($_POST);
        $model=new Producto();
        $model->snombre=$_POST['nombre'];
        $model->sdescripcion=$_POST['descripcion'];
        $model->dprecio=$_POST['precio'];
        $model->ddescuento=$_POST['descuento'];
        $model->simagen=$_POST['imagen'];
        $rh=$this->productoRepo->guardar($model);
        if($rh->response){
            $rh->href='home';
        }
        print_r(
            json_encode($rh)
        );

    }
}