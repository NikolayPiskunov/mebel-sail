<?php

namespace App\Application\Tables\Contracts;

interface Table
{
    public function addColumn(Column $column): self;

    public function toArray(): array;
}
