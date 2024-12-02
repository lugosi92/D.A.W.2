<?php
require_once __DIR__ . '/../model/categoria/CategoriasMysqli.php';

class CategoriaController
{
    public function showCategoriaById($id)
    {
        $categoriaModel = new CategoriaMysqli();
        return $categoriaModel->getCategoriaById($id);
    }

    public function showCategorias(){
        $categoriaModel = new CategoriaMysqli();
        return $categoriaModel->getCategorias();
    }

    public function createCategoria($nombre, $descripcion)
    {
        $categoria = new CategoriaObject(null, $nombre, $descripcion);
        $categoriaModel = new CategoriaMysqli();
        $categoriaModel->setCategoria($categoria);

        return $categoriaModel->insertCategoria();
    }

    // public function updateCategoria($id, $nombre, $descripcion)
    // {
    //     $categoria = new CategoriaObject($id, $nombre, $descripcion);
    //     $categoriaModel = new CategoriaMysqli();
    //     $categoriaModel->setCategoria($categoria);

    //     return $categoriaModel->updateCategoria();
    // }
    

    public function removeCategoria($id)
    {
        $categoriaModel = new CategoriaMysqli();
        return $categoriaModel->deleteCategoria($id);
    }
}
