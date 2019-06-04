//include express framework
const express = require('express');

// include the Router used in the express framework
const router = express.Router();

// require the dev model
const DevModel = require('../models/Dev');

router.get('/', (req, res) => {
	res.send({type : 'GET'});
})


//create a new dev
router.post('/create', (req, res) => {
	console.log(req.body);
	// res.send({type : 'POST'})
	
	DevModel.create(req.body)
	.then(dev => {
		res.send(dev)
	}).catch(next)

	// res.send({
	// 	type : "POST",
	// 	name : req.body.name,
	// 	portfolio : req.body.portfolio,
	// 	hired : req.body.hired,
	// 	batch : req.body.batch
	// })
})


//delete a dev
//localhost:3000/devs/:id
router.delete('/:id', (req, res, next) => {
	// res.send({type : 'DELETE'})

	DevModel.deleteOne({_id : req.params.id })
	.then(dev => {
		res.send(dev)
	}).catch(next)
})

router.put('/:id', (req, res) => {
	res.send({type : 'PUT'})
})


module.exports = router;


