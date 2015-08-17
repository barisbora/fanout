<?php namespace barisbora\Fanout;


class FanoutFactory
{

    protected $config;

    protected $simplepie;

    /**
     * @param $config
     */
    public function __construct ( $config )
    {
        $this->config = $config;
    }

    public function make ()
    {
        echo 'make';
    }

    protected function configure ()
    {
        echo 'configure';
    }
}
