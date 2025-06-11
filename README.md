#  Login
Email: admin@gmail.com  
Password: 123456
# or 
Register


# Database Setup

This project uses multiple MySQL databases:

 `main_db`
 `technical_db`
 `billing_db`
 `product_db`
 `general_db`
 `feedback_db`

 # Option 1: Importing Pre-exported SQL Files

If you prefer not to run migrations, you can use the pre-exported SQL files included in the `database/sql` folder of this project.

1. Open a MySQL client (like phpMyAdmin, DBeaver, or MySQL CLI).
2. For each database, import the corresponding .sql file:
     `main_db.sql`
     `technical_db.sql`
     `billing_db.sql`
    `product_db.sql`
     `general_db.sql`
     `feedback_db.sql`

3. Ensure your `.env` is configured properly (as shown below).

# Option 2: Using Laravel Migrations

1. Make sure MySQL is running and you have permissions to create databases.
2. Create the databases manually in MySQL with the names listed above.
3. Configure your `.env` file like this:

    env
    DB_CONNECTION=main
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=main_db
    DB_USERNAME=root
    DB_PASSWORD=

    DB_TECHNICAL_DATABASE=technical_db
    DB_BILLING_DATABASE=billing_db
    DB_PRODUCT_DATABASE=product_db
    DB_GENERAL_DATABASE=general_db
    DB_FEEDBACK_DATABASE=feedback_db
   

4. Run the migrations:

    php artisan migrate
   




