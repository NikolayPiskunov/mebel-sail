<?php

namespace App\Application\Tables;

abstract class TableColumn
{
    protected string $field = '';
    protected string $label = '';
    protected string $align = 'left';

    public function setField(string $field): self
    {
        $this->field = $field;

        return $this;
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function setAlign(string $align): self
    {
        $this->align = $align;

        return $this;
    }

    abstract public function toArray(): array;
}
