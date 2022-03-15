<?php

namespace Azuriom\Plugin\PaysafecardManual\Providers;

use Azuriom\Extensions\Plugin\BasePluginServiceProvider;
use Azuriom\Plugin\PaysafecardManual\PaysafecardManualMethod;
use Azuriom\Plugin\Shop\Models\Payment;
use Azuriom\Plugin\Shop\Models\PaymentItem;
use Exception;
use Azuriom\Plugin\PaysafecardManual\Models\PendingCode;

class PaysafecardManualServiceProvider extends BasePluginServiceProvider
{
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

        if (! class_exists(PaymentItem::class) || ! plugins()->isEnabled('shop')) {
            logger()->warning('PaysafecardManual plugin needs the shop plugin v0.2 or higher to work !');

            return;
        }

        $this->loadViews();

        $this->loadTranslations();

        $this->loadMigrations();

        $this->registerRouteDescriptions();

        $this->registerAdminNavigation();

        payment_manager()->registerPaymentMethod('paysafecardmanual', PaysafecardManualMethod::class);
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
                'name' => 'Paysafecard Manual ('.PendingCode::count().')',
                'type' => 'dropdown',
                'icon' => 'bi bi-bar-chart-line',
                'route' => 'paysafecardmanual.admin.*',
                'items' => [
                    'paysafecardmanual.admin.index' => trans('paysafecardmanual::messages.nav.pending'),
                ],
            ]
        ];
    }
}
