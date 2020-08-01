<?php

namespace Cvar1984\App;

/**
 * Class: SignalHandler
 *
 */
class SignalHandler extends Event
{
    /**
     * callables
     *
     * @var mixed
     */
    private static $callables = [];
    /**
     * __construct
     *
     */
    public function __construct()
    {
        pcntl_async_signals(true);
        if(self::$callables['sighup']) pcntl_signal(SIGHUP, 'self::sighup');
        if(self::$callables['sigterm']) pcntl_signal(SIGTERM, 'self::sigterm');
        return $this;
    }
    /**
     * sighup
     *
     */
    private static function sighup()
    {
        call_user_func(self::$callables['sighup']);
    }
    /**
     * setSighup
     *
     * @param callable $funct
     */
    public function setSighup(callable $funct)
    {
        self::$callables['sighup'] = $funct;
    }
    /**
     * sigterm
     *
     */
    private static function sigterm()
    {
        call_user_func(self::$callables['sigterm']);
    }
    /**
     * setSigterm
     *
     * @param callable $funct
     */
    public function setSigterm(callable $funct)
    {
        self::$callables['sigterm'] = $funct;
    }
}
