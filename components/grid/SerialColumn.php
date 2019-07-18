<?php
/**
 * @link         http://www.rulaiyun.cn/
 * @author       wang <wangyaxu7019@dingtalk.com>
 * @copyright    Copyright &copy; rulaiyun.cn,2018 - 2019
 */

namespace app\components\grid;

use Yii;

/**
 * 重写grid 序号列
 * Class SerialColumn
 *
 * @package app\components\grid
 * @author  wang
 */
class SerialColumn extends \kartik\grid\SerialColumn
{
    /**
     * @var string
     */
    public $header = '序号';

    /**
     * @var array
     */
    public $contentOptions = [
        'width' => '90',
    ];
}