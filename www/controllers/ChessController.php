<?php

namespace app\controllers;

use app\models\ChessBoard;
use yii\web\Controller;

class ChessController extends Controller
{
    public function actionIndex()
    {
        $chessBoard = new ChessBoard();
        return $this->render('index', ['board' => $chessBoard->getBoard()]);
    }
}