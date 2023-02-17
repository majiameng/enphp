<?php
namespace tinymeng\enphp\Connector;

use tinymeng\enphp\Tools\EnFunc;

/**
 * Gateway
 */
abstract class Gateway implements GatewayInterface
{
    /**
     * @var array
     */
    private $config;
    /**
     * @var EnFunc
     */
    protected $enFunc;
    /**
     * @var array
     */
    private $files = [];

    /**
     * Gateway constructor.
     * @param $config
     * @throws \Exception
     */
    public function __construct($config)
    {
        $this->setConfig($config);
        $this->enFunc = new EnFunc($config);
    }

    /**
     * @return void
     */
    public function setConfig($config,$value=null){
        if($value === null){
            if (!$config) {
                throw new \Exception('传入的配置不能为空');
            }
            $this->config = $config;
        }else{
            $this->config[$config] = $value;
        }
    }
}
