<?php

namespace App\Services\Tables;

use App\Application\Tables\BaseColumn;

class QuasarColumn extends BaseColumn
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
