<?php

namespace tinymeng\enphp\Gateways;

use tinymeng\enphp\Connector\Gateway;
use tinymeng\enphp\Tools\EnFunc;
use tinymeng\tools\exception\StatusCode;
use \tinymeng\tools\exception\TinymengException;

/**
 * Class Encode
 * @package tinymeng\enphp\Gateways
 * @Author: TinyMeng <666@majiameng.com>
 * @Created: 2018/11/9
 */
class Encode extends Gateway
{

    /**
     * addFile
     * @param $file
     * @return $this
     */
    public function addFile($file)
    {
        if (!file_exists($file)) {
            $file = DOCUMENT_ROOT . $file;
            if (!file_exists($file)) {
                return $this;
            }
        }
        $this->files[] = [
            "file_name" => $file,
        ];
        return $this;
    }

    /**
     * 开始打包
     * @return void
     */
    public function build()
    {
        if (empty($this->files)) {
            throw new \tinymeng\tools\exception\TinymengException(StatusCode::COMMON_PARAM_MISS, 'Missing file list');
        }
        foreach ($this->files as $key => $file) {
            if (!file_exists($file['file_name'])) {
                $this->files[$key]['error'] = "file exists";
                continue;
            }

            $content = file_get_contents($file['file_name']);
            $this->check_bom($content);
            die;
            $content = $this->strip_whitespace($content);
            var_dump($content);
            die;
        }

    }

    /**
     * Description:  __call
     * @param string $function_name
     * @param array $arguments
     * @return mixed
     * @author: JiaMeng <666@majiameng.com>
     * Updater:
     */
    public function __call(string $function_name, array $arguments)
    {
        return $this->enFunc->$function_name(...$arguments);
    }

}
