<?php

namespace App\Dvonrohr\UXCalendar\Model;

/**
 * @author Daniel Von Rohr <d.rudolf.von.rohr@gmail.com>
 *
 * @final
 * @experimental
 */
class Calendar
{
    private $attributes = [];
    private $data = [];
    private $options = [];

    public function setData(array $data)
    {
        $this->data = $data;
    }

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getDataController(): ?string
    {
        return $this->attributes['data-controller'] ?? null;
    }

    public function createView(): array
    {
        return [
            'data' => $this->data,
            'options' => $this->options,
        ];
    }
}