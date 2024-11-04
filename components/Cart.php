<?php

namespace app\components;

use Yii;

class Cart
{
    protected $items = [];

    //Agregar un producto al carrito
    public function addItem($item)
    {
        // Añade lógica para agregar un ítem al carrito
        $this->items[] = $item;
    }

    //Obtener todos los productos del carrito
    public function getItems()
    {
        return $this->items;
    }

    //Conteo de productos en el carrito
    public function getItemCount()
    {
        return count($this->items);
    }

    //Precio total de los productos en el carrito
    public function getTotalPrice()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function clear()
    {
        $this->items = [];
    }
}
