<img src="public/assets/yoga.png" width="100%"/>

# Ananda Yoga - A website for a made up yoga studio

A project by Jennifer & [Susanne](https://github.com/s0wie).

## About Ananda Yoga

Become a member to purchase and book yoga classes, view your schedule and keep track of your invoices. As an admin, create membership types, new yoga classes and handle invoices.

## Installation

1. Clone this project

```bash
git clone https://github.com/JennAnd/Examensarbete
```

2. Ask one of us for environment variables for Contentful

3. Set up a database and fill in variables in the .env file

4. Run

```bash
  php artisan migrate:fresh --seed
```

5. Preview the website locally

```bash
php artisan serve
```

6. To log in as admin, go to http://127.0.0.1:8000/admin and enter the following credentials:

```bash
email: jennifer@anandayoga.com
password: anandayoga
```
