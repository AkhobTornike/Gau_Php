// Roulette wheel animation
function spinWheel() {
    const wheel = document.querySelector('.roulette-wheel img');
    const duration = 3000 + Math.random() * 2000; // 3-5 seconds
    const rotations = 5 + Math.random() * 5; // 5-10 rotations
    
    wheel.style.transition = `transform ${duration}ms cubic-bezier(0.17, 0.67, 0.21, 0.99)`;
    wheel.style.transform = `rotate(${rotations * 360}deg)`;
    
    setTimeout(() => {
        wheel.style.transition = 'none';
        const resetRotation = rotations * 360 % 360;
        wheel.style.transform = `rotate(${resetRotation}deg)`;
        
        // Force reflow
        void wheel.offsetWidth;
        
        // Remove the inline style to allow future animations
        wheel.style.transition = '';
    }, duration);
}

// Event listeners
document.addEventListener('DOMContentLoaded', function() {
    // Spin button functionality
    const spinBtn = document.getElementById('spin-btn');
    if (spinBtn) {
        spinBtn.addEventListener('click', spinWheel);
    }
    
    // Bet amount quick select
    const amountInput = document.querySelector('input[name="amount"]');
    if (amountInput) {
        const quickAmounts = document.querySelectorAll('.quick-amount');
        quickAmounts.forEach(btn => {
            btn.addEventListener('click', function() {
                amountInput.value = this.dataset.amount;
            });
        });
    }
});