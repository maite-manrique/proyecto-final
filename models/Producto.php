<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int|null $id
 * @property string|null $nombre_producto
 * @property string|null $descripcion
 * @property string|null $precio
 * @property int|null $stock
 */
class Producto extends \yii\db\ActiveRecord
{
    public $categoria;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'stock'], 'integer'],
            [['nombre_producto', 'descripcion', 'precio'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_producto' => 'Nombre Producto',
            'descripcion' => 'Descripcion',
            'precio' => 'Precio',
            'stock' => 'Stock',
        ];
    }
}
