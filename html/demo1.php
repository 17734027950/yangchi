<?php
require __DIR__ . '/../vendor/autoload.php';
use Yang\FormBuilder;

$config = [
    'ns' => '',
    'name' => 'form',
    'form_class' => ['form-group' , ''],
    'action' => '',
    'method' => 'post',
    'upload_file' => false
];

$form = new FormBuilder($config);

$html = $form->addClass('')
    ->setAction('')
    ->setMethod('post')
    ->uploadFile()
    ->addText('name' , '名称' , '' , '前填写您的名称' , true , '' , 'group1')
    ->addPassword('password' , '密码' , '' , '请输入密码' , true , '请输入6-10位数字密码' , 'group1')
    ->addEmail('email' , '邮箱' , '' , '请输入邮箱' , true)
    ->addNumber('sort' , '排序' , 0 )
    ->addTextarea('info' , '内容' , '' , '请填写内容' , true)
    ->addButton('button' , '按钮' , '哈哈')
    ->addSelect('sex' , '选择' , 2 , [1=>'男' , 2=> '女'])
    ->addRadio('radio' , '单选' , 1 , ['1' => 'yi' , 2 => 'er' , 3 => 'shan'])
    ->addCheckbox('checkbox[]' , '多选' , ['1','2'] ,[1 => 'yi' , 2 => 'er' , 3 => 'shan'] )
    ->addSubmit('提交')
    ->addReset('重置')
    ->addGroup('group1' , '分组1')
    ->build();

// echo '<link rel="stylesheet" type="text/css" href="../vendor/twitter/bootstrap/dist/css/bootstrap.min.css" />';

echo $html;
