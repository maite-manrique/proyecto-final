<?php

namespace app\controllers;

use Yii;
use app\models\Compra;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\components\Cart;

/**
 * CompraController implementa las acciones CRUD para el modelo Compra.
 */

class CompraController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'], // Solo permite la eliminación mediante POST
                    ],
                ],
            ]
        );
    }

    /**
     * Lista todos los modelos de Compra.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Compra::find(),
            /*
            'pagination' => [
                'pageSize' => 50 // Tamaño de página para la paginación
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC, // Ordena por ID de manera descendente
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider, // Proveedor de datos para la vista
        ]);
    }

    /**
     * Muestra un único modelo de Compra.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException si el modelo no puede ser encontrado
     */
    public function actionView($id = null)
    {
        // Si se proporciona un ID, se busca el modelo de compra
        if ($id !== null) {
            $model = $this->findModel($id);
            return $this->render('view', [
                'model' => $model, // Pasar el modelo a la vista
            ]);
        }

        // Suponiendo que tienes una función para obtener el carrito
        $cartItems = Yii::$app->cart->getItems(); // Obtiene los productos en el carrito
        $totalPrice = Yii::$app->cart->getTotalPrice(); // Obtiene el precio total
        $paymentMethods = ['Tarjeta de Crédito', 'Tarjeta de Débito', 'Transferencia Bancaria', 'Mercado Pago']; // Métodos de pago

        <div class="btn-group" role="group" aria-label="Métodos de Pago">
             <!-- Tarjeta de Débito -->
            echo Html::a('<i class="bi bi-credit-card"></i> Tarjeta de Débito', ['compra/checkout'], ['class' => 'btn btn-primary']);
    
            <!-- Tarjeta de Crédito -->
            echo Html::a('<i class="bi bi-credit-card-2-front"></i> Tarjeta de Crédito', ['compra/checkout'], ['class' => 'btn btn-secondary']);
            
            <!-- Mercado Pago -->
            echo Html::a('<i class="bi bi-credit-card-2-front"></i> Mercado Pago', ['compra/checkout'], ['class' => 'btn btn-success']);
            
            <!-- Transferencia Bancaria -->
            echo Html::a('<i class="bi bi-bank"></i> Transferencia Bancaria', ['compra/checkout'], ['class' => 'btn btn-info']);
            
            <!-- Efectivo -->
            echo Html::a('<i class="bi bi-cash"></i> Efectivo', ['compra/checkout'], ['class' => 'btn btn-warning']);
        </div>


        return $this->render('view', [
            'cartItems' => $cartItems, // Pasar los elementos del carrito a la vista
            'totalPrice' => $totalPrice, // Pasar el precio total a la vista
            'paymentMethods' => $paymentMethods, // Pasar los métodos de pago a la vista
        ]);
    }

    /**
     * Crea un nuevo modelo de Compra.
     * Si la creación es exitosa, el navegador será redirigido a la página de 'view'.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Compra(); // Crear un nuevo modelo de Compra

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]); // Redirigir a la vista del modelo creado
            }
        } else {
            $model->loadDefaultValues(); // Cargar valores predeterminados
        }

        return $this->render('create', [
            'model' => $model, // Pasar el modelo a la vista de creación
        ]);
    }

    /**
     * Actualiza un modelo existente de Compra.
     * Si la actualización es exitosa, el navegador será redirigido a la página de 'view'.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException si el modelo no puede ser encontrado
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id); // Buscar el modelo a actualizar

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]); // Redirigir a la vista del modelo actualizado
        }

        return $this->render('update', [
            'model' => $model, // Pasar el modelo a la vista de actualización
        ]);
    }

    /**
     * Elimina un modelo existente de Compra.
     * Si la eliminación es exitosa, el navegador será redirigido a la página 'index'.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException si el modelo no puede ser encontrado
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete(); // Eliminar el modelo

        return $this->redirect(['index']); // Redirigir a la lista de compras
    }

    /**
     * Busca el modelo Compra basado en su valor de clave primaria.
     * Si el modelo no es encontrado, se lanzará una excepción HTTP 404.
     * @param int $id ID
     * @return Compra el modelo cargado
     * @throws NotFoundHttpException si el modelo no puede ser encontrado
     */
    protected function findModel($id)
    {
        if (($model = Compra::findOne(['id' => $id])) !== null) {
            return $model; // Retornar el modelo encontrado
        }

        throw new NotFoundHttpException('La página solicitada no existe.'); // Lanzar excepción si no se encuentra el modelo
    }
}
