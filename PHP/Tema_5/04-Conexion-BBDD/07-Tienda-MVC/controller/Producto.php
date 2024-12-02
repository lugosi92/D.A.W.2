<?php
require_once __DIR__ . '/../model/producto/ProductosObject.php';
require_once __DIR__ . '/../model/producto/ProductosMysqli.php';

class ProductoController
{

    // Insertar un nuevo producto
    public function createProducto($nombre, $descripcion, $peso, $stock, $categoria_id)
    {
        $categoria = new CategoriaMysqli();
        $categoria_obj = $categoria->getCategoriaById($categoria_id);
        if ($categoria_obj) {
            $producto = new ProductoObject(null, $nombre, $descripcion, $peso, $stock, $categoria_obj);
            $productoMysqli = new ProductoMysqli($producto);
            return $productoMysqli->insertProducto();
        } else {
            return null;
        }
    }

    // Obtener todos los productos
    public function showProductos()
    {
        $productoMysqli = new ProductoMysqli();
        return $productoMysqli->getProductos();
    }

    // Obtener un producto por su ID
    public function showProductoById($id)
    {
        $productoMysqli = new ProductoMysqli();
        return $productoMysqli->getProductoById($id);
    }

    // Obtener productos por ID de categoría
    public function showProductosByCategoriaId($categoria_id)
    {
        $productoMysqli = new ProductoMysqli();
        return $productoMysqli->getProductosByCategoriaId($categoria_id);
    }

    // Eliminar un producto
    public function removeProducto($id)
    {
        $productoMysqli = new ProductoMysqli();
        return $productoMysqli->deleteProducto($id);
    }

    // Actualizar un producto
    public function changeProducto($id, $nombre, $descripcion, $peso, $stock, $categoria_id)
    {
        $categoria = new CategoriaMysqli();
        $categoria_obj = $categoria->getCategoriaById($categoria_id);

        if ($categoria_obj) {
            $producto = new ProductoObject($id, $nombre, $descripcion, $peso, $stock, $categoria_obj);
            $productoMysqli = new ProductoMysqli($producto);
            return $productoMysqli->updateProducto();
        } else {
            return null;  // La categoría no existe
        }
    }
}
