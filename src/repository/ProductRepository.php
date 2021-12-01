<?php
namespace ProyectoWeb\repository;

use ProyectoWeb\database\QueryBuilder;
use ProyectoWeb\entity\Product;

class ProductRepository extends QueryBuilder
{
    public function __construct(){
        parent::__construct('productos', 'Product');
    }

    public  function getCarrusel()
    {
        $sql = "SELECT * FROM productos WHERE carrusel IS NOT NULL AND carrusel != ''";
        return $this->executeQuery($sql);
        
    }

    public  function getDestacados()
    {
        $sql = "SELECT * FROM productos WHERE destacado = 1";
        return $this->executeQuery($sql);
        
    }

    public  function getNovedades()
    {
        $sql = "SELECT * FROM productos ORDER BY fecha DESC LIMIT 6";
        return $this->executeQuery($sql);
        
    }

    public  function getRelacionados(Product $producto)
    {
        $sql = "SELECT * FROM productos WHERE id_categoria = " . $producto->getIdCategoria() .
                " AND id != " . $producto->getId() . " ORDER BY RAND() LIMIT 6";
        return $this->executeQuery($sql);
        
    }
    public  function getByCategory(int $idCategoria)
    {
        $sql = "SELECT * FROM productos WHERE id_categoria = $idCategoria";
        return $this->executeQuery($sql);
        
    }
}