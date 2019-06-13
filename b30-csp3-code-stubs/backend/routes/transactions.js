//require the express JS framework and save it as a constant called express
const express = ?('?');

//load express router for separation of routes
//save the Router method of the express object as a constant named router
const router = ?.?();

//include the Transaction Model by passing in the path to it as an argument to the require function
//save this as a constant named TransactionModel 
const TransactionModel = ?('?');

//Include our configuration within configs.js
//pass in the path to the config file as an argument to the require function
//save this as a constant named config
const config = ?('?');

//Import stripe for online payments
const stripe = require("stripe")(config.stripeSecretKey);

//use moment for timestamps
//pass in the string "moment" as an argument to the require function
//save this as a constant named moment
const moment = ?("?");

//include the Availability model
const AvailabilityModel = ?('?');

//include the User model
const UserModel = ?('?');

//create a new transaction when a POST request is received at the / URI
//do this by passing in 2 arguments to the post method of the router object:
	//the '/' URI
	//a middleware function that takes in 2 parameters:
		//req (naming convention for HTTP request argument to the middleware function)
	    //res (naming convention for HTTP response argument to the middleware function)
router.?('?', (?, ?) => {
	//Search for the specific availability to be booked
	//pass in a query object with a property named _id and value equal to the id property of the request body to the findOne method of the AvailabilityModel object
	//then pass in the resulting availability as a parameter to a middleware function
	AvailabilityModel.?({ "?": ?.?.? }).then( (?) => {
		
		//instantiate a new transaction, saving it as a variable named newTransaction
		let newTransaction = new TransactionModel({//it has the following properties:
			//ownerEmail equal to the email property of the request body
			'?': ?.?.?,
			//availabilityId equal to the id property of the request body
			'?': ?.?.?,
			//quantity equal to the quantity property of the request body
			'?': ?.?.?,
			//amount equal to the product of the quantity property of the request body and the price property of the availability object
			'?' : ?.?.? * ?.?,
			//current date and time using moment
			'date' : moment().format('MMMM Do YYYY, h:mm:ss a') 
		});

		//If no availability found
		if(?){
			//return a json response with a status of 500
			return ?.?(?).?({ 
				//and an error message that no such availability was found
				'error': '?',
			});
		}

		//if no seats are available
		if(?.? == 0){
			//return a json response with a status of 500
			return ?.?(?).?({
				//and an error message that no more seats are available for booking 
				'error': '?',
			});
		}

		//if there are seats available and the quantity to be booked is not more the the available seats
		if(?.? > ? && ?.? <= ?.?){
			//reduce the number of available seats by the quantity booked
			?.? = ?.? - ?.?;
			//once number of available seats run out
			if(?.? == 0) {
				//set the isActive property of the availability object to false
				?.? = ?;
			}
			//save changes by using the save method of the availability object
			?.?();	

		  	//save the newTransaction to the database
		  	//pass in a middleware function that takes in the ff. 2 parameters to the save method of the newTransation object: 
			  	//err for any errors thrown
			  	//transaction for the newly saved transaction
			newTransaction.?( (?, ?) => {
				
				//if an error is thrown
				if(?){
					//return a json response with a status of 500
					return ?.?(?).?({
						//and a property named error containing the err object
						'error': ? 
					});
				}

				//If database operation is successful, return a json response containing the transaction object with a status of 200
				return ?.?(?).?(?);

			});

		} else {
			//return a json response
			return ?.?({
						//with a message stating insufficient seats for intended booking
						'message': '?'
					});
		}
	})
	//catch any errors by passing in the err object as an argument to the catch method
	.?( ? => {
				//if any errors are caught, return a json response containing the err object in the err property
				return ?.?({ 
					'err': ?,
				});
	});
});


//retrieve all transactions when a GET request is received on the /all URI
//do this by passing in 2 arguments to the get method of the router object:
	//the '/all' URI
	//a middleware function that takes in 2 parameters:
		//req (naming convention for HTTP request argument to the middleware function)
	    //res (naming convention for HTTP response argument to the middleware function) 
