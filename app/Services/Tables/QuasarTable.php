<?php

namespace App\Services\Tables;

use App\Application\Tables\BaseTable;
use App\Services\Tables\Factory\ColumnFactory;

class QuasarTable extends BaseTable
{
    protected function addActions(): BaseTable
    {
        $this->addColumn(
            ColumnFactory::makeActionsColumn()
        );

        return $this;
    }
}
