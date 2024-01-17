<?php

namespace App\Services\Tables\Factory;

use App\Application\Tables\Contracts\Column;
use App\Services\Tables\QuasarColumn;

class ColumnFactory
{
    // TODO:: пересмотреть класс, чтобы уйити от зависимости от конкретного класса
    public static function makeFromArray(array $properties): Column
    {
        return new QuasarColumn(
            $properties['field'] ?? '',
            $properties['label'] ?? '',
            $properties['align'] ?? 'left'
        );
    }

    public static function makeActionsColumn(string $align = 'left'): Column
    {
        $field = 'actions';
        $label = 'Действия';

        return new QuasarColumn(
            $field,
            $label,
            $align
        );
    }
}
