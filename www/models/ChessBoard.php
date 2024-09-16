<?php

namespace app\models;

use yii\db\ActiveRecord;

class ChessBoard extends ActiveRecord
{
    public int $rows = 8;
    public int $columns = 8;
    public array $letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
    public array $numbers = [8, 7, 6, 5, 4, 3, 2, 1];
    public array $pieces = [
        'fa-chess-rook',
        'fa-chess-knight',
        'fa-chess-bishop',
        'fa-chess-queen',
        'fa-chess-king',
        'fa-chess-bishop',
        'fa-chess-knight',
        'fa-chess-rook'
    ];

    public function getBoard(): array
    {
        $board = [];

        // Добавляем фигуры для белых
        $board[1] = array_combine($this->letters, $this->pieces);  // 1-я строка для основных фигур
        $board[2] = array_fill(0, $this->columns, 'пешка');         // 2-я строка для пешек

        // Добавляем пустые клетки
        for ($i = 3; $i <= 6; $i++) {
            $board[$i] = array_fill(0, $this->columns, '');
        }

        // Добавляем фигуры для черных
        $board[7] = array_fill(0, $this->columns, 'пешка');         // 7-я строка для пешек
        $board[8] = array_combine($this->letters, $this->pieces);  // 8-я строка для основных фигур

        return $board;
    }
}
