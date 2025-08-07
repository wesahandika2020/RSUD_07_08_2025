<script>
	if (typeof BaseClass !== 'function') {
		window.BaseClass = class {
			constructor() {
				this.date = new Date();
			}

			ajaxGet(url, data = {}) {
				return $.get(url, data)
			}

			ajaxPost(url, data) {
				return $.post(url, data)
			}
		}
	}
</script>
