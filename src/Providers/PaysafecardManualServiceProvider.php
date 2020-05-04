<?php

namespace Azuriom\Plugin\PaysafecardManual\Providers;

use Azuriom\Plugin\Shop\Models\Payment;
use Azuriom\Extensions\Plugin\BasePluginServiceProvider;
use Azuriom\Plugin\PaysafecardManual\PaysafecardManualMethod;

class PaysafecardManualServiceProvider extends BasePluginServiceProvider
{
    /**
     * The plugin's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        // \Azuriom\Plugin\PaysafecardManual\Middleware\ExampleMiddleware::class,
    ];

    /**
     * The plugin's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [];

    /**
     * The plugin's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // 'example' => \Azuriom\Plugin\PaysafecardManual\Middleware\ExampleRouteMiddleware::class,
    ];

    /**
     * The policy mappings for this plugin.
     *
     * @var array
     */
    protected $policies = [
        // User::class => UserPolicy::class,
    ];

    /**
     * Register any plugin services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMiddlewares();

        //
    }

    /**
     * Bootstrap any plugin services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();

        if (! plugins()->isEnabled('shop')) {
            logger()->warning('PaysafecardManual plugin needs the shop plugin to work !');

            return;
        }

        $this->loadViews();

        $this->loadTranslations();

        $this->loadMigrations();

        $this->registerRouteDescriptions();

        $this->registerAdminNavigation();

        payment_manager()->registerPaymentMethod('paysafecardmanual', PaysafecardManualMethod::class);

        //
    }

    /**
     * Returns the routes that should be able to be added to the navbar.
     *
     * @return array
     */
    protected function routeDescriptions()
    {
        return [
            //
        ];
    }

    /**
     * Return the admin navigations routes to register in the dashboard.
     *
     * @return array
     */
    protected function adminNavigation()
    {
        return [
            'paysafecardmanual' => [
                'name' => 'PaysafeCard Manual ('.count(Payment::where([
                    ['status', '=', 'PENDING'],
                    ['payment_type', '=','paysafecardmanual']
                ])->get()).')',
                'type' => 'dropdown',
                'icon' => 'fas fa-chart-bar',
                'items' => [
                    'paysafecardmanual.admin.index' => 'Wait list',
                ],
            ],
        ];
    }
}
