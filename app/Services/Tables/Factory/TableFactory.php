<?php

namespace App\Services\Tables\Factory;

use App\Services\Tables\QuasarTable;

class TableFactory
{
    public static function createTable(array $config): QuasarTable
    {
        $table = new QuasarTable();

        foreach ($config as $item) {
            $column = ColumnFactory::makeFromArray($item);
            $table->addColumn($column);
        }

        return $table;
    }
}
