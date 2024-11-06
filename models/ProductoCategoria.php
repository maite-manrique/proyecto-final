<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto_categoria".
 *
 * @property int $id_producto
 * @property int $id_categoria
 */
class ProductoCategoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto_categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_producto', 'id_categoria'], 'required'],
            [['id_producto', 'id_categoria'], 'integer'],
            [['id_producto', 'id_categoria'], 'unique', 'targetAttribute' => ['id_producto', 'id_categoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'id_categoria' => 'Id Categoria',
        ];
    }
}
