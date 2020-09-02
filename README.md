# SymbiosCodeTest

## Set Up

Clone Repository to your localhost provider. Edit .env file to connect to your localhost SQL database. Run 'php artisan migrate' to automatically add the systems data tables to the database. After installing tables, run 'php artisan db:seed' this will add the default screen and seat data to the Seats and Screens tables. 

## Using API

Append the following paths onto your localhost URL. For me this path is 'http://localhost:8888/SymbiosCodeTest/CinemaSystem/public/', so a full api path would look like 'http://localhost:8888/SymbiosCodeTest/CinemaSystem/public/api/booking/delete'.

All request data is sent in a Json format through the requests body. Examples included with each API route. 

### Customers

#### Create Customer
Route: /api/customer/create

Required Data: 

- email - the customers email
- name - the customers full name

Json Example:

```json
{
  "email": "email@email.com",
  "name": "John Doe"
}
```

#### Update Customer
Route: /api/customer/update

Required Data: 

- id - the database id of the customer record being updated
- email - the customers email
- name - the customers full name

Json Example:

```json
{
  "id": 1,
  "email": "email@email.com",
  "name": "John Doe"
}
```

*Note: email and name should be passed but remain unchanged, if not being updated*

#### Delete Customer
Route: /api/customer/delete

Required Data: 

- id - the database id of the customer record being deleted

Json Example:

```json
{
  "id": 1
}
```

### Movies

#### Create Movie
Route: /api/movie/create

Required Data: 

- name - the movie name

Json Example:

```json
{
  "name": "Raiders of the Lost Ark"
}
```

#### Update Movie
Route: /api/movie/update

Required Data: 

- id - the database id of the movie record being updated
- name - the movie name

Json Example:

```json
{
  "id": 1,
  "name": "Indiana Jones and the Temple of Doom"
}
```

#### Delete Movie
Route: /api/movie/delete

Required Data: 

- id - the database id of the movie record being deleted

Json Example:

```json
{
  "id": 1
}
```

### Showings

#### Create Showing
Route: /api/showing/create

Required Data: 

- movie_id - database id of the movie being shown
- screen_id - database id of the screen showing is on
- start_time - DateTime Value including the date and start time of showing

Json Example:

```json
{
  "movie_id": 1,
  "screen_id": 1,
  "start_time": "2020-09-13 10:00:00";
}
```

#### Update Showing
Route: /api/showing/update

Required Data: 

- id - database id of the showing being updated
- movie_id - database id of the movie being shown
- screen_id - database id of the screen showing is on
- start_time - DateTime Value including the date and start time of showing

Json Example:

```json
{
  "id": 1,
  "movie_id": 2,
  "screen_id": 1,
  "start_time": "2020-09-14 14:30:00";
}
```

*Note: movie_id, screen_id, and start_time should be passed but remain unchanged, if not being updated*

#### Delete Showing
Route: /api/showing/delete

Required Data: 

- id - the database id of the showing record being deleted

Json Example:

```json
{
  "id": 1
}
```








