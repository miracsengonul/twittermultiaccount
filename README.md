#Twitter Multi Account Manager
========

Twitter Multi Account Manager ile tüm Twitter hesaplarınızı tek hesap üzerinden yönetebilirsiniz.

## Kurulum

Öncelikle

> git clone https://github.com/miracsengonul/twittermultiaccount.git
komutu ile sunucunuza kurulum yapın.

- Daha sonra Twitter üzerinden kendinize bir Dev App oluşturun.
- App oluştururken belirteceğiniz Callback Url adresini ``` routes/web.php ``` içerisinde bulunan

```php
Route::get('CALLBACK_URL', 'Auth\ChildAuthController@handleProviderCallback');
```

``` CALLBACK_URL ``` ile değiştirin.

- Daha sonra .env dosyasını kendinize göre değiştirin. Burada Twitter API ve sunucu konfigürasyonu yapmanız lazım.

- IndexController içerisinde bulunan Short Url servisinin çalışması için YOUR_API_KEY değerini Google'dan API elde ettikten sonra yine kendinize göre değiştirin.

Daha sonra yazılımın kurulu olduğu dizine gelip terminal üzerinden

> php artisan migrate

> composer update

komutlarını çalıştırarak yapılandırmamızı yapmış olacağız.

> Demo : <a href="http://twitgroup.net" target="_blank">TwitGroup</a>

![ekran_goruntusu](http://preview.ibb.co/gcFmbk/panel.png)
![ekran_goruntusu](http://preview.ibb.co/cZbEU5/nasil_calisir.png)
![ekran_goruntusu](http://preview.ibb.co/kOWg95/tweet.png)
![ekran_goruntusu](http://preview.ibb.co/cg86bk/takip_et.png)
![ekran_goruntusu](http://preview.ibb.co/b9VxhQ/fav.png)
![ekran_goruntusu](http://preview.ibb.co/gaQ2Gk/kayit_olunud.png)

> NOT : Anasayfada belirtilen kısa linki alt üye yapmak istediğiniz kişilerin giriş yapmasını sağlayarak , alt üye elde edebilirsiniz.
