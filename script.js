document.getElementById('email').addEventListener('input', function() {
    const continueBtn = document.getElementById('continue-btn');
    if (this.value.length > 0) {
        continueBtn.disabled = false;
        continueBtn.style.backgroundColor = '#6f2da8';
        continueBtn.style.cursor = 'pointer';
    } else {
        continueBtn.disabled = true;
        continueBtn.style.backgroundColor = '#ccc';
        continueBtn.style.cursor = 'not-allowed';
    }
});
