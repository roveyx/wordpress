<?php
defined( 'ABSPATH' ) || exit;

class WPCOM_Module_text extends WPCOM_Module{
    function __construct(){
        $options = array(
            array(
                'tab-name' => '常规设置',
                'content' => array(
                    'name' => '内容',
                    'type' => 'editor'
                )
            ),
            array(
                'tab-name' => '风格样式',
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
        parent::__construct( 'text', '自定义内容', $options, 'mti:text_fields' );
    }

    function template($atts, $depth){
        echo do_shortcode( shortcode_unautop(wpautop($atts['content'])) );
    }
}

register_module( 'WPCOM_Module_text' );