<?php

namespace NascentAfrica\Jetstrap;

use Illuminate\Filesystem\Filesystem;

/**
 * Class Presets
 *
 * @package NascentAfrica\Jetstrap
 */
class Presets
{
    /**
     * @var string
     */
    const CORE_UI_3 = 'core-ui-3';

    /**
     * @var string
     */
    const ADMIN_LTE_3 = 'admin-lte-3';

    /**
     * Make Core Ui swaps
     *
     * @param string $stack
     * @return void
     */
    public static function setupCoreUi3(string $stack)
    {

        // NPM Packages...
        Helpers::updateNodePackages(function ($packages) {
            return [
                    "@coreui/coreui" => "^3.3.0",
                    "@fortawesome/fontawesome-free" => "^5.15.1",
                    "@popperjs/core" => "^2.5.3",
                    "perfect-scrollbar" => "^1.5.0"
                ] + $packages;
        });

        copy(__DIR__.'/../../presets/CoreUi/webpack.mix.js', base_path('webpack.mix.js'));

        (new Filesystem)->copyDirectory(__DIR__.'/../../presets/CoreUi/public/assets', public_path('/assets'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../presets/CoreUi/resources/sass', resource_path('sass/core-ui'));

        copy(__DIR__ . '/../../presets/CoreUi/resources/js/core-ui.js', resource_path('js/core-ui.js'));

        if ($stack == 'livewire') {

            copy(__DIR__ . '/../../presets/CoreUi/resources/views/auth/login.blade.php', resource_path('views/auth/login.blade.php'));
            copy(__DIR__ . '/../../presets/CoreUi/resources/views/auth/register.blade.php', resource_path('views/auth/register.blade.php'));
            copy(__DIR__ . '/../../presets/CoreUi/resources/views/layouts/app.blade.php', resource_path('views/layouts/app.blade.php'));

            copy(__DIR__ . '/../../presets/CoreUi/resources/views/components/authentication-card.blade.php', resource_path('views/vendor/jetstream/components/authentication-card.blade.php'));
            copy(__DIR__ . '/../../presets/CoreUi/resources/views/components/button.blade.php', resource_path('views/vendor/jetstream/components/button.blade.php'));
            copy(__DIR__ . '/../../presets/CoreUi/resources/views/components/dropdown.blade.php', resource_path('views/vendor/jetstream/components/dropdown.blade.php'));
            copy(__DIR__ . '/../../presets/CoreUi/resources/views/components/dropdown-link.blade.php', resource_path('views/vendor/jetstream/components/dropdown-link.blade.php'));
            copy(__DIR__ . '/../../presets/CoreUi/resources/views/components/nav-link.blade.php', resource_path('views/vendor/jetstream/components/nav-link.blade.php'));
            copy(__DIR__ . '/../../presets/CoreUi/resources/views/components/welcome.blade.php', resource_path('views/vendor/jetstream/components/welcome.blade.php'));

            copy(__DIR__ . '/../../presets/CoreUi/resources/views/layouts/guest.blade.php', resource_path('views/layouts/guest.blade.php'));

        } elseif ($stack == 'inertia') {

            // Necessary for vue compilation
            copy(__DIR__.'/../../presets/CoreUi/inertia/webpack.mix.js', base_path('webpack.mix.js'));

            copy(__DIR__ . '/../../presets/CoreUi/inertia/resources/views/app.blade.php', resource_path('views/app.blade.php'));
            copy(__DIR__ . '/../../presets/CoreUi/inertia/resources/js/Layouts/AppLayout.vue', resource_path('js/Layouts/AppLayout.vue'));

            copy(__DIR__ . '/../../presets/CoreUi/inertia/resources/js/Jetstream/Button.vue', resource_path('js/Jetstream/Button.vue'));
            copy(__DIR__ . '/../../presets/CoreUi/inertia/resources/js/Jetstream/Dropdown.vue', resource_path('js/Jetstream/Dropdown.vue'));
            copy(__DIR__ . '/../../presets/CoreUi/inertia/resources/js/Jetstream/DropdownLink.vue', resource_path('js/Jetstream/DropdownLink.vue'));
            copy(__DIR__ . '/../../presets/CoreUi/inertia/resources/js/Jetstream/NavLink.vue', resource_path('js/Jetstream/NavLink.vue'));
            copy(__DIR__ . '/../../presets/CoreUi/inertia/resources/js/Jetstream/Welcome.vue', resource_path('js/Jetstream/Welcome.vue'));

        } elseif ($stack == 'breeze') {

            copy(__DIR__ . '/../../presets/CoreUi/breeze/resources/views/layouts/app.blade.php', resource_path('views/layouts/app.blade.php'));
            copy(__DIR__ . '/../../presets/CoreUi/breeze/resources/views/layouts/navigation.blade.php', resource_path('views/layouts/navigation.blade.php'));

            copy(__DIR__ . '/../../presets/CoreUi/resources/views/components/dropdown.blade.php', resource_path('views/components/dropdown.blade.php'));
            copy(__DIR__ . '/../../presets/CoreUi/resources/views/components/dropdown-link.blade.php', resource_path('views/components/dropdown-link.blade.php'));
            copy(__DIR__ . '/../../presets/CoreUi/resources/views/components/nav-link.blade.php', resource_path('views/components/nav-link.blade.php'));
            copy(__DIR__ . '/../../presets/CoreUi/resources/views/components/button.blade.php', resource_path('views/components/button.blade.php'));

        }
    }

    /**
     * Make AdminLte swaps
     *
     * @param string $stack
     * @return void
     */
    public static function setupAdminLte3(string $stack)
    {
        copy(__DIR__ . '/../../presets/AdminLte/resources/js/admin-lte.js', resource_path('js/admin-lte.js'));
        copy(__DIR__ . '/../../presets/AdminLte/resources/sass/admin-lte.scss', resource_path('sass/admin-lte.scss'));

        copy(__DIR__.'/../../presets/AdminLte/webpack.mix.js', base_path('webpack.mix.js'));

        // NPM Packages...
        Helpers::updateNodePackages(function ($packages) {
            return [
                    "@fortawesome/fontawesome-free" => "^5.15.1",
                    "admin-lte" => "^3.0.5",
                    "overlayscrollbars" => "^1.13.0"
                ] + $packages;
        });

        if ($stack == 'livewire') {

            copy(__DIR__ . '/../../presets/AdminLte/resources/views/layouts/guest.blade.php', resource_path('views/layouts/guest.blade.php'));
            (new Filesystem)->copyDirectory(__DIR__.'/../../presets/AdminLte/resources/views/auth', resource_path('views/auth'));

            copy(__DIR__ . '/../../presets/AdminLte/resources/views/layouts/app.blade.php', resource_path('views/layouts/app.blade.php'));

            copy(__DIR__ . '/../../presets/AdminLte/resources/views/components/authentication-card.blade.php', resource_path('views/vendor/jetstream/components/authentication-card.blade.php'));
            copy(__DIR__ . '/../../presets/AdminLte/resources/views/components/dropdown.blade.php', resource_path('views/vendor/jetstream/components/dropdown.blade.php'));
            copy(__DIR__ . '/../../presets/AdminLte/resources/views/components/nav-link.blade.php', resource_path('views/vendor/jetstream/components/nav-link.blade.php'));
            copy(__DIR__ . '/../../presets/AdminLte/resources/views/components/welcome.blade.php', resource_path('views/vendor/jetstream/components/welcome.blade.php'));

            copy(__DIR__ . '/../../presets/AdminLte/resources/views/layouts/guest.blade.php', resource_path('views/layouts/guest.blade.php'));

        } elseif ($stack == 'inertia') {

            // Necessary for vue compilation
            copy(__DIR__.'/../../presets/AdminLte/inertia/webpack.mix.js', base_path('webpack.mix.js'));

            copy(__DIR__ . '/../../presets/AdminLte/inertia/resources/views/app.blade.php', resource_path('views/app.blade.php'));
            copy(__DIR__ . '/../../presets/AdminLte/inertia/resources/js/Layouts/AppLayout.vue', resource_path('js/Layouts/AppLayout.vue'));

            copy(__DIR__ . '/../../presets/AdminLte/inertia/resources/js/Jetstream/AuthenticationCard.vue', resource_path('js/Jetstream/AuthenticationCard.vue'));
            copy(__DIR__ . '/../../presets/AdminLte/inertia/resources/js/Jetstream/Dropdown.vue', resource_path('js/Jetstream/Dropdown.vue'));
            copy(__DIR__ . '/../../presets/AdminLte/inertia/resources/js/Jetstream/NavLink.vue', resource_path('js/Jetstream/NavLink.vue'));
            copy(__DIR__ . '/../../presets/AdminLte/inertia/resources/js/Jetstream/Welcome.vue', resource_path('js/Jetstream/Welcome.vue'));

        } elseif ($stack == 'breeze') {

            copy(__DIR__ . '/../../presets/AdminLte/breeze/resources/views/layouts/app.blade.php', resource_path('views/layouts/app.blade.php'));
            copy(__DIR__ . '/../../presets/AdminLte/breeze/resources/views/layouts/navigation.blade.php', resource_path('views/layouts/navigation.blade.php'));

            copy(__DIR__ . '/../../presets/AdminLte/resources/views/components/authentication-card.blade.php', resource_path('views/components/auth-card.blade.php'));
            copy(__DIR__ . '/../../presets/AdminLte/resources/views/components/dropdown.blade.php', resource_path('views/components/dropdown.blade.php'));
            copy(__DIR__ . '/../../presets/AdminLte/resources/views/components/nav-link.blade.php', resource_path('views/components/nav-link.blade.php'));

        }
    }
}