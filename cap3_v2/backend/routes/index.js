
const express = require('express');
const router = express.Router();
const UserModel = require('../models/User');
const bcrypt = require('bcrypt-nodejs');

router.post('/register', (req, res) => {
	// console.log(req.body)
	let email = req.body.email;

	let password = req.body.password;

	if(!email || !password) {
		return res.status(500).json({
			'error' : 'Incomplete credentials'
		})
	}

	UserModel.find({'email' : email})
	.then ((users, err) => {
		// console.log{users}
		if (err) {
			return res.status(500).json({
				'error' : 'an error occured'
			})
			// console.log('walang nag match')
		}

		if (users.length > 0) {
			return res.status(500).json({
				'error' : 'User already exists'
			})
		}

		// bycrypt the password
		bcrypt.genSalt(10, function(err, salt) {
			// console.log(salt);
			// password = unhased password
			//salt = salted string with numb of round of saling applied
			bcrypt.hash(password, salt, null, function(err, hash) {
				// console.log(hash)
				let newUser = UserModel({
					'email' : req.body.email,
					'password' : hash
				})
				// console.log(newUser)
				newUser.save(err => {
					if(!err) {
						return res.json({
							'message' : 'User Registered Successfully'
						})
					}
				})
			})
		})
	})

})

module.exports = router;


