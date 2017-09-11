# shortUrl
一个生成短链接的 Laravel 扩展。

## 安装

```shell
$ composer require xbb/shorturl
```

## 配置

1. 添加下面一行到 `config/app.php` 中 `providers` 部分：

    ```php
    Xbb\ShortUrl\ShortUrlServiceProvider::class,
    ```

2. 发布迁移文件

    ```php
    $ php artisan vendor:publish --provider='Xbb\ShortUrl\ShortUrlServiceProvider'
    ```

3. 迁移数据库表

    ```php
    $ php artisan migrate
    ```

## 使用

1. 生成
    ```php
    app('shortUrl')->makeShortUrl($url);
 
2. 跳转
    ```php
    header('Location:'.app('shortUrl')->hit($shortUrl));
    ```


# License

MIT