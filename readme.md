# Running

```
docker-compose up
composer install
open http://localhost:8090
```

# Testing

```
composer install
vendor/bin/phpunit tests
```

# Seeing functionality in WordPress

- You'll see debug toolbar in the bottom - WordPress is rendered inside Symfony

## Using Symfony services

- Activate `Hello Dolly` plugin (it's modified) at [Installed Plugins](http://127.0.0.1:8090/wp-admin/plugins.php?plugin_status=all&paged=1&s)
- You'll see current weather in top right corner

# Testing Symfony actions

- Go to [http://127.0.0.1:8090/information](http://127.0.0.1:8090/information)
