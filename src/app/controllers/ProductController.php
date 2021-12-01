<?php
namespace ProyectoWeb\app\controllers;

use ProyectoWeb\exceptions\NotFoundException;
use Psr\Container\ContainerInterface;
use ProyectoWeb\repository\ProductRepository;
use ProyectoWeb\repository\CategoryRepository;


class ProductController
{
    protected $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }
    public function ficha($request, $response, $args) {
        extract($args);
        $title = 
        $repositoryCateg = new CategoryRepository();
        $categorias = $repositoryCateg->findAll();
        $repositorio = new ProductRepository();
        try{
            $producto =$repositorio->findById($id);
        }catch(NotFoundException $nfe){
            $response = new \Slim\Http\Response(404);
            return $response->write("Producto no encontrado");
        }
        $title = $producto->getNombre();
        $relacionados = $repositorio->getRelacionados($producto);
        return $this->container->renderer->render($response, "product.view.php", compact('title', 'categorias', 'producto', 'relacionados'));
    }
}
