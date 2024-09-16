<?php

namespace app\controllers;

use app\models\ChessBoard;
use yii\web\Controller;

class ChessController extends Controller
{
    public function actionIndex()
    {
        $model = new ChessBoard();
        $board = $model->getBoard();
        return $this->render('index', [
            'board' => $board
        ]);
    }
}