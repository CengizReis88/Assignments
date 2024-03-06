
Top Leaks



1) SQL Injection

- Input alırken gerekli doğrulamalar sağlanmazsa istenmeyen kullanıcıların veritabanına sızmasına neden olabilir.
 Bu yüzden kullanıcıdan input alınan veriler doğrulanmış olmalıdır.

Nasıl Çalışır?

- Genelde form girişleri yada URL ler sayesinde bu saldırı gerçekleşir. Saldırganlar bu kısımlara 
 1=1, DROP TABLE, INSERT INTO tarzı kodlar girerek manipüle etmeye çalışır.

Korunmak için:

- input alınan veriler sisteme direkt sorgu olarak gönderilmeden önce doğrulanmalıdır.
- input alınan veriler bind_param tarzı kodlarla bağlanabilir.
- sql sorguları kesin bir şekilde yazılmalıdır.



2) Cross Site Scripting (XSS)

Nasıl Çalışır?

- Bu saldırı yöntemi,  web sitelerinin kullanıcıların siteye mesaj göndermesine izin verdiğinde 
kötü amaçlı kullanıcıların mesajlarına javascript kodu eklemesi ve devamında sitenin yada bir başka kullancının
bu scripti çalıştırması sonucunda diğer kullanıcıların oturumlarını ele geçirmesine, web sitesinde değişiklik 
yapabilmesine olanak tanır.

Nasıl Korunulur:

- Kullanıcılar tarafından alınan mesajların HTML şeklinde değil de düz metin olarak alınmalıdır.
- Kullanıcı ile web sitesi arasındaki iletişimi şifrelediği için HTTPS kullanılabilir.



3) Cross-Site Request Forgery (CSRF)

Çalışma Yöntemi:

- Hedef alınan kullanıcıya zararlı bağlantıya tıklamasını sağlayarak ona para transferi yada hesap bilgilerinin 
ele geçirilmesi gibi istemediği bir işlemi gerçekleştirmesini sağlar. 

Korunma yolları:

- Bir işlem gerçekleştirirken onaylama ile ek bir güvenlik katmanı kullanılabilir.
- CSRF Token yöntemi ile her oturum açma işleminden sonra bir rastgele değer oluşturarak veriler
saklanabilir.
- En önemlisi Email, sosyal medyadan gelen bir mesaj yada web sitelerindeki bağlantılara tıklanmadan
önce dikkatli olunmalıdır.



4) PHP Object Injection

- Kullanıcıdan alınan bir nesnenin veritabanına kaydederken diziye dönüştürülmesinde görev alan "serialize()"
ve bu diziyi tekrardan nesneye dönüştürmekte kullanılan "unserialize()" fonksiyonlarının açıkalarını kullanarak
yapılan bir saldırı biçimidir.
 
Korunmak için:

- Kullanıcıdan alınan veriler doğrulanmalı ve gerekli kontroller gerçekleştirilmelidir.
- unserialize() fonksiyonu yerine JSON fonksiyonları kullanılabilir.



5) Directory Traversal

Nedir?

- Bu saldırı yöntemi bir form girişi yada URL aracılığıyla,sunucudaki erişememesi gereken dosyalara erişmesine
olanak tanır. 

Nasıl Çalışır?

- ../ dosya yolunu kullanarak üst dizinlere ulaşmaya çalışır.
- ../admin/password gibi dosya yolları kullanarak sunucudaki dosyalara erişmeye çalışır.
- Eğer kullanıcıların resim yüklemesine izin veriliyorsa özel olarak hazırlanmış resim dosyası ile diğer dosyalara
 erişmeye çalışabilir.

Önlemek için:

- Kullanıcıdan alınan inputlar doğrulanmalı ve filtrelenmelidir.



6) Session Hijacking

- Kötü amaçlı bir kullanıcının, bir diğer kullanıcının genelde çerezlerde tutulan SESSION ID sini bir şekilde çalarak
ya da ağını dinleyerek bilgilerini ele geçirmesi şeklinde gerçekleştirilir.

Nasıl Önlenir?

- İki faktörlü kimlik doğrulama kullanılabilir.
- HTTPS gibi güvenli protokoller kullanılmalıdır.



7) Command Injection

-Genel olarak çalışma mantığı SQL Injection'a çok benzer ama buradaki asıl hedef veritabanından çok sistemin kendisidir.


