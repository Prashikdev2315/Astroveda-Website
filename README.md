<<<<<<< HEAD
# AstroVeda

Pooja booking, Kundli generation, and Horoscope checking platform with separate **Customer** and **Astrologer** logins. Backend uses **PHP + MySQL** (XAMPP) with role-based access and booking workflows.

---

## 🚀 TL;DR
- Spin up XAMPP (Apache + MySQL)
- Create a database named `astroveda` in phpMyAdmin
- Configure DB creds in `conn.php`
- Place the project folder `astrovedaProject/` under `htdocs/`
- Open `http://localhost/astrovedaProject/user-type-selection.html` and pick your role (Customer / Astrologer)

---

## 📌 Core Features

### Customer
- Register/Login
- Browse poojas and available astrologers
- Book pooja (online or in-person)
- Upload birth details for **Kundli**
- Check daily/weekly/monthly **Horoscope**
- Manage profile & bookings

### Astrologer
- Register/Login
- Manage profile and availability
- View and respond to bookings
- Generate & upload Kundli reports
- View customer feedback

### Admin (optional future scope)
- Approve astrologers and manage pooja catalog
- Moderate content, handle escalations

---

## 🏗️ Project Structure
```
astrovedaProject/
│
├── user-type-selection.html       # Landing page (choose Customer or Astrologer)
├── conn.php                       # Database connection file
├── aregister-check.php            # Astrologer registration backend
├── astrologer-login.html          # Astrologer login page
├── astrologer-login-check.php     # Astrologer login backend
├── astrologer-main-page.html      # Astrologer dashboard
├── astrologer-pooja.php           # Manage poojas (astrologer)
├── astrologer-register.html       # Astrologer registration page
├── astrologer-viewfeedback.html   # Astrologer feedback page
├── astrologer-viewfeedback.php    # Backend for feedback view
├── customer-login.html            # Customer login page
├── customer-login-check.php       # Customer login backend
├── customer-register.html         # Customer registration page
├── cregister-check.php            # Customer registration backend
├── pooja.html                     # Pooja listing page
├── pooja-booking.html             # Booking form for poojas
├── pooja-booking-check.php        # Booking backend logic
├── kundli.html                    # Kundli request form
├── kundli.css                     # Kundli page styling
├── Horoscope.html                 # Horoscope main page
├── Horoscope.css                  # Horoscope styling
├── aboutus.html                   # About us page
├── astroveda.html                 # Home page
├── astroveda.css                  # Global CSS styling
├── astrovedanew.css               # Alternate styling
├── insertfeedback.php             # Feedback submission backend
├── change-status.php              # Update booking status (astrologer)
│
├── astrologers/                   # Astrologer-related assets/pages
├── new/                           # Miscellaneous resources
├── ZodiacSigns/                   # Horoscope pages by zodiac sign
│   ├── Aries.html, Taurus.html, … (all 12 signs)
│   └── zodiac.css
```

---

## 🔐 Authentication & Roles
- Separate login flows for **Customer** and **Astrologer**
- PHP sessions for authentication
- Credentials checked in `*-check.php` scripts

---

## ⚙️ Configuration
Update your DB credentials in `conn.php`:
```php
<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "astroveda";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
```

---

## 🧮 Booking Workflow
1. Customer logs in and selects a pooja/astrologer
2. Fills in booking form → handled by `pooja-booking-check.php`
3. Status updates visible in customer and astrologer dashboards
4. Astrologer can mark status using `change-status.php`

---

## 🔯 Kundli Generation
- Customers submit DOB, TOB, and POB in `kundli.html`
- Request stored in DB (handled via PHP backend)
- Astrologer can upload Kundli reports for customers

---

## ♈ Horoscope
- Zodiac-based horoscope pages stored under `ZodiacSigns/`
- Linked via `Horoscope.html`
- Styles managed by `Horoscope.css` and `zodiac.css`

---

## 🖥️ Local Setup (XAMPP)
1. Install **XAMPP** and start **Apache** & **MySQL**
2. Create a database named `astroveda`
3. Place `astrovedaProject/` into `C:/xampp/htdocs/`
4. Update DB credentials in `conn.php`
5. Access via `http://localhost/astrovedaProject/`

=======
# Astroveda-website
>>>>>>> 03b0b19e86836ea51d067a4e105b4249ba495c77
