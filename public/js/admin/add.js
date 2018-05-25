function confirmDelete() {
	var result = confirm('Are you sure you want to delete?');
	if (result) {
		return true;
	} else {
		return false;
	}
}
