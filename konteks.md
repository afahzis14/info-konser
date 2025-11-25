# Konteks Proyek Info Konser

## 📋 Ringkasan Proyek

**Nama Proyek:** info_konser  
**Framework:** Laravel 12.0  
**PHP Version:** ^8.2  
**Database:** SQLite (default)  
**Status:** Proyek baru/fresh installation dengan struktur dasar Laravel

## 🎯 Tujuan Proyek

Berdasarkan nama proyek "info_konser", aplikasi ini kemungkinan ditujukan untuk sistem informasi konser. Namun saat ini masih dalam tahap awal dengan struktur dasar Laravel tanpa fitur khusus yang telah diimplementasikan.

## 🏗️ Struktur Proyek

### Direktori Utama

```
info_konser/
├── app/                    # Kode aplikasi utama
│   ├── Http/
│   │   └── Controllers/    # Controller aplikasi
│   ├── Models/             # Model Eloquent
│   └── Providers/          # Service Providers
├── bootstrap/              # File bootstrap aplikasi
├── config/                 # File konfigurasi
├── database/               # Database migrations, seeders, factories
├── public/                 # Entry point aplikasi (index.php)
├── resources/              # Views, CSS, JS
├── routes/                 # File routing
├── storage/                # File storage, logs, cache
├── tests/                  # Unit dan Feature tests
└── vendor/                 # Dependencies Composer
```

## 📦 Dependencies

### Backend (Composer)
- **Laravel Framework:** ^12.0
- **Laravel Tinker:** ^2.10.1
- **PHP:** ^8.2

### Development Dependencies
- **FakerPHP/Faker:** ^1.23 (untuk generate data dummy)
- **Laravel Pail:** ^1.2.2 (untuk monitoring logs)
- **Laravel Pint:** ^1.24 (code formatter)
- **Laravel Sail:** ^1.41 (Docker development environment)
- **Mockery:** ^1.6 (untuk mocking dalam testing)
- **Nunomaduro/Collision:** ^8.6 (error handler)
- **PHPUnit:** ^11.5.3 (testing framework)

### Frontend (NPM)
- **Vite:** ^7.0.7 (build tool)
- **Laravel Vite Plugin:** ^2.0.0
- **Tailwind CSS:** ^4.0.0
- **@tailwindcss/vite:** ^4.0.0
- **Axios:** ^1.11.0 (HTTP client)
- **Concurrently:** ^9.0.1 (untuk menjalankan multiple commands)

## 🗄️ Database

### Migrations
1. **users** - Tabel user dengan kolom:
   - id (primary key)
   - name
   - email (unique)
   - email_verified_at (nullable)
   - password
   - remember_token
   - timestamps

2. **password_reset_tokens** - Tabel untuk reset password
   - email (primary key)
   - token
   - created_at

3. **sessions** - Tabel untuk session management
   - id (primary key)
   - user_id (nullable, foreign key)
   - ip_address
   - user_agent
   - payload
   - last_activity

4. **cache** - Tabel untuk cache
5. **jobs** - Tabel untuk queue jobs

### Database Default
- **Connection:** SQLite
- **File:** `database/database.sqlite`

## 🎨 Frontend

### Teknologi
- **CSS Framework:** Tailwind CSS v4.0.0
- **Build Tool:** Vite
- **Font:** Instrument Sans (dari fonts.bunny.net)

### File Assets
- `resources/css/app.css` - File CSS utama dengan Tailwind
- `resources/js/app.js` - File JavaScript utama
- `resources/js/bootstrap.js` - Bootstrap JavaScript

### Views
- `resources/views/welcome.blade.php` - Halaman welcome default Laravel dengan:
  - Dark mode support
  - Responsive design
  - Link ke dokumentasi Laravel
  - Link ke Laracasts
  - Navigation untuk login/register (jika route tersedia)

## 🛣️ Routing

### Web Routes (`routes/web.php`)
- `GET /` - Menampilkan halaman welcome

### Console Routes (`routes/console.php`)
- `inspire` - Command untuk menampilkan quote inspiratif

## 🔐 Authentication

Saat ini belum ada implementasi authentication yang lengkap. Struktur dasar sudah tersedia:
- Model User dengan trait `HasFactory` dan `Notifiable`
- Migration untuk users, password_reset_tokens, dan sessions
- View welcome sudah memiliki link untuk login/register (jika route tersedia)

## 📝 Models

