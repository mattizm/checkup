<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

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
    Paginator::useBootstrap();

    VerifyEmail::toMailUsing(function ($notifiable, $url) {
      return (new MailMessage)
        ->subject('Verifikasi Alamat Email Anda')
        ->line('Klik Tombol dibawah ini untuk verifikasi alamat email anda.')
        ->action('Verifikasi Alamat Email Anda', $url);
    });
  }
}
