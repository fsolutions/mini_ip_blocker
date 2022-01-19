# Mini IP Blocker with API

---

##### Project install

1. Installing backend packages
```
> composer install
```  
2. Laravel keys generation
```
> php artisan key:generate
> php artisan passport:install
```
3. Create empty DB
4. Create .env file, change DB settings, url, etc
5. Install migrations
```
> php artisan migrate
```
6. Don't forget to send web-server settings to /public folder of project

##### API

1. Create ban of IP
```
> POST /api/ban
```  
2. Get all IPs
```
> GET /api/ban
```
3. Find one IP
```
> GET /api/ban/find
```
4. Delete one IP by ID
```
> DELETE ban/{id}
```
