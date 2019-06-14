const express = require('express')
const router = express.Router()

const jwt = require('jsonwebtoken')
const passport = require('passport')
const appPassport = require('../passport');

//login user to the system
router.post('/login', (req, res, next) => {
	passport.authenticate('local', {session:false}, (err, user, info) => {
		// console.log(user)
		if (err || !user) {
			return res.status(400).json({
				'error': 'someting is not right'
			})
		}
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