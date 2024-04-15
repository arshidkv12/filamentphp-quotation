<h1 align="center" id="title">Laravel Filamentphp Quotation System</h1>

<p id="description">Laravel Filamentphp Quotation System</p>

<h2>Project Screenshots:</h2>

<img src="https://github.com/arshidkv12/filamentphp-quotation/blob/main/public/images/screenshot.png?raw=true" alt="project-screenshot" width="400" height="400/">

  
  
<h2>🧐 Features</h2>

Here're some of the project's best features:

*   Add to quote option (Like add to cart)
*   Change quantity from cart page
*   Email confirmation to client
*   Email notification to admin
*   Admin panel for admin to add product and quotation
*   Quotation PDF

<h2>🛠️ Installation Steps:</h2>

<p>1. Clone The Repository</p>

```
git clone https://github.com/arshidkv12/filamentphp-quotation.git
```

<p>2. Install Packages</p>

```
composer install
```

<p>3. Setting .env Variables</p>

```
cp .env.example .env
```

<p>4. Generate Key</p>

```
php artisan key:generate
```

<p>5. Migrate DB</p>

```
php artisan migrate
```

<p>6. Create an administrator account</p>

```
php artisan make:filament-user
```

```
php artisan storage:link
```

```
php artisan serve
```

  
  
<h2>💻 Built with</h2>

Technologies used in the project:

*   php
*   laravel
*   filament
*   livewire
*   tailwindcss

<h2>🛡️ License:</h2>

This project is licensed under the MIT