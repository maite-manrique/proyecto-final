namespace app\controllers;

use Yii;
use app\models\Cart;
use app\models\Product;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionAdd($id)
    {
        $product = Product::findOne($id);
        if ($product) {
            $cart = new Cart();
            $cart->product_id = $product->id;
            $cart->user_id = Yii::$app->user->id;
            $cart->quantity = 1;
            $cart->save();
        }
        return $this->redirect(['cart/view']);
    }

    public function actionView()
    {
        $items = Cart::find()->where(['user_id' => Yii::$app->user->id])->all();
        return $this->render('view', ['items' => $items]);
    }
}
