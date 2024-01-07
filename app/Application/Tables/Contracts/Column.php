<?php

namespace App\Application\Tables\Contracts;

interface Column
{
    public function setField(string $field): self;
    public function getField(): string;
    public function setLabel(string $label): self;
    public function setAlign(string $align): self;

    public function toArray(): array;
}
