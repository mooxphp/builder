<?php

declare(strict_types=1);

namespace Moox\Builder\Traits;

use Illuminate\Support\Facades\DB;
use RuntimeException;

trait ValidatesEntity
{
    protected function validateEntityExists(int $entityId): void
    {
        if (! DB::table('builder_entities')->where('id', $entityId)->exists()) {
            throw new RuntimeException(sprintf('Entity %d not found', $entityId));
        }
    }

    protected function validateBuildExists(int $entityId, string $buildContext): void
    {
        if (! DB::table('builder_entity_builds')
            ->where('entity_id', $entityId)
            ->where('build_context', $buildContext)
            ->where('is_active', true)
            ->exists()
        ) {
            throw new RuntimeException(sprintf('No active build found for entity %d in context %s', $entityId, $buildContext));
        }
    }
}
