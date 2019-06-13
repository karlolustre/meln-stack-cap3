//require passport for local authentication. 
//Save it as a constant called passport
const passport = ?('?');

//require passport-jwt for authenticated web tokens. 
//Save it as a constant called passportJWT
const passportJWT = ?('?');

//Load JWT extraction for extracting web tokens later on by calling the ExtractJwt property of passportJWT. 
//save it as a constant called ExtractJWT
const ExtractJWT = ?.?;

//Use a local strategy for authenticating users by passing in the string 'passport-local' as an argument to the require method
//save this as a constant named LocalStrategy
const LocalStrategy = ?('?').Strategy;

//Use JWT strategy for web tokens
//save the Strategy property of passportJWT as a constant named JWTStrategy
const JWTStrategy = ?.?;

//Include the User Model by passing in the path to User model as an argument to the require method.
//save this as a constant named UserModel
const UserModel = ?('?');

//Include bcrypt library for encryption by passing in the string 'bcrypt-nodejs' as an argument to the require method
//save this as a constant named bcrypt
const bcrypt = ?('?');

//Import moment for date parsing and handling by passing in the string 'moment' as an argument to the require method
//save this as a constant named moment
const moment = ?('?');

//determine which data of the user object should be stored in the session
//the result of the serializeUser method is attached to the session as req.session.passport.user = {_id: value}
//pass in 2 parameters to the serializeUser method of passport:
	//the user object
	//the done function
passport.serializeUser((user, done) => {
	if(!user._id){
		user._id = user.sub;
	}
	//passing in the _id property of the user object as the second argument of the done function saves the property in the session
  	done(null, user._id);
});

//retrieve the whole user object using the previously serialized _id property 
//the fetched object is then attached to the request object as req.user
//this is done by passing in the serialized id and the done function as parameters to the deserializeUser method of the passport object
passport.deserializeUser((id, done) => {
  done(null, user._id);
});

//configure passport.js to use the local strategy
//pass in a new LocalStrategy object taking in 2 parameters as an argument to the use method of the passport object:
	//a usernameField option set to 'email'
	//a function that has the ff. 3 parameters:
		//email
		//password
		//done
passport.?(new ?({ ?: '?' }, (?, ?, ?) => {

    //Query for a user that matches the email provided
    //pass in a key: value pair representing the passed in email to the findOne method of the UserModel object
    //then pass in an argument called user to the next function 
	UserModel.?({ 'email': ? }).then( (?) => {

		// Uncomment this to view the user that is being checked for authentication
		//console.log(user);

		//if no user found
		if(?){
			//Invalidate users
			return done(null, false, { message: 'Invalid credentials.\n' });
		}

		//if passed in email is the same as the email property of user
		if(? == ?.?){

			//Check for password hash compared to the stored password
			//pass in the ff. 2 arguments to the compareSync method of the bcrypt object:
				//the password passed in as this function's second argument 
				//the password property of the user object  
			if (!bcrypt.?(?, ?.?)) {
				// Return invalid credentials if log in is invalied
	        	return done(null, false, { message: 'Invalid credentials.\n' });
	      	}

	      	// Return successful login if a match is found
	      	return done(null, user);

		}

		// Invalidate users
		return done(null, false, { message: 'Invalid credentials.\n' });

	});

}));

//Configure passport for JWT usage in verification
//pass in a new JWTStrategy object as an argument to the use method of passport
//the new JWTStrategy object has the following parameters:
passport.?(new ?({
		//an object with the following properties:
			//jwtFromRequest with a value obtained from the fromAuthHeaderAsBearerToken method of ExtractJWT
        jwtFromRequest: ?.?(),
        	//secretOrKey with a value equal to the one specified in the secretKey property of config 
        secretOrKey   : '?'
    },
    //and a function has two arguments: jwtPayload and cb
    function (jwtPayload, cb) {
        //Find the user in the database
        //pass in the id property of the jwtPayload object as an argument to the findOne method of UserModel 
        return UserModel.?( ?.? )
        	//then, pass in the found user to a function that will 
            .then(user => {
            	//save found user to session
                return cb(null, user);
            })
            //catch any errors if any are encountered
            .catch(err => {
                return cb(err);
            });
    }
));

// Retrieve account information based on the current session
function getDefaultAccountInfo(accounts){
  let defaultAccount = accounts.find ((item) => item.is_default);
  let accountId = defaultAccount.account_id;
  let baseUri =  `${defaultAccount.base_uri}${'/restapi'}`;
  return baseUri;
}

// Export the necessary modules from this library
module.exports = {
	'getDefaultAccountInfo': getDefaultAccountInfo
};