const express = require('express');
const router = express.Router();


const ContactModel = require('../models/Contact');

//Create contact
router.post('/create', (req, res,) => {
	// console.log(req.body)
	ContactModel.create(req.body)
	.then(contact => {
		console.log('Contact message created successfully')
		res.send(contact)
	})
})

router.get('/message', (req, res) => {
	ContactModel.find({}, (err, contact) => {
		if (!err) {
			return res.json({
				'data' : {
					'contact' : contact
				}
			})
		} else {
			console.log(err)
		}
	})
})


module.exports = router;