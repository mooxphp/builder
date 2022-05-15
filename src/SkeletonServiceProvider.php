<?php

namespace VendorName\Skeleton;

use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Usetall\TalluiPackages\PackageServiceProvider;
use VendorName\Skeleton\Commands\SkeletonCommand;

class SkeletonServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            // Spatie package tools
            ->name('skeleton')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations()
            ->hasMigration('create_skeleton_table')
            ->hasCommand(SkeletonCommand::class)
            // TallUI package tools
            ->hasModule(BuilderModule::class)
            ->hasWidget(':builder_widget')
            ->hasBlock(':builder_block')
            ->hasAdminTheme(':builder_admin_theme')
            ->hasTheme(':builder_website_theme')
            ->hasDocs();
    }

    public function boot()
    {
        Blade::component(':blade_component', :BladeComponent::class);
        Livewire::component(':livewire_component', :LivewireComponent::class);
    }
}
