# 📦 Sistem Manajemen SPPG – Dapur Makan Bergizi Gratis

SuperApp untuk pengelolaan **Relawan, Produksi Dapur Bergizi, Gudang Bahan Makanan, Inventaris Alat Dapur, Pengiriman, dan Akuntansi** dalam program **Makan Bergizi Gratis (SPPG)**.

Dibangun menggunakan:
- **Laravel 12**
- **Livewire**
- **AdminLTE3 + Bootstrap 4**
- **MySQL / MariaDB**

---

## 🚀 Tujuan Aplikasi
Mendukung operasional dapur program SPPG secara efisien, terukur, dan terdokumentasi mulai dari persiapan bahan makanan, proses memasak, packing, distribusi, pencatatan relawan, stok gudang hingga laporan keuangan.

---

## 🧩 Fitur Utama
### 1. Manajemen Relawan
- CRUD Relawan
- Penjadwalan shift (Persiapan, Masak, Pemorsian, Packing, Driver, Cuci)
- Kanban tugas & absensi
- Rekap jam kerja relawan

### 2. Manajemen Produksi Dapur
- Menu & resep (kebutuhan bahan per porsi)
- Rencana produksi harian: target vs realisasi porsi
- Monitoring progress memasak
- Packing & label distribusi

### 3. Pengelolaan Gudang Bahan Makanan
- Manajemen stok bahan
- Pencatatan mutasi stok (masuk / keluar / adjustment)
- Stok opname berkala & audit trail
- Notifikasi stok kritis

### 4. Inventaris Alat Dapur
- Data peralatan & kondisi (baik/rusak/maintenance)
- Log perawatan & masa garansi

### 5. Pengiriman / Delivery
- Order delivery dari dapur
- Penugasan driver & status pengiriman realtime

### 6. Akuntansi & Keuangan
- Input transaksi pemasukan & pengeluaran
- Laporan keuangan periode
- Export PDF / Excel

### 7. Ahli Gizi
- Review menu & nutrisi
- Evaluasi menu & rekomendasi perubahan

### 8. Dashboard Statistik
Menampilkan ringkasan operasional harian:
- Total relawan aktif hari ini
- Produksi porsi hari ini
- Stok kritis
- Pengiriman aktif
- Pengeluaran hari ini
- Inventaris rusak
- Grafik konsumsi per bahan

### 9. Sistem Laporan & Notifikasi
- Laporan stok, konsumsi, produksi, delivery, relawan, dan keuangan
- Alert stok kritis, pengingat shift relawan, alarm perawatan inventaris

---

## 🏗 Teknologi & Tools
| Komponen | Teknologi |
|---------|-----------|
| Backend | Laravel 12 |
| Frontend | Livewire + Blade + AdminLTE3 + Bootstrap 4 |
| Database | MySQL / MariaDB |
| Chart | Chart.js / Livewire Alpine.js |
| Auth & Role | spatie/laravel-permission |
| Export | Maatwebsite Excel / DomPDF |
| Deployment | Apache/Nginx / Docker (opsional) |

---

## 📥 Cara Instalasi
```bash
git clone https://github.com/username/sppg-superapp.git
cd sppg-superapp
composer install
cp .env.example .env
php artisan key:generate
```

Edit `.env` database lalu:
```bash
php artisan migrate --seed
php artisan serve
```

---

## 📌 Struktur Project (Ringkas)
```
app/
 ├── Http/Livewire
 ├── Models
public/
resources/
 ├── views/livewire
 ├── views/layouts (AdminLTE)
routes/
 ├── web.php
```

---

## 🧪 Testing
```bash
php artisan test
```

---

## 📌 Roadmap
- [ ] Integrasi Notifikasi Realtime (Websocket)
- [ ] Integrasi Midtrans untuk donasi
- [ ] Mobile Version (PWA)
- [ ] Scan QR untuk delivery & inventaris

---

## 📄 Lisensi
MIT License - bebas digunakan & dikembangkan.

---

## 💡 Kontribusi
Pull Request & Issue sangat terbuka.

---

## 👨‍💻 Dibuat untuk kemanusiaan
**Berbagi makanan bergizi adalah langkah mulia—teknologi mempermudah jalannya.**

