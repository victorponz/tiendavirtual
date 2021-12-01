<?php
namespace ProyectoWeb\app\controllers;

use Psr\Container\ContainerInterface;

class CartController
{
    protected $container;
   
    // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }
    public function render($request, $response, $args) {
        extract($args);
        $title = " Carrito ";
        $withCategories = false;
        return $this->container->renderer->render($response, "cart.view.php", compact('title', 'withCategories'));
    }
}