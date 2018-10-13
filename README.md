# This is a real time single page forum app.

## We are going to use Pusher, Laravel, Vuejs. Vuetify, JWT, and markdown

This project is the source code of a Udemy course, you can get this course with discount coupon from [here](https://goo.gl/mB6ssR)

## Installation

Clone this repository

```bash
git clone git@github.com:bitfumes/real-time-single-page-forum-app.git
```

Go inside the directory

```bash
cd real-time-single-page-forum-app
```

Now install composer

```bash
composer install
```

Generate key on .env file

```bash
cp .env.example .env
php artisan key:generate
```

## Setting for Pusher

Go to .env file and change Broadcast drive to pusher

```
BROADCAST_DRIVER=pusher
```

and also give credentials of your pusher on .env file

```
PUSHER_APP_ID=xxxxxx
PUSHER_APP_KEY=xxxxxxxxxxxxxxxxxxxx
PUSHER_APP_SECRET=xxxxxxxxxxxxxxxxxxxxxx
PUSHER_APP_CLUSTER=xxx
```

open bootstrap.js file and provide pusher key there also.

```javascript
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: "xxxxxxxxxxxxxxxxxxxxx",
    cluster: "xxx",
    encrypted: true,
    ...
```

## Jobs table

_As this project uses queue so we need to settings related to that also._

Now make changes for queue driver on .env file

```
QUEUE_DRIVER=database
```

Generate jobs table and migrate it

```bash
php artisan queue:table
php artisan migrate
```

Now we have jobs table, and to make system real time, we need to dispatch queued events.

So lets start queue worker for that.

```bash
php artisan queue:work
```

keep this running.

_For any query, contact sarthak@bitfumes.com_
