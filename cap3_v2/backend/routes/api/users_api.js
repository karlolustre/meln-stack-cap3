// include the express framework
const express = require('express');
const router = express.Router();
// const mongoose = require('mongoose');
const bcrypt = require('bcryptjs');

const User = require('../../models/User');


router.post('/signup', (req, res, next) => {
	User.findOne({ email: req.body.email })
	.exec()
	.then(user => {
		if(user) {
			return res.status(409).json({
				message: 'User Exists'
			});
		} else {
			bcrypt.hash(req.body.password, 10, (err, hash) => {
			if(err) {
				return res.status(500).json({
					error:err
				});
			} else {
				const user = new User({
					email: req.body.email,
					password: hash
				});
				user.save()
				.then(result => {
					console.log(result);
					res.status(201).json({
						message: 'User Created'
					})
				})
				.catch(err => {
					console.log(err);
					res.status(500).json({
						error:err
					})
				});		
				}
			});

		}
	})
	
});




module.exports = router;