<?php
/**
 * @var array $board
 */
?>

<div class="board">
    <table border="1" class="board-table">
        <!-- Верхние буквы -->
        <tr>
            <td class="label"></td> <!-- Пустой угол -->
            <?php foreach ($board[1] as $colLetter => $piece): ?>
                <td class="label"><?= $colLetter ?></td>
            <?php endforeach; ?>
            <td class="label"></td> <!-- Пустой угол -->
        </tr>

        <?php foreach ($board as $rowNum => $row): ?>
            <tr>
                <!-- Левый столбец с цифрами -->
                <td class="label"><?= $rowNum ?></td>

                <?php foreach ($row as $colLetter => $piece): ?>
                    <?php
                    $isWhite = ($rowNum + array_search($colLetter, array_keys($row))) % 2 === 0;
                    $colorClass = $isWhite ? 'white' : 'black';
                    $icon = '';

                    // Определение иконки для фигур
                    if ($piece === 'пешка') {
                        $icon = 'fa-chess-pawn';
                    } elseif (!empty($piece)) {
                        $icon = $piece; // Используем классы иконок
                    }
                    ?>
                    <td class="<?= $colorClass ?>">
                        <?php if ($icon): ?>
                            <i class="fas <?= $icon ?> fa-3x" style="color: #b58863;"></i>
                        <?php endif; ?>
                    </td>
                <?php endforeach; ?>

                <!-- Правый столбец с цифрами -->
                <td class="label"><?= $rowNum ?></td>
            </tr>
        <?php endforeach; ?>

        <!-- Нижние буквы -->
        <tr>
            <td class="label"></td> <!-- Пустой угол -->
            <?php foreach ($board[1] as $colLetter => $piece): ?>
                <td class="label"><?= $colLetter ?></td>
            <?php endforeach; ?>
            <td class="label"></td> <!-- Пустой угол -->
        </tr>
    </table>
</div>
