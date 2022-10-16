<?php

namespace Auth;

use Jenssegers\Agent\Agent;
use Auth\Contracts\ILoggedDevice;

;

class LoggedDevice implements ILoggedDevice
{
    /**
     * @var Agent
     */
    private Agent $agent;

    /**
     * @param Agent $agent
     */
    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    public function getDevice(): string
    {
        $device = $this->agent->device();

        return $device ?: 'not_identified';
    }

    public function isMobile(): bool
    {
        return $this->agent->isMobile();
    }
}
