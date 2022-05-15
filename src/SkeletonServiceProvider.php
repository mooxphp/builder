<?php

namespace VendorName\Skeleton;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use VendorName\Skeleton\Commands\SkeletonCommand;

class SkeletonServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('skeleton')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations()
            ->hasMigration('create_skeleton_table')
            ->hasCommand(SkeletonCommand::class)
            ->hasModule(':module_name')
            ->hasWidget(':widget_name')
            ->hasBlock(':block_name')
            ->hasAdminTheme(':admin_theme')
            ->hasTheme(':theme_name')
            ->hasDocs();
    }

    public function boot() {
        Livewire::component(':livewire-component', :LivewireComponent::class);
    }
}
