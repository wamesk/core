<?php

namespace Wame\Core\Providers;

use Illuminate\Foundation\Application;
use Laravel\Nova\Nova;

class Footer
{
    public static function make()
    {
        $composer = json_decode(file_get_contents(base_path('composer.json')), true);

        $html = '<p class="text-center">Created with '
            . '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill inline-block " viewBox="0 0 16 16"><path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/></svg>'
            . ' by <a href="https://wame.sk/" target="_blank">wame.sk</a>';

        if (isset($composer['version'])) {
            $html .= '<br>v' . $composer['version'];
        }

        $html .= '</p><p class="text-center"><small>Laravel ' . Application::VERSION . ', Laravel Nova ' . Nova::version() . ', PHP ' . PHP_VERSION . '</small></p>';

        Nova::footer(fn () => $html);
    }

}
