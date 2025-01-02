<?php

namespace Tests\Unit\Services\Tables;

use App\Services\Tables\Factory\ColumnFactory;
use App\Services\Tables\QuasarColumn;
use App\Services\Tables\QuasarTable;
use PHPUnit\Framework\TestCase;

abstract class BaseTableTests extends TestCase
{
    protected const NAME_COLUMN = [
        'label' => 'name',
        'field' => 'name',
        'align' => 'left',
    ];

    protected const EMAIL_COLUMN = [
        'label' => 'email',
        'field' => 'email',
        'align' => 'left',
    ];

    protected function initTable(): QuasarTable
    {
        return new QuasarTable();
    }

    protected function makeNameColumn(): QuasarColumn
    {
        return ColumnFactory::makeFromArray(self::NAME_COLUMN);
    }

    protected function makeEmailColumn(): QuasarColumn
    {
        return ColumnFactory::makeFromArray(self::EMAIL_COLUMN);
    }
}
