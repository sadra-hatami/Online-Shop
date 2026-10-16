<div align="center">

# Online Shop
# 🛒

### A PHP store with a catalog, cart, and checkout

A complete shopping desk: browse products, add them to a cart, place an order, and manage the catalog from an admin login.

<br>

# 👨‍💻 **Sadra Hatami**

### *Developer • Software Engineer • Creator*

<br>

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![Cart](https://img.shields.io/badge/Feature-Shopping%20Cart-E67E22?style=for-the-badge)](#-key-features)
[![Checkout](https://img.shields.io/badge/Feature-Checkout-27AE60?style=for-the-badge)](#-key-features)
[![Admin](https://img.shields.io/badge/Side-Admin-2C3E50?style=for-the-badge)](#-two-sides)
[![Persian](https://img.shields.io/badge/Catalog-Persian-success?style=for-the-badge)](https://en.wikipedia.org/wiki/Persian_language)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](https://opensource.org/license/mit)
[![Open Source](https://img.shields.io/badge/Open_Source-Project-black?style=for-the-badge&logo=github)](https://opensource.org/)
[![Stars](https://img.shields.io/github/stars/sadra-hatami/Online-Shop?style=for-the-badge)](https://github.com/sadra-hatami/Online-Shop/stargazers)

<br>

[🌐 GitHub Profile](https://github.com/sadra-hatami)
•
[📧 Email](mailto:sadra.hatami.1732@gmail.com)

</div>

---

# 📑 Table of Contents

- [About](#-about)
- [Why This Project?](#-why-this-project)
- [Key Features](#-key-features)
- [Two Sides](#-two-sides)
- [Project Structure](#-project-structure)
- [Technologies](#️-technologies)
- [Installation](#-installation)
- [Configuration](#️-configuration)
- [Usage](#️-usage)
- [Related Projects](#-related-projects)
- [Contact](#-contact)
- [License](#-license)
- [Support](#-support)

---

# 📖 About

**Online Shop** is a PHP storefront with a MySQL catalog.

A visitor browses categories, opens a product, and adds it to the cart. Checkout collects the name, phone, address, and postal code, then stores the order. An admin login can add or remove products and review orders.

The included SQL file builds the database, the categories, and a ready product list with Persian names. Product images sit in the `image` folder.

> **Tagline:** *A PHP online shop with a product catalog, cart, checkout, and order management.*

---

# 🚀 Why This Project?

A shop is a full loop, not a single page.

This one keeps that loop together:

- A catalog with categories and product pages
- A cart that carries items to checkout
- An order record with customer details
- An admin path for products and orders

The storefront is separate from the console menu in [Food Ordering System](https://github.com/sadra-hatami/Food-Ordering-System) and from the electronics site in [Electronics Business Website](https://github.com/sadra-hatami/Electronics-Business-Website).

---

# ✨ Key Features

- 🗂️ Category browse
- 📦 Product pages with image, price, and description
- 🛒 Shopping cart
- 💳 Checkout with name, phone, address, and postal code
- 🔐 Admin login and password change
- ➕ Add and remove products
- 📋 Order list and order removal
- 💾 Ready MySQL script and sample catalog

---

# 👥 Two Sides

| Side | Entry | Role |
|---|---|---|
| Storefront | `index.php` | Browse, cart, checkout |
| Admin | `login.php` | Products and orders |

---

# 📁 Project Structure

```text
Online-Shop/
├── index.php
├── browse.php
├── product.php
├── cart.php
├── checkout.php
├── login.php
├── shop_sc.sql
├── style.css
├── image/
└── img/
```

Shared logic lives in `db_fns.php`, `product_fns.php`, `user_auth_fns.php`, and `output_fns.php`.

---

# 🛠️ Technologies

- PHP
- MySQL
- HTML and CSS
- UTF-8 catalog text

---

# 🚀 Installation

```bash
git clone https://github.com/sadra-hatami/Online-Shop.git
cd Online-Shop
```

1. Place the folder under a PHP server, such as XAMPP `htdocs`.
2. Import `shop_sc.sql` in MySQL.
3. Open `index.php`.

The SQL file creates the `shop_sc` database, the tables, the admin user, and the sample products.

---

# ⚙️ Configuration

Database settings are in `db_fns.php`:

```text
host       localhost
user       shop_sc
password   password
database   shop_sc
```

Change these before a public server.

---

# ▶️ Usage

1. Import the SQL file.
2. Open the storefront and browse a category.
3. Add a product to the cart and continue to checkout.
4. Sign in as admin to add a product or review orders.

---

# 🔗 Related Projects

| Repository | Role |
|---|---|
| **[Online Shop](https://github.com/sadra-hatami/Online-Shop)** | PHP storefront (this repo) |
| **[Electronics Business Website](https://github.com/sadra-hatami/Electronics-Business-Website)** | Electronics storefront |
| **[Food Ordering System](https://github.com/sadra-hatami/Food-Ordering-System)** | Console food menu |

---

# 📬 Contact

**Developer:**

### Sadra Hatami

📧 [Email](mailto:sadra.hatami.1732@gmail.com)

🌐 [GitHub](https://github.com/sadra-hatami)

---

# 📄 License

This project is licensed under the **MIT License**.

---

# ⭐ Support

If this shop is useful as a portfolio sample, please consider giving it a ⭐ on GitHub.

---

<div align="center">

## Designed & Developed with ❤️ for the developer community of Iran and the world by **Sadra Hatami**

</div>
