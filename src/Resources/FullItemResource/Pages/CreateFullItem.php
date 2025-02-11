<?php

declare(strict_types=1);

namespace Moox\Builder\Resources\FullItemResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Moox\Builder\Resources\FullItemResource;
use Moox\Core\Traits\Taxonomy\TaxonomyInPages;
use Override;

class CreateFullItem extends CreateRecord
{
    use TaxonomyInPages;

    protected static string $resource = FullItemResource::class;

    #[Override]
    protected function getFormActions(): array
    {
        return [];
    }
}
