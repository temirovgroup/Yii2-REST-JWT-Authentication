<?php

/**
 * Created by PhpStorm.
 */

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $datas \app\models\Repo[]|array|\yii\db\ActiveRecord[] */
?>

<?php foreach ($datas as $data) : ?>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <?= $data->name ?>
                </h5>
                <span class="small"><?= $data->full_name ?></span>
                <p class="author"><?= $data->yiisoft ?></p>
                <p>Звёзды: <?= $data->stargazers_count ?></p>
                <p>Просмотры: <?= $data->watchers_count ?></p>
                <a href="<?= $data->html_url ?>" class="btn btn-primary" target="_blank">Перейти</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
