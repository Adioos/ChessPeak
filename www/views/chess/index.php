<?php
/* @var $this yii\web\View */
/* @var $board array */
/* @var $letters array */

use yii\helpers\Html;

?>

<div class="chess-board-wrapper">
    <div class="chess-board">
        <!-- Верхняя строка с буквами -->
        <div class="row header">
            <div class="cell header-cell"></div> <!-- Пустая ячейка для верхнего левого угла -->
            <?php foreach ($letters as $letter): ?>
                <div class="cell header-cell">
                    <?= Html::encode($letter) ?>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Основные строки доски с цифрами слева и справа -->
        <?php foreach ($board as $row): ?>
            <div class="row">
                <div class="cell number-cell">
                    <?= Html::encode($row[0]) ?>
                </div>
                <?php foreach (array_slice($row, 1, -1) as $cell): ?>
                    <div class="cell"
                         style="
                                 background-color: <?= Html::encode($cell['color']) ?>;
                                 ">
                        <?= Html::encode($cell['piece']) ?>
                    </div>
                <?php endforeach; ?>
                <div class="cell number-cell">
                    <?= Html::encode(end($row)) ?>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Нижняя строка с буквами -->
        <div class="row header">
            <div class="cell header-cell"></div> <!-- Пустая ячейка для нижнего левого угла -->
            <?php foreach ($letters as $letter): ?>
                <div class="cell header-cell">
                    <?= Html::encode($letter) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
