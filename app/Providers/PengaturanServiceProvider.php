<?php

namespace App\Providers;

use App\Models\Pengaturan;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Support\ServiceProvider;

class PengaturanServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot(Factory $cache, Pengaturan $pengaturan)
  {
    $pengaturan = $cache->rememberForever('pengaturan', function () use ($pengaturan) {
      return $pengaturan->pluck('value', 'key')->all();
    });

    config()->set('pengaturan', $pengaturan);
  }
}
