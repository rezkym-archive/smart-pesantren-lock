# Daarut Tauhiid Boarding School Putra ~ Pengasuhan

Aplikasi yang di rancang khusus untuk Daarut Tauhiid Boarding School Putra bagian Pengasuhan. Aplikasi ini bertujuan untuk mempermudah kerja civitas terutama pada pengasuhan.

# Fitur

Fitur yang terdapat dalam aplikasi
* Admin 👨‍⚖️
	* Kelola Civitas
	* Kelola Santri
	* Kelola data setoran / hafalan
	* Kelola keuangan

* Civitas 👨‍💼
	* Kelola santri didik
	* Kelola setoran / hafalan santri didik
	* Kelola status santri didik

* Wali murid/santri 🤵
	*	Kelola status
	*	Kelola Keuangan
	*	Ajukan Perizinan

* Autentikasi 💻
	* Masuk
	* Daftar
	* Lupa kata sandi
	* Verifikasi email
	* Verifikasi nomor hp

## Ingin mencoba? 😎

Kunjungi link berikut ini < link >, lalu gunakan akun dibawah ini untuk masuk

**Admin** 👨‍⚖️
*username/email 	: demoadmin
*password				: demoadmin
	
**Civitas** 👨‍💼
*username/email	: democivi
*password		: democivi

**Wali Murid** 🤵
*username/email	: demowali
*password		: demowali

## Instalasi 📥

1. **Clone repository**
	~~~
	git clone https://github.com/rezkym/pengasuhan-dtbsputra.git
	cd pengasuhan-dtbsputra
	composer install
	npm install
	~~~
	
3. **Konfigurasi Database**
	
	Buka .env lalu ubah baris berikut sesuai dengan database kamu
	~~~
	DB_PORT=3306
	DB_DATABASE=pengasuhan
	DB_USERNAME=root
	DB_PASSWORD=
	~~~
	
4. **Konfigurasi Sistem**
	~~~
	php artisan key:generate
	php artisan migrate:fresh --seed
	~~~

    > Jalankan npm install & npm run dev ( Langkah ini opsional )
	
	Apabila sudah menjalan perintah di atas, silahkan jalankan server dengan
	~~~
	php artisan serve
	~~~

## Pengembang

* Rezky Maulana
	* [Instagram](https://instagram.com/rezzkyym)
	* [Facebook](https://www.facebook.com/rzky.nv/)
	* [linkedin](https://www.linkedin.com/in/rezky-maulana-3b249a1aa/)
	* [Portofolio](https://rezky.my.id)

* Javier Ghani Fairuz as Mathematic man
	* [Instagram](https://instagram.com/javier_ghani_fairuz)

* Bagas Prayogo

* Yusuf Ahmad Muzaki
	* [Instagram](https://instagram.com/yusuf.amz)
	
		

## Kontribusi 🙌

Jadilah pengembang untuk aplikasi pondok pesantren ini.
Laporan bug, kesalahan, sangat di perlukan dalam pengembangan aplikasi ini.
Terimakasih sudah bergabung.

## License 📝

 Copyright © 2020 **Made with ❤️ by Rezky Maulana .**

 * Thanks to <a href="http://devover.id">DevoverID</a>
