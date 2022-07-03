<?php

namespace Karpack\Contracts\Support;

interface Bootable
{
    /**
     * Boots the implementaton.
     *
     * @return static
     */
    public function boot();
}
