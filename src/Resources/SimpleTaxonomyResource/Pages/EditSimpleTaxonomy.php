<?php

declare(strict_types=1);

namespace Moox\Builder\Resources\SimpleTaxonomyResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Moox\Builder\Resources\SimpleTaxonomyResource;
use Moox\Core\Traits\Taxonomy\TaxonomyInPages;
use Override;

class EditSimpleTaxonomy extends EditRecord
{
    use TaxonomyInPages;

    protected static string $resource = SimpleTaxonomyResource::class;

    #[Override]
    public function mount($record): void
    {
        $this->record = $this->resolveRecord($record);

        $this->authorizeAccess();

        $this->fillForm();
    }

    protected function getHeaderActions(): array
    {
        return [];
    }

    #[Override]
    protected function getFormActions(): array
    {
        return [];
    }
}
