<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Compra $model */

$this->title = "mi carrito";
\yii\web\YiiAsset::register($this);
?>
<div class="compra-view">
    <br><br>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <!-- informacion de productos -->
    <div class="col-8">
        <div class="card carritofond">

        </div>
    </div>
    <!-- informacion final de compra -->
     <div class="col-4 fondcarrito">

     </div>
    </div>
    

</div>
