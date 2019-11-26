#获取应用配置
>1.在根目录的 [/config] 文件夹
>
>2.创建文件 如: base.php,非直接返回一个数组,代码如下
```
<?php
return [
    'name'  => 'Swoft framework 2.0',
    'debug' => env('SWOFT_DEBUG', 1),
];


```
>
>3.使用config()函数读取配置，规则：config(string $key = null, mixed $default = null):mixed
                       key 配置参数 key，子数组可以使用 . 分割，比如上面的例子 data.dkey 可以获取到 ["dvalue"], 当key=null 获取所有配置参数
                       default 默认参数，如果 key 参数不存在，返回默认值，默认值可以是任意类型
>
>4.如config("base.name") 即 读取base.php文件中 返回的数组的键值为 ‘name’ 的值  所以 config("base.name")  ==  'Swoft framework 2.0'  
>
>5.默认值  config("base.version"，“1.0”)  如果返回的数组中没有为相应的键 ，则返回第二个参数（default） 默认值
