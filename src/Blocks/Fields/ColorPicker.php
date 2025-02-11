<?php

declare(strict_types=1);

namespace Moox\Builder\Blocks\Fields;

use Moox\Builder\Blocks\AbstractBlock;

class ColorPicker extends AbstractBlock
{
    public function __construct(
        string $name,
        string $label,
        string $description,
        bool $nullable = false,
    ) {
        parent::__construct($name, $label, $description, $nullable);

        $this->useStatements = [
            'resource' => [
                'forms' => ['use Filament\Forms\Components\ColorPicker;'],
                'columns' => ['use Filament\Tables\Columns\ColorColumn;'],
            ],
        ];

        $this->addSection('form')
            ->withFields([
                "ColorPicker::make('{$this->name}')
                    ->label('{$this->label}')"
                    .($this->nullable ? '' : '->required()'),
            ]);

        $this->tableColumns['resource'] = [
            sprintf("ColorColumn::make('%s')", $this->name),
        ];

        $this->migrations['fields'] = [
            sprintf("\$table->string('%s', 7)", $this->name)
                .($this->nullable ? '->nullable()' : ''),
        ];

        $this->factories['model']['definitions'] = [
            $this->name => 'fake()->hexColor()',
        ];
    }
}
