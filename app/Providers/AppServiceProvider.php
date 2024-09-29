<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\RealPerameterModel;
use App\Models\Menu;
use App\Models\User;
use Auth;
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

    
       $currentUser = Auth::user();
 
     $menu = Menu::with('getSubMenu')->where('status','active')->get();
    
    
    $type = RealPerameterModel::where('controle_code','TYPE')->get();
    $pro_type = RealPerameterModel::where('controle_code','PRO_TYPE')->get();
    $res_com_type = RealPerameterModel::where('controle_code','RES_COM_TYPE')->get();
    View::share(['menu'=>$menu,'type'=>$type,'pro_type' =>  $pro_type,'res_com_type' => $res_com_type]);
    }
}
