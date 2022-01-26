
# Simple News Website

A simple news website built using Laravel 8 and jetstream.

## Badges

[![MIT License](https://img.shields.io/apm/l/atomic-design-ui.svg?)](https://github.com/tterb/atomic-design-ui/blob/master/LICENSEs)

[![CodeFactor](https://www.codefactor.io/repository/github/mertcanmerkit/simple-news-website-on-laravel-8/badge)](https://www.codefactor.io/repository/github/mertcanmerkit/simple-news-website-on-laravel-8)


## Features

- Sign up / Sign in.
- Admin(news writer) or member(reader) roles.
- Members can write comments on news.

**Admin panel**

- Manage news contents
- Manage comments 
- News ontents filtering.


## Demo


**Add new news content**

![news website laravel](https://media.giphy.com/media/grL4eMeKbukz95hl3P/giphy.gif)

**Update News**

![news website laravel](https://media.giphy.com/media/2w2RdPU5Vxc1WpWjwr/giphy.gif)

**Filter news content.**

![news website laravel](https://media.giphy.com/media/fSuSYpCCIGjn3Rz4uX/giphy.gif)

**Add new comment and update your comments.**

![news website laravel](https://media.giphy.com/media/Buvago61U3xI6VEEi1/giphy.gif)


**Manage comments on news. For admins.**

![news website laravel](https://media.giphy.com/media/GJWNvjYNwERzv7OPgb/giphy.gif)



## Run Locally

Clone the project

```bash
git clone https://github.com/mertcanmerkit/Simple-News-Website-on-Laravel-8
```

Go to the project directory

Install dependencies

```bash
composer install
```

In Windows

```bash
copy .env.example .env
```

In Mac

```bash
cp .env.example .env
```



Start the server

```bash
php artisan key:generate
php artisan migrate --seed

php artisan serve
```


## License

[MIT](https://choosealicense.com/licenses/mit/)

