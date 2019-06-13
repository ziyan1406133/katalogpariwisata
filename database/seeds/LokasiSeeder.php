<?php

use Illuminate\Database\Seeder;
use App\Lokasi;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed = new Lokasi;
        $seed->id = '1';
        $seed->wilayah_id = '1';
        $seed->nama = 'Pantai Santolo';
        $seed->alamat = 'Kecamatan Cikelet';
        $seed->deskripsi_singkat = 'Menikmati panorama pantai dan biota laut,merupakan aktivitas wisata yang dapat dilakukan. Tersedia juga sewaan perahu yang melayani wisatawan untuk menikmati deburan pantai ombak selatan yang cukup menantang. Selain itu kita bisa menikmati hidangan makanan laut yang segar dengan sajian yang sederhana. fasilitas yang dibutuhkan wisatawan cukup tersedia seperti losmen, kios-kios cinderamata dengan harga terjangkau.';
        $seed->longitude = '-7.658898';
        $seed->latitude = '107.688678';
        $seed->cover = 'santolo.jpg';
        $seed->save();

        $seed = new Lokasi;
        $seed->id = '2';
        $seed->wilayah_id = '2';
        $seed->nama = 'Talaga Bodas';
        $seed->alamat = 'Wanajaya, Jalan Telaga Bodas No. 5';
        $seed->deskripsi_singkat = 'Kawah Talaga Bodas merupakan objek wisata alam di Garut bertema wisata alam yang cukup favorit setelah Gunung Papandayan. Talaga artinya “danau” sedangkan bodas artinya “putih” dan jika diartikan kedalam bahasa Indonesia artinya adalah “Danau Putih”. Sesuai dengan namanya “Talaga Bodas” kawah di Gunung ini membentuk danau dengan air berwarna putih. Meskipun aktivitas vilkanik di kawah ini masih aktif, akan tetapi tidak akan membahayakan keselamatan pengunjung.';
        $seed->longitude = '-7.210477';
        $seed->latitude = '108.065439';
        $seed->cover = 'talaga bodas.jpg';
        $seed->save();

        $seed = new Lokasi;
        $seed->id = '3';
        $seed->wilayah_id = '1';
        $seed->nama = 'Curug Orok';
        $seed->alamat = 'Cikandang, Cikajang';
        $seed->deskripsi_singkat = 'Curug ini memiliki ketinggian 45 meter, dan berada di ketinggian sekitar 250 meter DPL. Asal mula nama Curug Orok ini menurut warga sekitar bahwa pada tahun 1986 ada seorang wanita yang masih muda yang membuang bayinya (Bayi dalam bahasa sundanya “Orok”) dari atas puncak curug, sehingga dinamakan Curug Orok. Jika dilihat dari bentuknya curug ini memiliki 2 bagian, dimana yang besar dilambangkan sebagai ibu dari bayi dan yang kecil dilambangkan sebagai bayi tersebut.';
        $seed->longitude = '-7.387136';
        $seed->latitude = '107.735972';
        $seed->cover = 'curug orok.png';
        $seed->save();

        $seed = new Lokasi;
        $seed->id = '4';
        $seed->wilayah_id = '2';
        $seed->nama = 'The Great Oko';
        $seed->alamat = 'Cirapuhan, Selaawi';
        $seed->deskripsi_singkat = 'The Great Oko merupakan wisata baru di desa Cirapuhan Kecamatan Selaawi Garut, untuk menuju tempat wisata ini dari arah nagrek menuju limbangan lalu ke arah selaawi, tepatnya di desa cirapuhan. Jalan menuju The Great Oko cukup memacu andrenalin kamu jika naik kendaraan roda dua. Jalan yang terjal dan sedikit menanjak, kanan kiri jalan dipenuhi pepohonan yang begitu rimbun dan jarang sekali rumah penduduk. Tak perlu khawatir, lokasi ini aman dan begitu sejuk. Pas banget buat kamu para traveller untuk memacu rasa penasaran kamu untuk menikmati keindahan dan kesejukan alam ciptaan Tuhan.';
        $seed->longitude = '-6.996716';
        $seed->latitude = '108.051475';
        $seed->cover = 'the great oko.jpg';
        $seed->save();

        $seed = new Lokasi;
        $seed->id = '5';
        $seed->wilayah_id = '1';
        $seed->nama = 'Curug Nyogong';
        $seed->alamat = 'Kp. Sawahpasir, Mekarwangi, Cihurip';
        $seed->deskripsi_singkat = 'Keindahan Curug Nyogong ini sudah sangat terkenal sekali di kalangan pecinta traveling dan curug. Bukan hanya wisatawan dari Garut saja yang berkunjung ke curug ini. Tetapi wisatawan dari luar kota juga banyak. Jadi sangat sayang sekali jika tidak berkunjung ke curug yang indah ini.';
        $seed->longitude = '-7.501317';
        $seed->latitude = '107.835193';
        $seed->cover = 'curug nyogong.jpg';
        $seed->save();

        $seed = new Lokasi;
        $seed->id = '6';
        $seed->wilayah_id = '2';
        $seed->nama = 'Curug Kancil';
        $seed->alamat = 'Padasuka, Cibatu';
        $seed->deskripsi_singkat = 'Di Kota Garut, ada satu curug yang tersembunyi. Akses jalannya agak sulit, lokasinya juga cukup terpencil. Tak heran, air terjun bernama Curug Kancil ini tidak sepopuler curug-curug lain di Garut. Curug Kancil terletak di Desa Padasuka, Kecamatan Cibatu, Garut. Di tengah perjalanan menuju lokasi curug, traveler akan dimanjakan dengan panorama indah. Lingkungannya asri, udaranya cukup sejuk.';
        $seed->longitude = '-7.096022';
        $seed->latitude = '108.002460';
        $seed->cover = 'curug kancil.jpg';
        $seed->save();


    }
}
