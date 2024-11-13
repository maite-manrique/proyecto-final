<?php
namespace app\controllers;

use Yii;
use app\models\Cart;
use app\models\Producto;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionAdd($id)
    {
        $Producto = Producto::findOne($id);
        if ($Producto) {
            $cart = new Cart();
            $cart->Producto_id = $Producto->id;
            $cart->user_id = Yii::$app->user->id;
            $cart->quantity = 1;
            $cart->save();
        }
        return $this->redirect(['cart/view']);
    }

        public function actionAdd($productId)
    {
        // Lógica para añadir el producto al carrito

        // Actualizar el número de artículos en la sesión
        $cartCount = Yii::$app->session->get('cart_count', 0);
        Yii::$app->session->set('cart_count', $cartCount + 1);

        return $this->redirect(['cart/index']);
    }


    public function actionView()
    {
        $items = Cart::find()->where(['user_id' => Yii::$app->user->id])->all();
        return $this->render('view', ['items' => $items]);
    }
}
