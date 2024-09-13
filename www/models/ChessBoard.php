<?php

namespace app\models;

use yii\db\ActiveRecord;

class ChessBoard extends ActiveRecord
{
    public $rows = 8;
    public $columns = 8;
    public $letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];

    public function getBoard()
    {
        $numbers = range(8, 1);
        $board = [];

        // Генерируем клетки доски
        for ($i = 0; $i < $this->rows; $i++) {
            $row = [];
            // Номер слева
            $row[] = $numbers[$i];

            // Клетки доски
            for ($j = 0; $j < $this->columns; $j++) {
                $color = ($i + $j) % 2 === 0 ? 'white' : 'black';
                $piece = '';

                // Определяем фигуры
                if ($i == 1) {
                    $piece = 'pawn'; // Черные пешки
                } elseif ($i == 6) {
                    $piece = 'pawn'; // Белые пешки
                } elseif ($i == 0) {
                    $pieces = ['rook', 'knight', 'bishop', 'queen', 'king', 'bishop', 'knight', 'rook'];
                    $piece = $pieces[$j]; // Черные фигуры
                } elseif ($i == 7) {
                    $pieces = ['rook', 'knight', 'bishop', 'queen', 'king', 'bishop', 'knight', 'rook'];
                    $piece = $pieces[$j]; // Белые фигуры
                }

                $row[] = ['color' => $color, 'piece' => $piece];
            }

            // Номер справа
            $row[] = $numbers[$i];
            $board[] = $row;
        }

        return $board;
    }
}

