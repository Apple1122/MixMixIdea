
# MIXMIXIDEA

![N|Solid](https://lh3.googleusercontent.com/-mRejPhWkdj4/Wvo3J_ysj6I/AAAAAAAAG-A/xCVlgLb9y804w0ekNmpkWKEmUAmPNNbwQCEwYBhgL/w140-h139-p/025235a016e328ce0dc12f6d9f2a5f09.png)


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

```
require PHP >= 7.1.3
```

### Installing

A step by step series of examples that tell you have to get a development env running
```
install xampp or wamp
```
follow Laravel official document to build up
```
https://laravel.com/docs/5.6/installation
```
copy the project and install package
```
> git clone https://github.com/yuweiweiouo/MixMixIdea.git
> cd MixMixIdea
> npm install --save
> composer install
```
create a .env file 
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= "change me"
DB_USERNAME= "change me"
DB_PASSWORD= "change me"

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```
migrate
```
> php artisan migrate --seed
```

create encyption key
```
> php artisan key:generate
> laravel add encrption key
```

Done!