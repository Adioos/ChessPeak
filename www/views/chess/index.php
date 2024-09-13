<?php
/* @var $this yii\web\View */
/* @var $board array */

use yii\helpers\Html;

?>

<div class="chess-board-wrapper">
    <div class="chess-board">
        <?php foreach ($board as $row): ?>
            <div class="row">
                <?php foreach ($row as $cell): ?>
                    <div class="cell"
                         style="
                                 background-color: <?= in_array($cell, ['white', 'black']) ? Html::encode($cell) : '#a9a9a9' ?>;
                                 ">
                        <?= !in_array($cell, ['white', 'black']) ? Html::encode($cell) : '' ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
