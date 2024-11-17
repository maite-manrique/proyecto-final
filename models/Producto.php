<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Producto extends ActiveRecord
{
    public $imageFile; // Variable para manejar la imagen cargada

    // Define el nombre de la tabla en la base de datos
    public static function tienda2()
    {
        return 'producto';  // Nombre de la tabla en la base de datos
    }

    // En el modelo Producto (app\models\Producto.php)

    // En el modelo Producto (app\models\Producto.php)

// En el modelo Producto (app\models\Producto.php)

    public function getCategorias()
    {
        return $this->hasMany(Categoria::class, ['id' => 'id_categoria'])
            ->viaTable('producto_categoria', ['id_producto' => 'id']);
    }



    // Reglas de validación
    public function rules()
    {
        return [
            [['name', 'price'], 'required'], // Los campos 'name' y 'price' son obligatorios
            [['price'], 'number'], // 'price' debe ser un número
            [['description'], 'string'], // 'description' debe ser una cadena
            ['imageFile', 'file', 'extensions' => 'png, jpg, jpeg', 'skipOnEmpty' => true], // Valida el archivo de imagen
        ];
    }

    // Etiquetas para los atributos (nombres amigables)
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',  // Etiqueta para el nombre
            'price' => 'Price', // Etiqueta para el precio
            'description' => 'Description', // Etiqueta para la descripción
            'imageFile' => 'Product Image', // Etiqueta para la imagen del producto
        ];
    }

    // Función para cargar la imagen
    public function uploadImage()
    {
        if ($this->validate()) {
            // Define la ruta para guardar la imagen
            $filePath = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            // Intenta guardar el archivo en el servidor
            if ($this->imageFile->saveAs($filePath)) {
                $this->image = $filePath;  // Guarda la ruta de la imagen en la base de datos (asegúrate de tener un campo 'image')
                return true;
            }
        }
        return false;
    }
}
?>
