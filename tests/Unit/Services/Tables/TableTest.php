<?php

namespace Tests\Unit\Services\Tables;

use App\Application\Tables\BaseTable;
use App\Services\Tables\Factory\TableFactory;

class TableTest extends BaseTableTests
{
    public function test_add_column(): void
    {
        $table = $this->initTable();

        $nameColumn = $this->makeNameColumn();
        $emailColumn = $this->makeEmailColumn();


        $table->addColumn($nameColumn);
        $this->assertCount(1, $table->toArray());

        $table->addColumn($emailColumn);
        $this->assertCount(2, $table->toArray());

        $table->addActionsIf(true);
        $this->assertCount(3, $table->toArray());
    }

    public function test_no_dublicates_columns(): void
    {
        $table = $this->initTable();

        $nameColumn = $this->makeNameColumn();
        $emailColumn = $this->makeEmailColumn();

        $table->addColumn($nameColumn);
        $this->assertCount(1, $table->toArray());

        $table->addColumn($nameColumn);
        $this->assertCount(1, $table->toArray());

        $table->addColumn($emailColumn);
        $this->assertCount(2, $table->toArray());

        $table->addColumn($emailColumn);
        $this->assertCount(2, $table->toArray());

        $table->addActionsIf(true);
        $this->assertCount(3, $table->toArray());

        $table->addActionsIf(true);
        $this->assertCount(3, $table->toArray());
    }

    public function test_table_factory(): void
    {
        $config = [
            self::NAME_COLUMN,
            self::EMAIL_COLUMN,
        ];

        $table = TableFactory::createTable($config);

        $this->assertInstanceOf( BaseTable::class, $table);
        $this->assertCount(2, $table->toArray());
    }
}
