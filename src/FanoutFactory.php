<?php namespace barisbora\Fanout;

use \Fanout\Fanout as FanoutProvider;

class FanoutFactory
{

    protected $config;
    protected $fanout = null;

    /**
     * @param $config
     */
    public function __construct ( $config )
    {

        $this->config = $config;

    }

    /**
     * @return $this
     */
    public function start ()
    {
        $this->fanout = new FanoutProvider( $this->config[ 'realm-id' ], $this->config[ 'realm-key' ], $this->config[ 'ssl' ] );

        return $this;
    }

    /**
     * @param $channel
     * @param null
     */
    public function trigger ( $channel, $data = null )
    {

        $this->fanout->publish( $channel, $data );

    }

}
