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

Admin hesabı
Email : admin@admin.com
Şifre : admin

User hesabı
Email : user@user.com
Şifre :  user

## PROJE İÇERİSİNDE YER ALAN BAZI EKRANLAR

### GİRİŞ EKRANI
![image](https://user-images.githubusercontent.com/44698680/172005013-850c3d45-cf4e-424a-bb24-197ef58ec027.png)


### YETKİLENDİRME EKRANI
![image](https://user-images.githubusercontent.com/44698680/172005715-5adf59f5-d354-403e-9b45-55f8743fe43a.png)
### USER İŞLEMLERİ
![image](https://user-images.githubusercontent.com/44698680/172005022-cb381acf-3d2e-443d-92da-2db189760286.png)
### KULLANICI KAYIT ALANI
![image](https://user-images.githubusercontent.com/44698680/172005033-c9174b3a-4b08-44d2-aefe-cf51e23ea605.png)
### REZERVASYON MENÜSÜ
![image](https://user-images.githubusercontent.com/44698680/172005816-1a041286-2776-42b3-ba0f-04075476b7e2.png)
### REZERVASYON EKLEME ALANI
![image](https://user-images.githubusercontent.com/44698680/172005879-60da516f-b0cd-40db-b5b7-e4409795a20b.png)
### GÜZERGAH MENÜSÜ
![image](https://user-images.githubusercontent.com/44698680/172005043-cb150cf6-1e1f-49e8-8424-486fef04b056.png)
### GÜZERGAH EKLEME ALANI
![image](https://user-images.githubusercontent.com/44698680/172005046-b1a61b8f-9723-41d5-a42a-bc778f06a88e.png)
### SEFERLER MENÜSÜ
![image](https://user-images.githubusercontent.com/44698680/172005051-1f905ff2-fd46-4685-9c3f-6515edaf5100.png)
### SEFER EKLEME ALANI
![image](https://user-images.githubusercontent.com/44698680/172005053-1af52456-b60e-471f-8b2b-2d7600810502.png)
### OTOBÜSLER MENÜSÜ
![image](https://user-images.githubusercontent.com/44698680/172005030-2a95990f-bc73-4fc0-af2d-6d3f1cc05fcb.png)
### PLAKA KAYIT EKRANI
![image](https://user-images.githubusercontent.com/44698680/172005054-784772e2-16dc-4f80-b9b5-01616b8ff38b.png)

## Veritabanı şeması ve ER diyagramları

### ER DİYAGRAMI
![image](https://user-images.githubusercontent.com/44698680/172005061-d24ded51-4b91-44c2-96f0-f7893b7019fd.png)

### VERİTABANI ŞEMASI
![image](https://user-images.githubusercontent.com/44698680/172005063-3a6af2a0-7822-4b39-b862-3bfa96a3f7a4.png)

