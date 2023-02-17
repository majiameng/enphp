<?php
/**
 * Client
 * @author: JiaMeng <666@majiameng.com>
 */
namespace tinymeng\enphp;

use tinymeng\enphp\Connector\GatewayInterface;
use tinymeng\tools\Strings;
/**
 * @method static \tinymeng\enphp\Gateways\Decode Decode(array $config) 代码解密
 * @method static \tinymeng\enphp\Gateways\Encode Encode(array $config) 代码加密
 */
abstract class Client
{

    /**
     * Description:  init
     * @author: JiaMeng <666@majiameng.com>
     * Updater:
     * @param $gateway
     * @param null $config
     * @return mixed
     * @throws \Exception
     */
    protected static function init($gateway, $config)
    {
        if(empty($config)){
            throw new \Exception("EnPHP [$gateway] config配置不能为空");
        }
        $baseConfig = [
            'app_id'    => '',
            'app_secret'=> '',
            'callback'  => '',
            'scope'     => '',
            'type'      => '',
        ];
        $gateway = Strings::uFirst($gateway);
        $class = __NAMESPACE__ . '\\Gateways\\' . $gateway;
        if (class_exists($class)) {
            $app = new $class(array_replace_recursive($baseConfig,$config));
            if ($app instanceof GatewayInterface) {
                return $app;
            }
            throw new \Exception("EnPHP基类 [$gateway] 必须继承抽象类 [GatewayInterface]");
        }
        throw new \Exception("EnPHP基类 [$gateway] 不存在");
    }

    /**
     * Description:  __callStatic
     * @author: JiaMeng <666@majiameng.com>
     * Updater:
     * @param $gateway
     * @param $config
     * @return mixed
     */
    public static function __callStatic($gateway, $config)
    {
        return self::init($gateway, ...$config);
    }

}
