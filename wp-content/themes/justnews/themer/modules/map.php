<?php
defined( 'ABSPATH' ) || exit;

class WPCOM_Module_map extends WPCOM_Module{
    function __construct(){
        $options = array(
            array(
                'tab-name' => '常规设置',
                'pos' => array(
                    'name' => '位置',
                    'desc' => '坐标信息，获取地址：http://api.map.baidu.com/lbsapi/getpoint/index.html （复制到浏览器打开）',
                    'value'  => '116.403963,39.915119'
                ),
                'title' => array(
                    'name' => '标题',
                    'desc' => '例如公司名称'
                ),
                'address' => array(
                    'name' => '地址',
                    'desc' => '可以是公司地址，也可以是一段介绍文字'
                ),
                'scrollWheelZoom' => array(
                    'name' => '滚轮缩放',
                    'type' => 't',
                    'desc' => '是否允许鼠标滚轮缩放，开启将可以使用鼠标滚轮放大缩小地图',
                    'value'  => '0'
                )
            ),
            array(
                'tab-name' => '风格样式',
                'height' => array(
                    'name' => '高度',
                    'desc' => '模块高度，单位是px',
                    'value'  => '400px'
                ),
                'margin-top' => array(
                    'name' => '上外边距',
                    'desc' => '模块离上一个模块/元素的间距，单位建议为px。即 margin-top 值，例如： 10px',
                    'value'  => '0'
                ),
                'margin-bottom' => array(
                    'name' => '下外边距',
                    'desc' => '模块离上一个模块/元素的间距，单位建议为px。即 margin-bottom 值，例如： 10px',
                    'value'  => '20px'
                )
            )
        );
        parent::__construct( 'map', '百度地图', $options, 'map' );
    }

    function classes( $atts, $depth ){
        $classes = $depth==0?' container':'';
        return $classes;
    }

    function style_inline( $atts ){
        $height = intval(isset($atts['height'])&&$atts['height']?$atts['height']:'400px');
        return 'height: '.$height.'px;';
    }

    function template($atts, $depth){
        $content = '';
        $content .= isset($atts['title'])&&$atts['title'] ? '<h3 class="map-title">'.$atts['title'].'</h3>':'';
        $content .= isset($atts['address'])&&$atts['address'] ? '<p class="map-address">'.$atts['address'].'</p>':'';
        echo wpcom_map($content, isset($atts['pos'])?$atts['pos']:'', isset($atts['scrollWheelZoom'])?$atts['scrollWheelZoom']:0, 0, 0);
    }
}

register_module( 'WPCOM_Module_map' );