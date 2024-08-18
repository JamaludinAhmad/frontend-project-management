# How to run
This is the frontend component of the project management application. Before running this project, ensure that the backend service is up and running by following the steps at https://github.com/JamaludinAhmad/backend-project-management/.

### 1. Clone the Repository

Clone this repository to your local machine:

```bash
git clone https://github.com/JamaludinAhmad/frontend-project-management.git
```

### 2. RUN the project
#### If you're using XAMPP:

- Move your project directory to the htdocs folder (e.g., C:/xampp/htdocs/your-project-name/).

- Start Apache and MySQL in the XAMPP control panel.

- Open the project in the browser by navigating to:

```
http://localhost/your-project-name/
```
#### If you're using a custom PHP server, you can start the server by navigating to the root directory of your project and running:
```
php -S localhost:8000
```
Now, visit http://localhost:8000 in your web browser.


# Important note
if your backend service not using port 9000, you should change the port we are used in project to consume the API, here's a step:
#### 1. Go to ``` /application/controllers```
#### 2. Change the port
- In Lokasi controller
```php
class Lokasi extends CI_Controller{
    private $api_url = 'http://localhost:{{port}}/api/lokasi'; you should chage the port here

    public function __construct(){
    -
    -
    -
    -
```
- In Proyek controller
```php
class Proyek extends CI_Controller{
    private $api_url = 'http://localhost:{{port}}/api'; <- you should change your port here

    public function __construct(){
    -
    -
    -
    -
    -
