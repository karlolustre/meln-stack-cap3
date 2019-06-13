//require the express JS framework and save it as a constant called express
const express = ?('?');

//load express router for separation of routes
//save the Router method of the express object as a constant named router
const router = ?.?();

//include the User Model by passing in the path to it as an argument to the require function
//save this as a constant named UserModel 
const UserModel = ?('?');

//require bcrypt-nodejs for hashing passwords
//do this by passing in the string 'bcrypt-nodejs'as an argument to the require function
//save this as a constant named bcrypt
const bcrypt = ?('?');

//register a new user when a POST request is received on the /register URI
//do this by passing in the ff. 2 parameters to the post method of the router object:
	//the /register URI
	//a middleware function that takes in 2 parameters:
		//req (naming convention for HTTP request argument to the middleware function)
	    //res (naming convention for HTTP response argument to the middleware function)
router.?('?', (?,?) => {
	//save the submitted email from the request body as a variable named email
	let email = ?.?.?;
	//save the submitted password from the request body as a variable named password
	let password = ?.?.?;

	//if either email or password is not submitted
	if(? || ?) {
		//return a json response with a status of 500 and an error message stating information submitted is incomplete
		return res.?(?).?({
			'error' : '?'
		});
	}

	//search for any duplicate user records in the database
	//pass in a query object with a property email and value equal to the email variable to the find method of the UserModel object
	UserModel.?({'?' : ?})
		//then pass in the 2 ff. parameters to a middleware function:
			//users for the query results
			//err for any errors thrown
		.then((?, ?) => {
			//if an error is thrown
			if(?) {
				//return a json response with status 500 and the err object as a property of the res object
				return ?.?(?).?({
					'error' : ?
				});
			}

			//if the length property of the users object is greater than 0
			if(?.? > ?) {
				//return a json response with status 500 and an error message stating that the user already exists
				return ?.?(?).?({
					'error' : '?'
				});
			}

			//pass in the ff. 2 parameters to the genSalt method of the bcrypt object
				//the number of salt rounds - 10 in our case
				//a middleware function taking in the ff. 2 parameters:
					//err for any errors thrown
					//salt for the generated salt
			bcrypt.?(?, function(?, ?) {
				//hash the user password by using the hash method of the bcrypt object
				bcrypt.hash(password, salt, null, function(err, hash) {
					//construct a new user and save it as a variable named newUser
					let newUser = UserModel({
						//the email property of the new user object is equal to the submitted email
						'email' : ?,
						//while the password property is equal to the hashed password
						'password' : ?
					});

					//save the new user in the database by using the save method of the newUser object
					//the save method takes in a middleware function with an err object for its parameter
					newUser.?(? => {
						//if no errors are thrown
						if(?) {
							//return a json response with a message for successful user registration
							return ?.?({
								'message' : '?'
							});
						}
					});
				});
			});
		});
});

//export the router object
module.exports = router;