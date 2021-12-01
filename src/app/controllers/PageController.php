<?php
namespace ProyectoWeb\app\controllers;

use Psr\Container\ContainerInterface;
use ProyectoWeb\repository\ProductRepository;

class PageController
{
    protected $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }
    public function home($request, $response, $args) {
        $title = "Inicio";
        $repository = new ProductRepository();
        $carrusel = $repository->getCarrusel();
        $destacados = $repository->getDestacados();
        return $this->container->renderer->render($response, "index.view.php", compact('title', 'carrusel', 'destacados'));
    }
}
