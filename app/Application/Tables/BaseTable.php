<?php

namespace App\Application\Tables;

abstract class BaseTable
{
    /**
     * @var TableColumn[]
     */
    private array $columns = [];

    public function __construct(
        private string $mainField = 'id',
    )
    {
    }

    public function addColumn(TableColumn $column): self
    {
        $this->columns[$column->getField()] = $column;

        return $this;
    }

    public function getMainField(): string
    {
        return $this->mainField;
    }

    public function setMainField(string $mainField): self
    {
        $this->mainField = $mainField;

        return $this;
    }

    public function addActionsIf(bool $needActions): self
    {
        if ($needActions) {
            return $this->addActions();
        }

        return $this;
    }

    public function toArray(): array
    {
        return array_values(
            array_map(function (TableColumn $column) {
                return $column->toArray();
            }, $this->columns)
        );
    }

    abstract protected function addActions(): self;
}
