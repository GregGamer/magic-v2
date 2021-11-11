<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        \Menu::make('MENU_user', function($menu){
            $menu->add('Settings')->data('icon','settings');
            $menu->add('Log out')->data('icon','logout');
        });

        \Menu::make('MENU_sidebar', function($menu){
            $menu->add('Dashboard', ['route'=>'dashboard'])->data('icon', 'dashboard');
            $menu->add('Cards', ['route' => 'card.index'])->data('icon','auto_awesome_motion');
            $menu->add('Decks', ['route' => 'deck.index'])->data('icon','filter_1');
            $menu->add('Collections', ['route' => 'collection.index'])->data('icon','store');
        });

        \Menu::make('MENU_footer', function($menu){
            $menu->add('Settings', ['route' => 'user.settings'])->data('icon','settings');
        });

        return $next($request);
    }
}
