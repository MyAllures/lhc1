<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/13
 * Time: 8:54
 */
return [
    'app_debug'              => true,
    'show_error_msg'         => true,
    'view_replace_str'       => [
        '__CSS__'=>'/file/admin/css',
        '__JS__'=>'/file/admin/js',
        '__IMG__'=>'/file/admin/images',
        '__PARTICLE__'=>'/file/admin/particles',
        '__MODULE__'=>request()->module(),
        '__LAYUI__'=>'/file/admin/layui',
        '__LAYUIS__'=>'/file/admin/layuis',
        '__BOOTSTRAP__'=>'/file/admin/layui/bootstrap/css/bootstrap.min.css',
        '__IMAGES__'=>'/file/lhc_images'
    ],
    'keycode'=>'Lu9dgINify',		//����Ա���������Կ
    'cookiekey'=>'cjsakhdkasbdh',	//cookie������Կ
    'upload_path'=>ROOT_PATH.'file'.DS.'upload',		//Ĭ���ϴ�ͼƬ��Ŀ¼

];