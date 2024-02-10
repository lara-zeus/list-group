<?php

namespace LaraZeus\ListGroup;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ListGroupServiceProvider extends PackageServiceProvider
{
    public static string $name = 'zeus-list-group';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasViews();
    }
}
