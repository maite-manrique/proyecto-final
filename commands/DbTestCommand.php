<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\db\Exception;

class DbTestCommand extends Controller
{
    // Acción para probar la conexión a la base de datos desde la consola
    public function actionTest()
    {
        try {
            $db = Yii::$app->db;
            $db->open();
            echo "Conexión exitosa!\n";
        } catch (Exception $e) {
            echo "Error de conexión: " . $e->getMessage() . "\n";
        }
    }
}
