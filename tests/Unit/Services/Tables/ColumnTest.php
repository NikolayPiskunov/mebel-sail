<?php

namespace Tests\Unit\Services\Tables;

use App\Application\Tables\TableColumn;

class ColumnTest extends BaseTableTests
{
    public function test_create_column(): void
    {
        $column = $this->makeNameColumn();

        $this->assertInstanceOf(TableColumn::class, $column);
    }

    public function test_column_fields(): void
    {
        $testField = array_merge(['name' => self::NAME_COLUMN['field']], self::NAME_COLUMN);

        $column = $this->makeNameColumn();
        $this->assertEquals($testField, $column->toArray());
        $this->assertEquals(self::NAME_COLUMN['field'], $column->getField());
    }

    public function test_update_field(): void
    {
        $updatedField = [
            'name' => 'updated field',
            'field' => 'updated field',
            'label' => 'updated label',
            'align' => 'right',
        ];

        $column = $this->makeNameColumn();

        $column->setField($updatedField['field']);
        $this->assertEquals($updatedField['field'], $column->getField());
        $column->setLabel($updatedField['label']);
        $column->setAlign($updatedField['align']);

        $this->assertEquals($updatedField, $column->toArray());
    }
}
