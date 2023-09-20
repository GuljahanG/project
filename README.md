1. clone project from this url => https://github.com/GuljahanG/project.git
2. go to the folder project and run commands
	1. composer install
	2. To setup your .env, kindly duplicate your .env.example file and rename the duplicated file to .env
	3. config your .env, set DB_DATABASE=db_name DB_USERNAME=db_user DB_PASSWORD=db_password
	4. php artisan key:generate
	5. php artisan migrate
	6. php artisan server

About project

CRUD Users

GET
/api/users =>  get list of Users
Post
/api/users => store User
PUT
/api/users/{user} => update User
DELETE
/api/users/{user} => delete User

CRUD Companies

GET
/api/companies =>  get list of Companies
Post
/api/companies => store Company
PUT
/api/companies/{user} => update Company
DELETE
/api/companies/{user} => delete Company

CRUD Comments

GET
/api/comments =>  get list of Comments
Post
/api/comments => store Comments
PUT
/api/comments/{user} => update Comments
DELETE
/api/comments/{user} => delete Comments



GET COMMENTS BY COMPANY ID

GET
/api/companies/{company_id}/comments =>  get list of company comments
GET
/api/companies/{company_id}/rate => get rate of company
GET
/api/top => top companies by rate
