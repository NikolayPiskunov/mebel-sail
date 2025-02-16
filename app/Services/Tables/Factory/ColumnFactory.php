<?php

namespace App\Services\Tables\Factory;

use App\Application\Tables\TableColumn;
use App\Services\Tables\QuasarColumn;

class ColumnFactory
{
    // TODO:: пересмотреть класс, чтобы уйити от зависимости от конкретного класса
    public static function makeFromArray(array $properties): TableColumn
    {
        return new QuasarColumn(
            $properties['field'] ?? '',
            $properties['label'] ?? '',
            $properties['align'] ?? 'left'
        );
    }

    public static function makeActionsColumn(string $align = 'left'): TableColumn
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
