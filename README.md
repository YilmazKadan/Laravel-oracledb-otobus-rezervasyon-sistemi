# Laravel alt yapısı ve Oracle Db Otobüs rezervasyon sistemi.

Bu proje dördüncü sınıf seçmeli derslerinden olan ve Oracle DB ana konusu olan Verit Tabanı Tasarım dersi için yapılmış bir proje ödevidir.
Amaç OracleDB kullanan bir sistem geliştirmektir.

## Proje içinde kullanılan teknolojiler

Proje içerisinde AdminLTE3 admin panel tasarımı kullanılmıştır.
Laravel'de OracleDB işlemlerini daha rahat yapabilmek için **yajra/laravel-oci8** paketi kullanılmıştır.

## Proje kurulumu 

Proje kurulumu için sisteminizde OracleDB kurulu olması gerekmekte.
.env dosyanıza veritabanı ayarlamasını aşağıdaki gibi yapmanız gerekiyor.
<pre>
DB_CONNECTION=oracle
DB_HOST=localhost
DB_PORT=1521
DB_SERVICE_NAME=servis adınız
DB_USERNAME=OracleDb kullanıcı adı
DB_PASSWORD=db şifreniz
</pre>
Bu işlemlerden sonra migration dosyalarını veritabanına geçirmek için 
<pre> php artisan migrate --seed
</pre> komutunu konsola yazıyoruz.

Projeyi ayağa kaldırmak için yazmanız gereken kod: `php artisan serve`

Başlangıç için bir admin ve user hesabı oluşmuş olacaktır. Bunları daha sonra kaldırabilirsiniz.

`
Admin hesabı
Email : admin@admin.com
Şifre : admin

User hesabı
Email : user@user.com
Şifre :  user

`