router.?('?', (?, ?) => {
	//find all transactions in the database for admin to view
	//pass an empty query object to the find method of the TransactionModel to select all transactions
	//then pass in the resulting transactions as a parameter to a middleware function
	TransactionModel.?(?).then( (?) => {

		//If no transactions are found, 
		if(?){
			//return a json response with a status of 200
			return ?.?(?).?({ 
				//and a message property stating that there are no transactions to show
				'message': '?'
			});
		}

		//otherwise, return the transactions object within the transactions property of the data property with a status of 200
		return ?.?(?).?({ 
			'data': {
				'transactions': ?
			}
		});
	});
});

//retrieve all transactions of the logged in user when a GET request is received at the /:id URI
//do this by passing in 2 arguments to the get method of the router object:
	//the '/:id' URI
	//a middleware function that takes in 2 parameters:
		//req (naming convention for HTTP request argument to the middleware function)
	    //res (naming convention for HTTP response argument to the middleware function)
router.?('?', (?, ?) => {
	//selectively query for the user with _id matching the id wildcard from the URL
	//do this by passing in a query object with property _id equal to the id wildcard from the URL to the findOne method of the UserModel object
	//then pass in the resulting user to a middleware function
	UserModel.?({'?': ?.?.?}).?( (?) => {
		//if no user found
		if(?){
			//return a json response with status 200 and a message stating no user found
			return ?.?(?).?({
				'message': '?'
			});
		}

		//otherwise, save the email property of the user object as a variable named email
		let email = ?.?;
		//selectively query for all transactions of specified user
		//do this by passing in a query object with property ownerEmail equal to the email variable to the find method of the TransactionModel
		//then pass in the resulting transactions as an argument to a middleware function
		TransactionModel.?({'?': ?}).?( (?) => {
			// If no transactions are found, 
			if(?){
				//return a json response with a status of 200 and a message that no transactions were found
				return ?.?(?).?({ 
					'message': '?'
				});
			}

			//otherwise, return all transactions of the user in session as a json response with status of 200
			return ?.?(?).?({ 
				'data': {
					'transactions': ?
				}
			});
		});
	});
});

//create a new transaction to reflect cancellation when a POST request is received on the /:id URI
//do this by passing in 2 arguments to the post method of the router object:
	//the '/:id' URI
	//a middleware function that takes in 2 parameters:
		//req (naming convention for HTTP request argument to the middleware function)
	    //res (naming convention for HTTP response argument to the middleware function)
router.?('?', (?,?) => {
	//selectively query for a transaction with the _id matching the id used as a wildcard in the url
	//do this by passing in a query object with property _id equal to the wildcard id to the findOne method of the TransactionModel object
	TransactionModel.?({'?' : ?.?.?})
		//then pass in the resulting transaction as an argument to a middleware function
		.then(? => {
			//if there's a transaction found,
			if(?) {
				//save it as a variable named oldTransaction
				let ? = ?;

				//instantiate a new transaction and save it as a variable named newTransaction
				let newTransaction = new TransactionModel({//this new transaction will have the ff. properties:
					//ownerEmail equal to the ownerEmail property of the oldTransaction object
					'ownerEmail': ?.?,
					//availabilityId equal to the availabilityId property of the oldTransaction object
					'availabilityId': ?.?,
					//quantity equal to the negative value of the quantity property of the oldTransaction object
					'quantity': -?.?,
					//amount equal to the negative value of the amount property of the oldTransaction object
					'amount' : -?.?,
					//status equal to the status property of the request body
					'status' : ?.?.?,
					//date set to current date and time
					'date' : moment().format('MMMM Do YYYY, h:mm:ss a')
				});

				//save this new transaction by passing in a middleware function to the save method of the newTransaction object
				//this middleware function takes in the ff. 2 arguments:
					//err for errors thrown
					//transaction for the newly created transaction
				newTransaction.?( (?, ?) => {
				
					//if an error is thrown
					if(?){
						//return a json response with status 500 and the err object
						return ?.?(?).?({
							'error': ? 
						});
					}

					//if database operation is successful, return a json response with status 200 and an object with the below properties
					return ?.?(?).?({
						//a data property
						'data' : {
							//that has a message property with a successful cancellation message
							'message' : '?',
							//and the transaction object
							'transaction' : ?
						}
					});
				});
			}
			//if there's no transaction found
			else {
				//return a json response with a message stating that no transaction was found
				return ?.?({
					'message' : '?'
					});
			}
		});
});

//export the router object
module.exports = router;