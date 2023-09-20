1. clone project from this url => https://github.com/GuljahanG/project.git
2. go to the folder project and run commands
	1. composer install
	2. To setup your .env, kindly duplicate your .env.example file and rename the duplicated file to .env
	3. config your .env, set DB_DATABASE=db_name DB_USERNAME=db_user DB_PASSWORD=db_password
	4. php artisan key:generate
	5. php artisan migrate
	6. php artisan server

<h1>About project</h1>

<h2>CRUD Users</h2>
<h3>GET</h3>
<p>/api/users =>  get list of Users</p>
<h3>Post</h3>
<p>/api/users => store User</p>
<h3>PUT</h3>
<p>/api/users/{user} => update User</p>
<h3>DELETE</h3>
<p>/api/users/{user} => delete User</p>

<h2>CRUD Companies</h2>
<h3>GET</h3>
<p>/api/companies =>  get list of Companies</p>
<h3>POST</h3>
<p>/api/companies => store Company</p>
<h3>PUT</h3>
<p>/api/companies/{user} => update Company</p>
<h3>DELETE</h3>
<p>/api/companies/{user} => delete Company</p>

<h2>CRUD Comments</h2>

<h3>GET</h3>
<p>/api/comments =>  get list of Comments</p>
<h3>POST</h3>
<p>/api/comments => store Comments</p>
<h3>PUT</h3>
<p>/api/comments/{user} => update Comments</p>
<h3>DELETE</h3>
<p>/api/comments/{user} => delete Comments</p>
<br>

<h2>GET COMMENTS BY COMPANY ID</h2>
<h3>GET</h3>
<p>/api/companies/{company_id}/comments =>  get list of company comments</p>

<h3>GET</h3>
<p>/api/companies/{company_id}/rate => get rate of company</p>
<h3>GET</h3>
<p>/api/top => top companies by rate</p>
