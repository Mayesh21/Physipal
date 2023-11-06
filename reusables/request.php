<!-- Just an includable file. That exports a javascript function to make API Requests. -->
<!-- Since native JavaScript/HTML does not support import/export. -->

<script type="text/javascript">
	async function requester(url, method, data, callback = () => {}) {
		try {
			let response = await fetch(url, {
				method: method || "get",
				mode: 'cors',
				cache: 'no-cache',
				credentials: 'same-origin',
				headers: {
					'Content-Type': 'application/json'
				},
				referrerPolicy: 'no-referrer',
				body: data ? JSON.stringify(data) : undefined
			});

			let responseData = await response.json();

			if (callback && typeof callback === 'function')
				return callback(null, responseData);
			else return responseData;
		} catch (err) {
			console.log(err);
			if (callback && typeof callback === 'function')
				return callback(err.message, null);
			else return null;
		}
	}
</script>
<script> src="../scripts/pass.js"</script>
<script> src="../scripts/custom.js"</script>