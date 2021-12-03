<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Поиск</h1>

        <div class="form-wrap d-flex w-100 justify-content-center">
            <div class="w-50 d-flex justify-content-between">
                <input class="form-control search-query" type="text" placeholder="Введите название проекта">
                <button class="btn btn-success search-repo">Найти</button>
            </div>
        </div>
    </div>

    <div class="body-content">

        <div class="alert alert-info searching d-none">Выполняется поиск...</div>
        <div class="row cards-wrap"></div>

    </div>
</div>
