<script>
		// Listen for clicks in the document
		document.addEventListener('click', function (event) {

			// Check if a password selector was clicked
			var selector = event.target.getAttribute('data-show-pw');
			if (!selector) return;

			// Get the passwords
			var passwords = document.querySelectorAll(selector);

			// Toggle visibility
			Array.from(passwords).forEach(function (password) {
				if (event.target.checked === true) {
					password.type = 'text';
				} else {
					password.type = 'password';
				}
			});
		}, false);
	    </script>
    </body>
</html>