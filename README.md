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
  "email": "email@email.com"
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
  "email": "email@email.com"
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




