# Darkmatter Site

Darkmatter's Website.

## Development Setup

You first need to copy and configure a few PHP files along with the NGINX conf file.

- Copy `site/application/config/config.php.example` to `site/application/config/config.php` and configure it.
- Copy `site/application/config/database.php.example` to `site/application/config/database.php` and configure it.
- Copy `site/application/config/migration.php.example` to `site/application/config/migration.php` and configure it.
- Copy `site/application/config/darkmatter.php.example` to `site/application/config/darkmatter.php` and configure it.
- Copy `nginx/development.conf.example` to `nginx/default.conf` and configure it.

You will need a valid MySQL/MariaDB database configured in `site/application/config/database.php`.

If you encounter "Permission denied." or "Access denied." you may need to run:
```bash
chmod 777 -R site/
```

### 1. Build image
```bash
./docker-build.sh
```

### 2. Create Darkmatter Docker network
```bash
docker network create darkmatter
```

### 3. Create MariaDB database
```bash
# Create a Database server
docker run -d \
	-h darkmatter-mariadb \
	--name darkmatter-mariadb \
	--net darkmatter \
	-h darkmatter-mariadb \
	-e MARIADB_ROOT_PASSWORD="secure_password_goes_here" \
	mariadb:latest

# Run a MariaDB Client to create users and permissions etc.
# use the root password we created earlier to login.
docker run --rm -it --net darkmatter mariadb mariadb -h darkmatter-mariadb -u root -p
```

```sql
-- Create database and the database user account
CREATE DATABASE site;
CREATE USER 'site'@'%' IDENTIFIED BY 'secure_password_from_config_database_php';
GRANT ALL PRIVILEGES ON site.* TO 'site'@'%';
FLUSH PRIVILEGES;
```

### 4. Initialize the database

Add the following to your hosts file:
```
127.0.0.1	darkmatter.local
```

In order to initialize the database you will need to enable migrating in `application/config/migration.php`.
Then you will want to use a Web Browser and navigate to https://darkmatter.local/migrate and ensure you see "Successfully migrated".
If so, the database has been successfully initialized and you can now disable migrations in `application/config/migration.php`.

### 5. Run a development container

Run the container:

```bash
docker run --rm \
	-it \
	--net darkmatter \
	--name darkmatter-site \
	-p 80:80/tcp \
	-p 443:443/tcp \
	-v "$(pwd)/nginx/:/etc/nginx/conf.d/:ro" \
	-v "$(pwd)/site/:/mnt:ro" \
	darkmatter-site
```

### 6. Open your browser

Navigate to https://darkmatter.local/


## Production Setup (Deploy)

Similar steps to the development setup. Instead;

- Copy `nginx/production.conf.example` to `nginx/default.conf` and configure it.

```bash
# You might also wanna run `docker update darkmatter-mariadb --restart always`.
# Deploy container, change ports if needed.
docker run -d \
	-h darkmatter-site \
	--restart always \
	--net darkmatter \
	--name darkmatter-site \
	-p 80:80/tcp \
	-p 443:443/tcp \
	-v "$(pwd)/nginx/:/etc/nginx/conf.d/:ro" \
	-v "$(pwd)/site/:/mnt" \
	darkmatter-site
```






















