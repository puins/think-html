<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2021 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
declare (strict_types = 1);

use html\facade\Form;

//------------------------
// html 助手函数
//-------------------------
if (!function_exists('build_select')) {

    /**
     * 生成下拉列表
     * @param  string $name
     * @param  array  $list
     * @param  string|bool $selected
     * @param  array  $selectAttributes
     * @param  array  $optionsAttributes
     * @param  array  $optgroupsAttributes
     * @return string
     */
    function build_select($name, $list = [], $selected = null, array $selectAttributes = [], array $optionsAttributes = [], array $optgroupsAttributes = [])
    {
        $selected = is_array($selected) ? $selected : explode(',', strval($selected));
        return Form::select($name, $list, $selected, $selectAttributes, $optionsAttributes, $optgroupsAttributes);
    }
}

if (!function_exists('build_radios')) {

    /**
     * 生成单选按钮组
     * @param string $name
     * @param array  $list
     * @param mixed  $selected
     * @return string
     */
    function build_radios($name, $list = [], $selected = null, $options = [])
    {
        $html = [];
        $selected = is_null($selected) ? key($list) : $selected;
        $selected = is_array($selected) ? $selected : explode(',', strval($selected));
        foreach ($list as $k => $v) {
            $html[] = sprintf(Form::radio($name, $k, in_array($k, $selected), ['id' => "{$name}-{$k}", 'title' => "{$v}"] + $options));
        }
        return implode(' ', $html);
    }
}

if (!function_exists('build_checkboxs')) {

    /**
     * 生成复选按钮组
     * @param string $name
     * @param array  $list
     * @param mixed  $selected
     * @return string
     */
    function build_checkboxs($name, $list = [], $selected = null, $options = [])
    {
        $html = [];
        $selected = is_null($selected) ? [] : $selected;
        $selected = is_array($selected) ? $selected : explode(',', strval($selected));
        foreach ($list as $k => $v) {
            $html[] = sprintf(Form::checkbox($name, $k, in_array($k, $selected), ['id' => "{$name}-{$k}", 'title' => "{$v}"] + $options));
        }
        return implode(' ', $html);
    }
}
