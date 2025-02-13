# Laravel To-Do List API

## Deskripsi
Aplikasi To-Do List sederhana menggunakan Laravel dan PostgreSQL, dengan autentikasi berbasis JWT. API ini memungkinkan pengguna untuk mendaftar, login, serta mengelola checklist dan item dalam checklist.

## Instalasi
### 1. Clone Repository
```bash
git clone https://github.com/username/repository.git
cd repository
```
### 2. Install Dependencies
```bash
composer install
```
### 3. Konfigurasi Environment
Buat file `.env` dan sesuaikan dengan database PostgreSQL:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=todo_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
Generate key JWT:
```bash
php artisan jwt:secret
```
### 4. Migrasi Database
```bash
php artisan migrate
```
### 5. Menjalankan Server
```bash
php artisan serve
```

## Endpoints API

### **1. Autentikasi**
#### **Registrasi User**
- **Method:** `POST`
- **Endpoint:** `/api/register`
- **Body:**
```json
{
  "name": "John Doe",
  "email": "johndoe@example.com",
  "password": "password123"
}
```
- **Response:** Token JWT

#### **Login User**
- **Method:** `POST`
- **Endpoint:** `/api/login`
- **Body:**
```json
{
  "email": "johndoe@example.com",
  "password": "password123"
}
```
- **Response:** Token JWT

#### **Logout User**
- **Method:** `POST`
- **Endpoint:** `/api/logout`
- **Headers:** `Authorization: Bearer {token}`

### **2. Checklist**
#### **Membuat Checklist**
- **Method:** `POST`
- **Endpoint:** `/api/checklists`
- **Headers:** `Authorization: Bearer {token}`
- **Body:**
```json
{
  "title": "Belanja Mingguan"
}
```

#### **Mendapatkan Semua Checklist**
- **Method:** `GET`
- **Endpoint:** `/api/checklists`
- **Headers:** `Authorization: Bearer {token}`

#### **Mendapatkan Detail Checklist**
- **Method:** `GET`
- **Endpoint:** `/api/checklists/{id}`
- **Headers:** `Authorization: Bearer {token}`

#### **Memperbarui Checklist**
- **Method:** `PUT`
- **Endpoint:** `/api/checklists/{id}`
- **Headers:** `Authorization: Bearer {token}`
- **Body:**
```json
{
  "title": "Belanja Bulanan"
}
```

#### **Menghapus Checklist**
- **Method:** `DELETE`
- **Endpoint:** `/api/checklists/{id}`
- **Headers:** `Authorization: Bearer {token}`

### **3. Item dalam Checklist**
#### **Menambahkan Item ke Checklist**
- **Method:** `POST`
- **Endpoint:** `/api/checklists/{id}/items`
- **Headers:** `Authorization: Bearer {token}`
- **Body:**
```json
{
  "task": "Beli susu"
}
```

#### **Mendapatkan Detail Item**
- **Method:** `GET`
- **Endpoint:** `/api/items/{id}`
- **Headers:** `Authorization: Bearer {token}`

#### **Memperbarui Item dalam Checklist**
- **Method:** `PUT`
- **Endpoint:** `/api/items/{id}`
- **Headers:** `Authorization: Bearer {token}`
- **Body:**
```json
{
  "task": "Beli roti"
}
```

#### **Menghapus Item dari Checklist**
- **Method:** `DELETE`
- **Endpoint:** `/api/items/{id}`
- **Headers:** `Authorization: Bearer {token}`

#### **Toggle Status Item**
- **Method:** `PATCH`
- **Endpoint:** `/api/items/{id}/toggle`
- **Headers:** `Authorization: Bearer {token}`
- **Response:** Item dengan status `completed: true/false`

## Lisensi
Aplikasi ini dibuat untuk keperluan belajar dan pengembangan.
