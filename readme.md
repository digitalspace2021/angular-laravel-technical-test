# Technical test angular-laravel  

## Technologies Used  

### Frontend  

- **Framework**: Angular 17  
- **Node.js**: 20.14  

### Backend  

- **Language**: PHP 8.2  
- **Database**: MySQL  

## Installation and Setup  

### 1. Clone the Repository  

```sh  
git clone <https://github.com/digitalspace2021/angular-laravel-technical-test.git>  
cd <angular-laravel-technical-test>  
cd <backend or frontend>  
```  

### 2. Frontend Setup (Angular 17)  

```sh  
cd frontend  
npm install  # Install dependencies  
```  

1. Create the `environment.ts` file based on `environment.example.ts`.  

```sh  
npm ng serve  # Start the development server  
```  

### 3. Backend Setup (PHP 8.2 and MySQL)  

1. Configure the database in the `.env` file or the corresponding configuration file.  
2. Install dependencies if using Composer:  

```sh  
cd backend  
composer install  
```  

3. Start the local server:  

```sh  
php artisan serve  
```  

4. You can check the JSON collection in the `database` folder.  

### 4. Database Setup  

Run migrations if applicable:  

```sh  
php artisan migrate:fresh --seed  # If using Laravel  
```  

## Running the Project  

To run the complete project:  

1. Start the backend: `php artisan serve`  
2. Start the frontend: `ng serve`  

Then, access `http://localhost:4200` in your browser.  

## Notes  

- Ensure that MySQL is running.  
- Modify configurations as needed for different environments.  

🚀 Ready to develop!
