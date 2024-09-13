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

        // Добавляем верхние буквы
        $board[0][0] = ''; // пустая ячейка в углу
        foreach ($this->letters as $letter) {
            $board[0][] = $letter; // буквы сверху
        }
        $board[0][] = ''; // пустая ячейка в другом углу

        // Генерируем клетки доски с номерами слева и справа
        for ($i = 0; $i < $this->rows; $i++) {
            $row = [];

            // Номер слева
            $row[] = $numbers[$i];

            // Клетки доски
            for ($j = 0; $j < $this->columns; $j++) {
                $row[] = ($i + $j) % 2 === 0 ? 'white' : 'black';
            }

            // Номер справа
            $row[] = $numbers[$i];

            $board[] = $row;
        }

        // Добавляем нижние буквы
        $bottomRow = [''];
        foreach ($this->letters as $letter) {
            $bottomRow[] = $letter;
        }
        $bottomRow[] = '';
        $board[] = $bottomRow;

        return $board;
    }
}
