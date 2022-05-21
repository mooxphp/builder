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
            ->name('skeleton')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations()
            ->hasMigration('create_skeleton_table')
            ->hasCommand(SkeletonCommand::class)
            ->hasModule(:BuilderModule::class)
            ->hasWidget(':builder_widget')
            ->hasBlock(':builder_block')
            ->hasAdminTheme(':builder_admin_theme')
            ->hasTheme(':builder_website_theme');
    }

    public function boot()
    {
        $this->bootBladeComponents();
        $this->bootLivewireComponents();
        $this->bootDirectives();
    }

    private function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            $prefix = config(':builder.prefix', '');
            $assets = config(':builder.assets', []);

            /** @var BladeComponent $component */
            foreach (config(':builder.components', []) as $alias => $component) {
                $blade->component($component, $alias, $prefix);

                $this->registerAssets($component, $assets);
            }
        });
    }

    private function bootLivewireComponents(): void
    {
        if (! class_exists(Livewire::class)) {
            return;
        }

        $prefix = config(':builder.prefix', '');
        $assets = config(':builder.assets', []);

        /** @var LivewireComponent $component */
        foreach (config(':builder.livewire', []) as $alias => $component) {
            $alias = $prefix ? "$prefix-$alias" : $alias;

            Livewire::component($alias, $component);

            $this->registerAssets($component, $assets);
        }
    }

    private function registerAssets($component, array $assets): void
    {
        foreach ($component::assets() as $asset) {
            $files = (array) ($assets[$asset] ?? []);

            collect($files)->filter(function (string $file) {
                return Str::endsWith($file, '.css');
            })->each(function (string $style) {
                VendorName\Skeleton::addStyle($style);
            });

            collect($files)->filter(function (string $file) {
                return Str::endsWith($file, '.js');
            })->each(function (string $script) {
                VendorName\Skeleton::addScript($script);
            });
        }
    }

    private function bootDirectives(): void
    {
        Blade::directive(':builderStyles', function (string $expression) {
            return "<?php echo VendorName\Skeleton\\VendorName\Skeleton::outputStyles($expression); ?>";
        });

        Blade::directive(':builderScripts', function (string $expression) {
            return "<?php echo VendorName\Skeleton\\VendorName\Skeleton::outputScripts($expression); ?>";
        });
    }
}
