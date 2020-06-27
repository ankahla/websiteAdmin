Websites dashboard
===================

A project to manage cpanel accounts, ftp, database, emails, cms and social accounts (login and passsword are stored without encryption)

** Installing **

This is a dockerized project each time you want to start the containers run _make start_ (if it is the first time it will creates images).

If containers are running execute _make install_ to install all dependency via composer.

** Creating admin account **

Using symfony console create new user with Role = *ROLE_ADMIN* : 
- php app/console fos:user:create
- php app/console fos:user:promote

