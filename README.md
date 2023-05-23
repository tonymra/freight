
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

5.	Update QUEUE_CONNECTION in your .env

QUEUE_CONNECTION=database

6.	Run the database migrations and seeders (Set the database connection in .env before migrating)

php artisan migrate:fresh --seed

7.	Start the local development server

php artisan serve

You can now access the server at http://127.0.0.1:8000

8.	To test the PaymentRequest notification only

http://127.0.0.1:8000/send-notification 

9.	To test the event and queued listener  

- http://127.0.0.1:8000/test-event .  A job will be added to the database

- To test the queue worker which will eventually send the notification after excuting the job, run php artisan queue:work


