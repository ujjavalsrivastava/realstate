<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\RealPerameterModel;

class AppServiceProvider extends ServiceProvider
{
    /**S
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**s
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    $type = RealPerameterModel::where('controle_code','TYPE')->get();
    $pro_type = RealPerameterModel::where('controle_code','PRO_TYPE')->get();
    $res_com_type = RealPerameterModel::where('controle_code','RES_COM_TYPE')->get();
       
    }
}
