## Website Gallery Foto
PHP 8.1

MYSQL

LARAVEL 10
## instalasi
git clone https://github.com/Dilla-N/gallery.git

composer install

change env.example env.

php artisan key:generate

pastikan sebelum menggunakan migrate sudah ada database nya terlebih dahulu di mysql jika belum tidak apa-apa jika nanti migrate menyuruh untuk membuat database ketik yes

php artisan migrate:fresh

php artisan serve

Jika menggunakan Xampp harap ubah extension gd di php.ini
## cara mengubah gd extension di xampp

1.buka folder xampp


![Screenshot (264)](https://github.com/Dilla-N/gallery/assets/168327966/39189ab4-b53a-498e-a9bd-a2eae69d3ede)

2.buka folder php


![Screenshot (265)](https://github.com/Dilla-N/gallery/assets/168327966/ffea3822-49d3-4861-846a-314d5ab7b0fc)

3.klik file php.ini


![Screenshot (266)](https://github.com/Dilla-N/gallery/assets/168327966/84f4aa79-8570-4e9a-85cd-8189aefb7338)

4.ubah gd extension dengan menghapus ; di depannya


![Screenshot (267)](https://github.com/Dilla-N/gallery/assets/168327966/92ef8444-f36c-4cb8-a985-4463754795a5)


## Penjelasan 
Aplikasi ini berguna untuk membuat galeri foto 
memiliki fitur
Registrasi , login ,Menambah ALbum , Meghapus Album , Membuat foto , Menghapus foto,
untuk menggunakan fitur tambah album dll pasitkan untuk login?registerasi terlebih dahulu

## UML
![Uploading 324863259-c21f2c45-3804-4ff5-8521-a8aac742e45a.png…]()

