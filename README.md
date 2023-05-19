
## Installation steps

1.	Clone the repository

git clone https://github.com/tonymra/freight 

2.	Switch to the repo folder

cd freight

3.	Copy the example env file and make the required configuration changes in the .env file

cp .env.example .env

Update database and email settings

4.	Generate a new application key

php artisan key:generate

5.	Run the database migrations and seeders (Set the database connection in .env before migrating)

php artisan migrate:fresh --seed

6.	Start the local development server

php artisan serve

You can now access the server at http://127.0.0.1:8000

7.	To test the PaymentRequest notification 

http://127.0.0.1:8000/send-notification 

8.	To test the event and listener 

http://127.0.0.1:8000/test-event


