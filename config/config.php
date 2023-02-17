<?php
return array(
    //混淆方法名 1=字母混淆 2=乱码混淆
    'ob_function'        => 2,
    //混淆函数产生变量最大长度
    'ob_function_length' => 3,
    //混淆函数调用 1=混淆 0=不混淆 或者 array('eval', 'strpos') 为混淆指定方法
    'ob_call'            => 1,
    //随机插入乱码
    'insert_mess'        => 0,
    //混淆函数调用变量产生模式  1=字母混淆 2=乱码混淆
    'encode_call'        => 2,
    //混淆class
    'ob_class'           => 0,
    //混淆变量 方法参数  1=字母混淆 2=乱码混淆
    'encode_var'         => 2,
    //混淆变量最大长度
    'encode_var_length'  => 5,
    //混淆字符串常量  1=字母混淆 2=乱码混淆
    'encode_str'         => 2,
    //混淆字符串常量变量最大长度
    'encode_str_length'  => 3,
    // 混淆html 1=混淆 0=不混淆
    'encode_html'        => 2,
    // 混淆数字 1=混淆为0x00a 0=不混淆
    'encode_number'      => 1,
    // 混淆的字符串 以 gzencode 形式压缩 1=压缩 0=不压缩
    'encode_gz'          => 1,
    // 加换行（增加可阅读性）
    'new_line'           => 0,
    // 移除注释 1=移除 0=保留
    'remove_comment'     => 1,
    // debug
    'debug'              => 1,
    // 重复加密次数，加密次数越多反编译可能性越小，但性能会成倍降低
    'deep'               => 1,
    // PHP 版本
    'php'                => 7,
);