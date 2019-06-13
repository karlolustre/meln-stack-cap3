//Load Mongoose library for data modeling
//pass in the string 'mongoose' as an argument to the require method
//save this as a constant called mongoose
const mongoose = ?('?');

//load jsonwebtoken for authentication
//pass in the string 'jsonwebtoken' as an argument to the require method
//save this as a constant named jwt
const jwt = ?('?');

//Load Mongoose schema for models
//save the Schema property of the mongoose object as a constant named Schema
const Schema = ?.?;

//crete a new schema for the User
const UserSchema = new Schema({
	//this UserSchema has the following properties with corresponding data types:
	email: String,
	password: String,
	//the isAdmin property is of type Boolean and has a default value of false
	isAdmin: {type: Boolean, default: false} 
});

//add a JWT generation method to the Schema
UserSchema.methods.generateJWT = function() {
	//get today's date by creating a new Date object
	//save it as a constant named today
	const today = ? ?();

	//set the expirationDate for the JWT to be today
	const expirationDate = new Date(today);

	//add a 60 minute expiration to the JWT
	//do this by adding 60 to the getDate method of the today object
	//pass this in as the argument to the setDate method of the expirationDate object
	expirationDate.?(?.?() + ?);

	//use the sign method of the jwt object with the ff. parameters:
		//an object with the following properties:
			//email
			//id
			//expiration
		//and a string 'secret'
	return jwt.sign({
		email: this.email,
		id: this._id,
		exp: parseInt(expirationDate.getTime() / 1000, 10)
	}, 'secret');
}

//add a JSON generation method to the schema
UserSchema.methods.toAuthJSON = function() {
	return {
		_id: this._id,
		email: this.email,
		token: this.generateJWT()
	};
};

//Set up the User model and export it to the main application
//pass in 2 arguments to the model method of mongoose:
	//the name of this model as a string
	//the UserSchema object
module.exports = ?.?('?', ?);