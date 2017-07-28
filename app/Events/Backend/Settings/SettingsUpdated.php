<?php

namespace App\Events\Backend\Settings;

use Illuminate\Queue\SerializesModels;

/**
 * Class SettingsUpdated.
 */
class SettingsUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $settings;

    /**
     * @var
     */
    public $comment;

    /**
     * @param $settings
     * @param $comment
     */
    public function __construct($settings, $comment)
    {
        $this->settings = $settings;
        $this->comment = $comment;
    }
}
