# heating-stats

## Install Apache web server

```bash
$ sudo apt-get install apache2 -y
$ sudo apache2ctl -v
```

## Install PHP

```bash
$ sudo apt-get install apt-transport-https gnupg2 ca-certificates -y
$ sudo wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
$ sudo sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'
$ sudo apt-get update
$ sudo apt-get install libapache2-mod-php php php-common php-xml php-gd php8.0-opcache php-mbstring php-tokenizer php-json php-bcmath php-zip unzip curl php-curl -y
$ php -v
```

## Install composer

```bash
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
$ composer --version
```

## Install sqlite

```bash
$ sudo apt-get install sqlite3
$ sqlite3 --version
$ sudo apt-get install php-sqlite3
```

## Linux permissions for web dev

```bash
$ sudo usermod -a -G www-data admin
$ sudo chown -R root:www-data /var/www
$ sudo chmod 2775 /var/www
$ find /var/www -type d -exec sudo chmod 2775 {} +
$ find /var/www -type f -exec sudo chmod 0664 {} +
```

Re-login to shell for changes to take effect.

## Configure Apache

```bash
$ sudo vi /etc/apache2/sites-available/heating-stats.conf

<VirtualHost *:80>
    ServerName heating-stats.schlatter.net

    ServerAdmin ch@schlatter.net
    DocumentRoot /var/www/html/heating-stats/public

    <Directory /var/www/html/heating-stats>
    	AllowOverride All
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

```bash
$ sudo a2enmod rewrite
$ sudo a2ensite heating-stats.conf
$ sudo systemctl restart apache2.service 
$ sudo systemctl status apache2.service 
```


