const passport = require('passport');

const passportJWT = require('passport-jwt');

const ExtractJWT = passportJWT.ExtractJwt;

const LocalStrategy = require('passport-local').Strategy;

const JWTStrategy = passportJWT.Strategy;

const UserModel = require('./models/User');

const bcrypt = require('bcrypt-nodejs');

const momment = require('moment');

//configure passport.js architecture to use the local strategy
passport.use( new LocalStrategy({ usernameField : 'email'}, (email, password, done) => {
	UserModel.findOne({ 'email' : email })

	.then((user) => {
		// console.log(user)
		if (!user) {
			return done(null, false, { message : 'Invalid Credentials' })
		}
		if (email == user.email) {
			//check for the password hash compared to the stored password
			if (!bcrypt.compareSync(password, user.password)) {
				return done(null, false, { message : 'Invalid Credentials' })
			}

			return done(null, user)
		}
		return done(null, false, { message: 'Invalid Credentials' })
	})


}))



//confiigure passport for jwt usage in verification
passport.use(new JWTStrategy({
	jwtFromRequest : ExtractJWT.fromAuthHeaderAsBearerToken(),
	secretOrKey : 'secret'
},
function(jwtPayload, cb) {
	//find the user in the db as needed
	// consolg.log()
	return UserModel.findOne(jwtPayload.id)
	.then(user => {
		return cb(null, user)
	})
	.catch(err => {
		return cb(err)
	})
}
)) 