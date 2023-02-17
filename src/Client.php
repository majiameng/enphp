<?php
/**
 * Client
 * @author: JiaMeng <666@majiameng.com>
 */
namespace tinymeng\enphp;

use tinymeng\enphp\Connector\GatewayInterface;
use tinymeng\tools\Strings;
/**
 * @method static \tinymeng\enphp\Gateways\Decode decode(array $config=[]) 代码解密
 * @method static \tinymeng\enphp\Gateways\Encode encode(array $config=[]) 代码加密
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
    protected static function init($gateway, $config=[])
    {
        define('DOCUMENT_ROOT',dirname(dirname(dirname(dirname(__DIR__)))).DIRECTORY_SEPARATOR);
        $config_file = __DIR__ . "/../config/config.php";
        $baseConfig = include($config_file);
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
