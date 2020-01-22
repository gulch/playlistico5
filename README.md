# Playlistico5

Framework: Symfony 5.x

## Setup:
### Create database
- php bin/console doctrine:database:create

### Make User
(https://symfony.com/doc/current/security.html)
- php bin/console make:user --use-argon2 User
- php bin/console make:migration
- php bin/console doctrine:migrations:migrate
- php bin/console make:fixtures
- php bin/console doctrine:fixtures:load --append

### Login Form Auth
(https://symfony.com/doc/current/security/form_login_setup.html)
- php bin/console make:auth

### Create Group
- php bin/console make:entity Group
- php bin/console make:crud Group

### Create Channel
- php bin/console make:entity Channel
- php bin/console make:crud Channel

### Create Playlist
- php bin/console make:entity Playlist
- php bin/console make:crud Playlist


---
## Useful links:
- http://xmtvplayer.com/build-m3u-file
- https://epg.iptvx.one