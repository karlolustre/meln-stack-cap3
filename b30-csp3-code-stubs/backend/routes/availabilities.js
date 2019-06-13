//require the express JS framework and save it as a constant called express
const express = ?('?');

//load express router for separation of routes
//save the Router method of the express object as a constant named router
const router = ?.?();

//include the Availability Model by passing in the path to it as an argument to the require function
//save this as a constant named AvailabilityModel 
const AvailabilityModel = ?('?');

//Retrieve all availabilities from the database when a GET request is sent to the '/' URI
//do this by passing in 2 arguments to the get method of the router object:
	//the '/' URI
	//a middleware function that takes in 2 parameters:
		//req (naming convention for HTTP request argument to the middleware function)
	    //res (naming convention for HTTP response argument to the middleware function)
router.?('?', (?, ?) => {

	//Search for all availabilities in the database
	//do this by passing in the ff. 2 parameters to the find method of the AvailabilityModel object:
		//an empty query object to select all documents in a collection
		//a middleware function with the ff. 2 parameters:
			//an err object
			//an availabilities object
	AvailabilityModel.?({}, (?, ?) => {

		//If no bookings are available, return a successful request status with info message
		if(?){
			//return the ff. 2 methods of the res object:
				//the status method with an argument of 200 passed in
				//the json method containing:
			return ?.?(?).?({
				//an info property with the message 'nothing available at the moment' 
				'?': '?',
			});
		}

		//otherwise, return a successful response status with a json containing all availabilities found
		//do this by returning the ff. 2 methods of the res object:
			//the status method with an argument of 200 passed in
			//the json method containing:
		return ?.?(?).?({
				//a property named 'availabilities' containing all found availabilities stored in the availabilities object 
				'?': ?,
		});
	});

});

//Add a new availability when a POST request is received on the '/' URI
//pass in the ff. 2 parameters to the post method of the router object:
	//the '/' URI
	//a middleware function that takes in 2 parameters:
		//req (naming convention for HTTP request argument to the middleware function)
	    //res (naming convention for HTTP response argument to the middleware function)
router.post('/', (req, res) => {

	//build the new availability by passing in an object with the following properties to the AvailabilityModel constructor:
	//save the newly created availability as a variable named newAvailability
	let newAvailability = AvailabilityModel({
		//a name property with its value set to the request body's name property
		'name': ?.?.?,
		//a description property with its value set to the request body's description property
		'description': ?.?.?,
		//a seats property with its value set to the request body's seats property
		'seats' : ?.?.?,
		//a price property with its value set to the request body's price property
		'price': ?.?.?,
	});

  	//save the information to the database
  	//pass in a middleware function as a parameter to the save method of the newAvailability object
  	//pass in 2 arguments to the middleware function:
  		//an err object
  		//an availability object
	newAvailability.?( (?, ?) => {

		//If an error is thrown
		if(?){
			//return a response with a status of 500 and a json object with an error property containing the thrown error
			return ?.?(?).?({
				'error': ?
			});
		}
		//if database operation is successful, return a response with a status of 200 and a json object with a data property
		return ?.?(?).?({
			'data': {
				//the data property is an object that has the ff. properties:
					//a message property containing the notification message regarding the successful operation
				'message': '?',
					//an availability property containing the availability object
				'availability': ?
			}
		});
	});
});

//retrieve availabilities based on their id when a GET request is received on the /:id URI
//pass in the ff. 2 parameters to the get method of the router object:
	//the '/:id' URI
	//a middleware function that takes in 2 parameters:
		//req (naming convention for HTTP request argument to the middleware function)
	    //res (naming convention for HTTP response argument to the middleware function)
router.?('?', (?, ?) => {

	//Search for the specific availability based on the id wildcard
	//pass in the ff. parameter to the findOne method of the AvailabilityModel object
		//a query object with property '_id' and value equal to the id used as a wildcard in the url  
	//then pass in the found availability object as a parameter to a middleware function
	AvailabilityModel.?({ '?': ?.?.? }).then( (?) => {

		//if no availability is found, return a successful response status 200 with a json body containing a message
		if(?){
			return ?.?(?).?({
				//the json response has a message stating no availabilities found
				'message': '?'
			});
		}

		//if found, return the resulting availability as a json response with a status of 200
		return ?.?(?).?({
				'availability': ?
		});

	});

});

//Retrieve availability for updating when a PUT request is received on the /:id URI
//pass in the ff. 2 parameters to the put method of the router object:
	//the '/:id' URI
	//a middleware function that takes in 2 parameters:
		//req (naming convention for HTTP request argument to the middleware function)
	    //res (naming convention for HTTP response argument to the middleware function)
router.?('?', (?, ?) => {
	//pass in the ff. 2 parameters to the update method of the AvailabilityModel object:
		//a query object with property name '_id' and value equal to the id used as a wildcard in the url
		//the body property of the req object containing the changes for the update
	AvailabilityModel.?( { '?' : ?.?.?}, ? )
		//then pass in the resulting availability as an argument to a middleware function
		.then( ? => {
			//if availability found,
			if(?) {
				//return a json response
				return ?.?({
					//with a data property
					'?' : { //that has the following properties
						//the updated availability object
						'availability' : ?,
						//a notification message for the successful update
						'message' : '?'
					}
				});
			}
			//otherwise, return a json response 
			return res.json({
				//with a message property named message stating that no such availability was found
				'message' : '?'
			});
		});
});

//export the router object
module.exports = router;