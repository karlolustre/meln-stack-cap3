// Export configuration variables
module.exports = {

	// Establish the port where the application will be run on
	'port': process.env.PORT || ?,
	
	// Specify the app secret key
	'secretKey': process.env.SECRET_KEY || '?',

	// Specify the database URL
	'databaseURL': process.env.DATABASE_URL || '?',
	
	// Establish salt rounds
	'saltRounds': ?,

	// Set the Stripe secret key
	'stripeSecretKey': process.env.STRIPE_SECRET_KEY || '?',

};