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

        //$this->fanout = new Fanout('{realm-id}', '{realm-key}', $ssl = true);

    }

    public function start ()
    {
        $this->fanout = new FanoutProvider( $this->config[ 'realm-id' ], $this->config[ 'realm-key' ], $ssl = true );

        return $this;
    }

    public function trigger ( $channel, $data = null )
    {

        $this->fanout->publish( $channel, $data );

    }

}
