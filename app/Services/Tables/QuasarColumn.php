<?php

namespace App\Services\Tables;

use App\Application\Tables\TableColumn;

class QuasarColumn extends TableColumn
{
    public function __construct(
        protected string $field = '',
        protected string $label = '',
        protected string $align = 'left',
    )
    {
        //
    }

    public function toArray(): array
    {
        return [
            'name' => $this->field,
            'field' => $this->field,
            'label' => $this->label,
            'align' => $this->align,
        ];
    }
}
