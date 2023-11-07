## Proje Hakkında

Basit bir reklam uygulaması olarak geliştirilmiştir. Hem web, hem api tarafında rotaları oluşturulmuştur. 

Laravel sail kurulu olduğundan docker ile çalıştırılabilir. 

## Install ve Çalıştırma

git ssh ile bilgisayarınıza yüklemek için
```console
git clone git@github.com:bilginnet/laravel_adv.git
```
ve
```console
cd laravel_adv
```

Enviromenter için .env.example dosyasını .env olarak kopyalamanız gerekmekte. 
```console
cp env.example env
```
 
Projede laravel sail yüklü olduğundan docker ile hızlıca ayağa kaldırmak için
```console
make up
```

Son olarak tabloların oluşumu için
```console
make migrate
```

Artık uygulamamız hazır vaziyette.

Herhangi bir tarayıcıda localhost:8080 yazarak projeyi çalıştırabiliriz. 

## Unit Test

Unit testi çalıştırmak için
```console
make test
```
komutunu kullanabilirsiniz.

## API Rotalar

- POST => localhost:8080/api/login
- email
- password


- GET => localhost:8080/api/advertising
- platform: "Tiktok",
- start_date: "01-10-2023"
- end_date: "30-10-2023"


- POST => localhost:8080/api/advertising
- platform:"Tiktok",
- impressions:10
- clicks:15
- spend:100
- revenue:20



Öncelikle web rotası üzerinden register olmanız gereklidir.
Sonrasında api/login tarafında istek atıp dönüş aldığınız token değerini bearer token olarak diğer api rotalarına istek atmanız gereklidir.


## Notlar:

Laravel fortify kullanılmış olmasına karşın forget-password, verify-email gibi aksiyonlar test edilmemiştir. Login ve Register kısımlarıyla ilgili testler yapılmıştır. 


