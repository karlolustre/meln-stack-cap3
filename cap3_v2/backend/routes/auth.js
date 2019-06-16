//include express
const express = require('express')

//include express router
const router = express.Router()

	//load jwt for json web token generation/signing
const jwt = require('jsonwebtoken')

//load passport for auth
const passport = require('passport')

//load our custom passport module
const appPassport = require('../passport')

const { check, validationResult } = require('express-validator/check');


//login user to the system
router.post('/login', [
	check('email').isEmail(),
	check('password').isLength({ min: 8})
	], (req, res, next) => {
		const errors = validationResult(req);
		if (!errors.isEmpty()) {
			return res.status(422).json({errors: errors.array()});
		}
	passport.authenticate('local', {session: false}, (err, user, info) => {
		// if we're unable to validate, request is unauthorized
		if(err || !user) {
			return res.status(400).json({
				'error' : 'something is not right'
			})
		}

		// console.log('the info is ' + info)
		console.log('success')

	req.login(user, {session:false}, (err) => {
			if(err) {
				res.send(err)
			}

			//create a json web token
			//jwt.sign(payload, secretkey, [options])
			const token = jwt.sign(user.toJSON(), 'secret', {expiresIn: '30m'})
			// console.log(token)
			return res.status(200).json({
				'data' : {
					'user' : user,
					'token' : token
				}
			})
		})

	}) (req, res)
})

//logout
router.get('/logout', (req ,res) => {
	console.log('user is logged out')
	req.logout()
	res.json({
		status : 'logout',
		msg : 'please log in'
	})
})


module.exports = router