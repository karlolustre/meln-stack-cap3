//require the express JS framework and save it as a constant called express
const express = ?('?');

//require mongoose for handling multiple database connections
const mongoose = ?('?');

//require jsonwebtoken for handling JSON Web Tokens
const jwt = ?('?'); 

//require our configuration within config.js
const config = ?('?');

//require body-parser for parsing JSON content types
const bodyParser = ?('?');

//require passport for local authentication
const passport = ?('?');

//require cors to allow cross-origin resource sharing
const cors = ?('?');  

//require moment for timestamps
const moment = ?('?');

//Establish a connection to the database by using mongoose's connect method with the ff. 2 parameters passed in:
  //first is the URI specified in the databaseURL property of our config object
  //second is the option useNewUrlParser set to true
mongoose.?(?, { ?: ? }); 

//Load the passport implemented strategies from the passport.js module
require('?');

//Instantiate the app
const app = ?;

//Allow cross-origin requests by passing in the previously defined cors object to the app's use method 
app.?(?);

//Configure middleware to use bodyParser for parsing URL encoded bodies
//using the use method of the app object, pass in the urlencoded method of bodyParser with the extended option set to false as its parameter
app.?(?.?({ ?: ? }));

//Configure middleware to use bodyParser for parsing JSON bodies
//using the use method of the app object, pass in the json method of bodyParser
app.?(?.?());

//Configure application to use passport authentication
//using the use method of the app object, pass in the initialize method of passport
app.?(?.?());	

//Load index.js for default routes
//require the path to index.js and save it as a constant named index
const index = ?('?');

//using the use method of the app object, pass in 2 parameters:
  //the '/' path
  //the previously declared index variable  
app.?('?', ?);

//Load auth.js for auth related routes
//require the path to auth.js and save it as a constant named auth
const auth = ?('?');

//using the use method of the app object, pass in 2 parameters:
  //the '/auth' path
  //the previously declared auth variable
app.?('?', ?);

//load availabilities.js for booking related routes
//require the path to availabilities.js and save it as a constant named availabilities
const availabilities = ?('?');

//using the use method of the app object, pass in 2 parameters:
  //the '/availabilities' path
  //the previously declared availabilities variable
app.?('?', ?);

//load user.js for user related routes
//require the path to users.js and save it as a constant named user
const user = ?('?');

//using the use method of the app object, pass in 2 parameters:
  //the '/users' path
  //the authenticate method of the passport object with the ff. 3 parameters:
    //specify that the strategy to be used is 'jwt'
    //session option is set to false
    //the previously declared user variable
app.?('?', ?.?('?', {?: ?}), ?);

//load transaction.js for transaction related routes
//require the path to transactions.js and save it as a constant named transaction
const transaction = ?('?');

//using the use method of the app object, pass in 2 parameters:
  //the '/transactions' path
  //the authenticate method of the passport object with the ff. 3 parameters:
    //specify that the strategy to be used is 'jwt'
    //session option is set to false
    //the previously declared transaction variable
app.?('?', ?.?('?', {?: ?}), ?);

//catch 404 error and forward to error handler
//using the use method of the app object, pass in a middleware function with 3 arguments:
  //req (naming convention for HTTP request argument to the middleware function)
  //res (naming convention for HTTP response argument to the middleware function)
  //next (naming convention for a callback argument to the middleware function)
app.use(function(req, res, next) {
//instantiate a new Error object with an error message of 'Not Found' and save it as a variable named err
  var err = new ?('?');
//assign a value of 404 to the status property of the err object
  err.? = ?;
//send the err object to the next middleware function in the app by invoking the next function
  next(?);
});

//create the error handler middleware function
//using the use method of the app object, pass in a middleware function with 4 arguments:
  //err (the error sent here from the previous middleware via the next function)
  //req (naming convention for HTTP request argument to the middleware function)
  //res (naming convention for HTTP response argument to the middleware function)
  //next (naming convention for a callback argument to the middleware function)
app.use(function(err, req, res, next) {
//set response local variables, only providing error responses in development
//set the message property of the res.locals object to be equal to the message property of the passed in err object
  res.locals.? = ?.?;
//set the error property of the res.locals object to be equal to the passed in err object if req.app.get('env') is identical to 'development'. Else, equate this to an empty object
  res.locals.? = ?.?.?('?') === '?' ? err : {};

//send a response status by passing in the status property of the err object or 500 to the status method of the res object 
  res.status(?.? || ?);
//send a json response by passing in a key named 'error' with a value containing the message property of the err object to the json method of the res object
  res.json({ '?': ?.? });
});

//Start listening on the specified port
//use the listen method of the app object passing in 2 arguments:
  //the port property of our config object
  //a function that will print to the console the message 'Server is running at: ', the port property of our config object
app.?(?.?, () => {
  console.log('?', ?.?);
});

//export the app
module.exports = app;