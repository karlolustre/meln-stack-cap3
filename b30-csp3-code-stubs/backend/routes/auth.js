//require the express JS framework and save it as a constant called express
const express = ?('?');

//Load express router for separation of routes
//save the Router method of the express object as a constant named router
const router = ?.?();

//Load JWT for JSON Web Token generation/signing
//pass in the string 'jsonwebtoken' as an argument to the require function
//save this as a constant named jwt
const jwt = ?('?');

//Load passport for authentication
//pass in the string 'passport' as an argument to the require function
//save this as a constant named passport
const passport = ?('?');

//Load our customizations on the passport module
//pass in the path to our passport module as an argument to the require function
//save this as a constant named appPassport
const appPassport = ?('?');

//Include our configuration within config.js
//pass in the path to our config file as an argument to the require function
//save this as a constant named config
const config = ?('?');

//Login User to the system when a POST request is received at the /login URI
//do this by passing in the ff. 2 parameters to the post method of the router object:
  //the /login URI
  //a middleware function that takes in the ff. 3 parameters:
    //req (naming convention for HTTP request argument to the middleware function)
    //res (naming convention for HTTP response argument to the middleware function)
    //next (naming convention for a callback argument to the middleware function)
router.?('?', (?, ?, ?) => {

  //Authenticate using the local passport library
  //this is done by passing in the ff. 3 parameters to the authenticate method of the passport object:
    //the string 'local'
    //the session option, set to false
    //a middleware function with the ff. 3 parameters:
      //err
      //user
      //info
	passport.?('?', {?: ?}, (?, ?, ?) => {

    //If we're unable to validate (error thrown or no user found)
    if (? || ?) {
        //unauthorize request by sending a response with a status of 400 and a json containing an error message
        //this is done by returning the ff. two methods of the res object:
          //the status method with an argument of 400 passed in
          //the json method with the response body
        return res.?(?).?({
          //set an error message of 'something is not right'
          '?': '?',
         });
    }

    //Otherwise, log the user in and create a session
    //pass in the ff. 3 parameters to the login method of the req object:
      //the user object
      //the session option, set to false
      //a middleware function with a passed in err argument
    req.?(?, {?: ?}, (?) => {
      //if an error is thrown
      if (?) {
        //send the error as a response
        //pass in the err object as an argument to the send method of the res object
        ?.?(?);
      }
      //generate a token by using the sign method of the jwt object with the ff. 3 arguments:
        //the toJSON() method of the user object
        //the secretKey property of the config object
        //the option expiresIn set to '30m'
      //save the generated token as a constant named token
      const token = ?.?(?.?(), ?.?, { ?: '?' });
      //return a response to the client with a status of 200 and a json body
      return res.status(200).json({
          //the json body has a data property that has an object for a value
          'data': {
            //within the data property are 2 properties: 
              //the user object as a value to the user property
              //the token object as a value to the token property 
            '?': ?,
            '?': ? 
          }
      });
    });

  })(req, res);

});

//logout user a GET request is received at the /logout URI
//do this by passing in the ff. 2 parameters to the get method of the router object:
  //the /logout URI
  //a middleware function that takes in the ff. 2 arguments:
    //req (naming convention for HTTP request argument to the middleware function)
    //res (naming convention for HTTP response argument to the middleware function)
router.?('?', function(?, ?){
  //call the logout method of the req object
  ?.?();
  //return a json response
  return ?.?({
    //with a message that says 'logged out'
    '?' : '?'
  });
});

//export the router
module.exports = router;