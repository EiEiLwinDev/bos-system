# Mini Module of BOS system using DDD Architecture.

This is a Laravel backend API for mini module of BOS system.

## Requirements

- PHP >= 8.2 (8.2 recommended)
- Composer
- SQLite / MySQL / PostgreSQL (for database)
- Node.js & npm (optional if using frontend scaffolding)
- Git

---

## Installation

1. **Clone the repository**

```bash
git clone https://github.com/EiEiLwinDev/bos-system.git
cd bos-system 
```

2. **Composer install**
```bash
composer install
```

3. **Copy the environment file**
```bash
cp .env.example .env
```

4. **Generate application key**
```bash
php artisan key:generate
```
---

## Database Setup
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project_management_system
DB_USERNAME=username
DB_PASSWORD=password

## Database Migration 
php artisan migrate --seed

## Run locally
php artisan serve
 

4. **testing database migration**
```bash
php artisan migrate --seed
```
 

## Caching

1. **Clear Cache**
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
```

## Mail Configuration (for notifications)

1. get app password from mail setting

2. set up env variables
```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Project Management System"
```

## API Endpoints

1. **Authentication**

```bash
POST            api/v1/auth/login 
```

2. **Project**
```bash
POST            api/v1/projects 
GET             api/v1/projects/{id} 
```

3. **Task**

```bash
POST            api/v1/tasks  