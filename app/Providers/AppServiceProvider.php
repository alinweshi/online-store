<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $setting = Setting::firstOr(function () {
        //     return Setting::create([
        //         "name" => "site_name",
        //         "description" => "ecommerce",
        //         'mail' => "info@gmail.com",
        //         'phone_number' => "0123456789",
        //         'location' => "Dhaka,Bangladesh",
        //         'logo' => "logo.png",
        //         'icon' => "icon.png",
        //         'footer' => "copyright",
        //         'copyright' => "copyright",
        //         'facebook' => "facebook.com",
        //         'twitter' => "twitter.com",
        //         'instagram' => "instagram.com",
        //         'youtube' => "youtube.com",
        //         'linkedin' => "linkedin.com",
        //         'google' => "google.com",
        //         'favion' => "favion.png",
        //         'tiktok' => "tiktok.com",
        //         'instgram' => "instgram.com",

        //     ]);
        // });
        // view()->share('setting', $setting);
    }
}