### User Model (`app/Models/User.php`)
- Extends: `Illuminate\Foundation\Auth\User`
- Traits: `HasFactory`, `Notifiable`
- Fillable: `name`, `email`, `password`
- Hidden: `password`, `remember_token`
- Casts: `email_verified_at` (datetime), `password` (hashed)

## 🧪 Testing

### Struktur Testing
- **Unit Tests:** `tests/Unit/`
- **Feature Tests:** `tests/Feature/`
- **PHPUnit Configuration:** `phpunit.xml`
- **Test Database:** SQLite in-memory untuk testing

### Test Files
- `tests/Feature/ExampleTest.php` - Contoh feature test
- `tests/Unit/ExampleTest.php` - Contoh unit test
- `tests/TestCase.php` - Base test case class

## ⚙️ Konfigurasi

### File Konfigurasi Penting
- `config/app.php` - Konfigurasi aplikasi
- `config/auth.php` - Konfigurasi authentication
- `config/database.php` - Konfigurasi database
- `config/cache.php` - Konfigurasi cache
- `config/filesystems.php` - Konfigurasi file storage
- `config/logging.php` - Konfigurasi logging
- `config/mail.php` - Konfigurasi email
- `config/queue.php` - Konfigurasi queue
- `config/session.php` - Konfigurasi session
- `config/services.php` - Konfigurasi third-party services

## 🚀 Scripts & Commands

### Composer Scripts
- `setup` - Setup awal proyek (install dependencies, generate key, migrate, npm install & build)
- `dev` - Development mode dengan concurrently (server, queue, logs, vite)
- `test` - Menjalankan PHPUnit tests

### NPM Scripts
- `dev` - Development mode dengan Vite
- `build` - Build production assets

## 📁 File Penting Lainnya

### Configuration Files
- `.editorconfig` - Editor configuration
- `.gitattributes` - Git attributes
- `.gitignore` - Git ignore rules
- `vite.config.js` - Konfigurasi Vite
- `phpunit.xml` - Konfigurasi PHPUnit
- `composer.json` - Dependencies PHP
- `package.json` - Dependencies Node.js

## 🔄 Status Saat Ini

### ✅ Yang Sudah Ada
- Struktur dasar Laravel 12
- Model User dengan factory
- Migration untuk users, sessions, password_reset_tokens, cache, jobs
- Database seeder dasar
- Welcome page dengan Tailwind CSS
- Vite configuration
- Testing setup
- Dark mode support di welcome page

### ❌ Yang Belum Ada
- Authentication system lengkap (login/register)
- Controller khusus untuk fitur konser
- Model untuk data konser
- Migration untuk tabel konser
- API endpoints
- Admin panel
- Fitur khusus untuk informasi konser

## 💡 Rekomendasi Pengembangan

Berdasarkan nama proyek "info_konser", berikut adalah fitur yang mungkin perlu dikembangkan:

1. **Model & Migration:**
   - Konser (concerts)
   - Artis/Performer
   - Venue/Lokasi
   - Tiket
   - Kategori/Genre

2. **Controllers:**
   - ConcertController
   - ArtistController
   - TicketController
   - AdminController

3. **Features:**
   - CRUD konser
   - Pencarian konser
   - Filter berdasarkan tanggal, lokasi, genre
   - Detail konser
   - Booking tiket (jika diperlukan)
   - Admin panel untuk manage konser

4. **Authentication:**
   - Implementasi Laravel Breeze/Jetstream
   - Role-based access (admin, user)

5. **API:**
   - RESTful API untuk konser
   - API documentation

## 🔧 Environment Setup

Untuk menjalankan proyek ini:

1. Install dependencies:
   ```bash
   composer install
   npm install
   ```

2. Setup environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. Setup database:
   ```bash
   touch database/database.sqlite
   php artisan migrate
   ```

4. Seed database (optional):
   ```bash
   php artisan db:seed
   ```

5. Run development server:
   ```bash
   composer run dev
   # atau
   php artisan serve
   npm run dev
   ```

## 📚 Dokumentasi Tambahan

- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Learn](https://laravel.com/learn)
- [Laracasts](https://laracasts.com)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Vite Documentation](https://vitejs.dev)

---

**Terakhir Diupdate:** Analisis dilakukan pada struktur proyek saat ini  
**Versi Laravel:** 12.0  
**Status:** Fresh Installation - Siap untuk Development

