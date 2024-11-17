<?php

namespace app\controllers;

use app\models\Producto;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;  // Necesario para manejar archivos subidos
use Yii;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends Controller
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
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
   // En ProductoController.php

    public function actionPorCategoria($categoriaId)
    {
        // Obtener todos los productos relacionados con la categoría
        $productos = Producto::find()
            ->innerJoin('producto_categoria', 'producto_categoria.id_producto = producto.id')
            ->where(['producto_categoria.id_categoria' => $categoriaId])
            ->all();

        // Obtener la categoría seleccionada para mostrarla en la vista
        $categoria = Categoria::findOne($categoriaId);

        // Pasar los productos y la categoría a la vista
        return $this->render('productos-por-categoria', [
            'productos' => $productos,
            'categoria' => $categoria,
        ]);
    }


    /**
     * Lists all Producto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        // Obtener todos los productos desde la base de datos
        $productos = Producto::find()->all();  
        
        // Crear un ActiveDataProvider para la paginación
        $dataProvider = new ActiveDataProvider([
            'query' => Producto::find(),  // La consulta para obtener los productos
        ]);
        
        // Renderizar la vista con los productos y el ActiveDataProvider
        return $this->render('index', [
            'productos' => $productos,  // Pasar los productos obtenidos
            'dataProvider' => $dataProvider,  // Pasar el ActiveDataProvider
        ]);
    }
    
    /**
     * Displays a single Producto model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $producto = new Producto(); // Crear una nueva instancia del modelo Producto

        // Verificar si es una solicitud POST
        if ($producto->load(Yii::$app->request->post())) {
            // Obtener el archivo de imagen cargado desde el formulario
            $producto->imageFile = UploadedFile::getInstance($producto, 'imageFile');

            // Verificar si se subió un archivo de imagen
            if ($producto->imageFile) {
                // Definir la ruta de la carpeta multimedia para guardar la imagen
                $path = 'web/multimedia/' . $producto->imageFile->baseName . '.' . $producto->imageFile->extension;

                // Guardar la imagen en el servidor
                if ($producto->imageFile->saveAs($path)) {
                    // Guardar el nombre del archivo de la imagen en el modelo
                    $producto->image = $producto->imageFile->baseName . '.' . $producto->imageFile->extension;
                }
            }

            // Guardar el modelo en la base de datos
            if ($producto->save()) {
                // Mensaje de éxito y redirección a la página de vista del producto creado
                Yii::$app->session->setFlash('success', 'Producto creado correctamente.');
                return $this->redirect(['view', 'id' => $producto->id]);
            }
        }

        // Renderizar el formulario de creación del producto
        return $this->render('create', [
            'producto' => $producto,  // Pasar el modelo a la vista
        ]);
    }

    /**
     * Updates an existing Producto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Verifica si se realizó una solicitud POST
        if (Yii::$app->request->isPost) {
            // Carga los datos del formulario en el modelo
            if ($model->load(Yii::$app->request->post())) {
                // Si se sube una nueva imagen, la procesamos
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

                if ($model->imageFile) {
                    // Definir la ruta de la carpeta multimedia para guardar la imagen
                    $path = 'web/multimedia/' . $model->imageFile->baseName . '.' . $model->imageFile->extension;

                    // Guardar la imagen en el servidor
                    if ($model->imageFile->saveAs($path)) {
                        // Guarda el nombre del archivo de la imagen en el modelo
                        $model->image = $model->imageFile->baseName . '.' . $model->imageFile->extension;
                    }
                }

                // Guardar el modelo en la base de datos
                if ($model->save()) {
                    // Mensaje de éxito y redirección a la página de vista del producto actualizado
                    Yii::$app->session->setFlash('success', 'Producto actualizado correctamente.');
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        // Renderiza el formulario de actualización del producto
        return $this->render('update', [
            'model' => $model, // Pasar el modelo a la vista
        ]);
    }

    /**
     * Deletes an existing Producto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Producto::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
