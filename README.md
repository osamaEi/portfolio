# Osama Eid Bakry — Portfolio

A dark/light, database-driven developer portfolio built with **Laravel 12**. Projects, skills, experience, testimonials, and contact messages are all managed through a built-in admin dashboard.

## Features

- 🎨 Dark / light theme switcher (persists per visitor)
- 🖼️ Projects carousel with cover images and case-study pages
- ⭐ Client testimonials (from Mostaql reviews)
- 🧩 Skills, experience timeline, and an "about" section
- 📬 Working contact form (stored in DB + optional email notification)
- 🔐 Admin panel with CRUD for projects, skills, experience, testimonials, and a message inbox

## Tech stack

| | |
|---|---|
| Framework | Laravel 12 (PHP 8.2+) |
| Database | MySQL |
| Frontend | Blade + vanilla CSS/JS (no build step required) |

---

## Requirements

- PHP **8.2+**
- Composer **2.x**
- MySQL **5.7+ / 8.x**

---

## Installation

```bash
# 1. Clone the repository
git clone <your-repo-url> portfolio
cd portfolio

# 2. Install PHP dependencies
composer install

# 3. Create your environment file
cp .env.example .env        # Windows: copy .env.example .env

# 4. Generate the application key
php artisan key:generate
```

### Configure the database

Create the database, then edit the `DB_*` values in `.env`:

```sql
CREATE DATABASE portfolio_osama CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_osama
DB_USERNAME=root
DB_PASSWORD=
```

### Link storage (for uploaded images)

```bash
php artisan storage:link
```

---

## Migrate & seed

Run the migrations to create all tables, then seed the portfolio content (projects, skills, experience, testimonials, and an admin user):

```bash
# Run migrations
php artisan migrate

# Seed the database with portfolio data
php artisan db:seed
```

Or do both at once (drops all tables first — **this destroys existing data**):

```bash
php artisan migrate:fresh --seed
```

> To re-run only the portfolio seeder without wiping data:
> ```bash
> php artisan db:seed --class=PortfolioSeeder
> ```
> The seeder uses `updateOrCreate`, so it's safe to run repeatedly.

### What gets seeded

| Table | Contents |
|---|---|
| `users` | One admin account (see credentials below) |
| `projects` | 8 portfolio projects |
| `skills` | Skill set grouped by category |
| `experiences` | Professional experience entries |
| `testimonials` | 8 five-star client reviews |

---

## Run the app

```bash
php artisan serve
```

Then open:

- **Public site:** http://127.0.0.1:8000
- **Admin login:** http://127.0.0.1:8000/admin/login

### Default admin credentials

```
Email:    osamaeidbm1993@gmail.com
Password: password
```

> ⚠️ **Change this password immediately** in production. Update it in
> `database/seeders/PortfolioSeeder.php`, or after logging in.

---

## Managing content

Log in to `/admin` to:

- Create / edit / delete **projects** (with cover-image upload)
- Manage **skills**, **experience**, and **testimonials**
- Read and delete **contact messages**

Project cover images are stored in `public/projects/`.

---

## Email (contact form notifications)

By default `MAIL_MAILER=log`, so submissions are saved to the database and the
notification email is written to `storage/logs/laravel.log`. To send real emails,
configure your SMTP / Mailgun credentials in `.env`:

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_FROM_ADDRESS="hello@yourdomain.com"

PORTFOLIO_EMAIL=osamaeidbm1993@gmail.com
```

---

## Customization

- **Name, role, socials, stats:** `config/portfolio.php`
- **Styles:** `public/css/portfolio.css` (public) · `public/css/admin.css` (admin)
- **Scripts:** `public/js/portfolio.js`
