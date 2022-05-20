<?php

namespace App\Providers;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use App\Models\Customer;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\BotMan\BotMan\BotMan::class, function($app){
            return $app->make('botman');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            
            // $customer = Customer::find(Session::get('customer_id'))->get();
            // foreach($customer_name as $key => $cus_name){
            //     $cus_name = $cus_name->customer_name;
            // }
                
            $min_price = Product::min('product_price');
            $max_price = Product::max('product_price');
            $max_price_range = $max_price + 100000;
            $view->with('min_price',$max_price)->with('max_price',$max_price)->with('max_price_range',$max_price_range);
        });
    }

}
