<?php

namespace App\Widgets;

use App\Streamer;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class StreamerDimmer extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Streamer::count();
        $string = trans_choice('admin.widget.streamer', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "{$count} {$string}",
            'text'   => __('admin.widget.streamer_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('admin.widget.streamer_link_text'),
                'link' => route('voyager.streamers.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }
}
