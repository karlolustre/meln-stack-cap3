//toggle navbar to reflect different options depending on logged in user
function checkUser() {
			let isAdmin = localStorage.getItem('isAdmin');
			if(isAdmin == "true") {
				document.getElementById("navBar").innerHTML = `
					<a class="navbar-brand" href="/admin">MELN Admin</a>
				    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span>
				    </button>
				    <div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="navbar-nav">
					        <li class="nav-item">
						        <a class="nav-link" href="/admin">Availabilities</a>
					        </li>
					        <li class="nav-item">
					            <a class="nav-link" href="/admin/transactions">Transactions</a>
					        </li>
					        <li class="nav-item">
					            <a class="nav-link" href="#" id="logout">Logout</a>
					        </li>    
					    </ul>
				    </div>
				`
			} else if(isAdmin == "false") {
				document.getElementById("navBar").innerHTML = `
					<a class="navbar-brand" href="/">MELN</a>
				    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span>
				    </button>
				    <div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="navbar-nav">
					        <li class="nav-item">
						        <a class="nav-link" href="/">Catalogue</a>
					        </li>
					        <li class="nav-item">
						        <a class="nav-link" href="/transactions/${localStorage.getItem('userId')}">My Transactions</a>
					        </li>
					        <li class="nav-item">
					            <a class="nav-link" href="#" id="logout">Logout</a>
					        </li>    
					    </ul>
				    </div>
				`
			} else {
				document.getElementById("navBar").innerHTML = `
					<a class="navbar-brand" href="/">MELN</a>
				    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span>
				    </button>
				    <div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="navbar-nav">
					        <li class="nav-item">
						        <a class="nav-link" href="/">Catalogue</a>
					        </li>
					        <li class="nav-item">
					            <a class="nav-link" href="/users/login">Login</a>
					        </li>    
					    </ul>
				    </div>
				`
			}
		};

checkUser();

function logout() {

	fetch('http://localhost:3000/auth/logout', {
            method: "GET",
            headers: {
                "Authorization" : "Bearer " + localStorage.getItem('token')
            }
        })
		.then(function(response) {
            return response.json();
        })
        .then(function(data) {
            localStorage.clear();
            window.location.replace("/");
        })
        .catch(function(err) {
            console.log(err);
        });
};

//if logout button exists, assign an onclick event for logging out
let logoutButton = document.getElementById("logout");
if(logoutButton) {
	logoutButton.addEventListener("click", logout);
}

