// Keyboard navigation enhancements
document.addEventListener('DOMContentLoaded', function() {
    // Add focus trap for modals
    const modals = document.querySelectorAll('[role="dialog"]');
    
    modals.forEach(modal => {
        const focusableElements = modal.querySelectorAll(
            'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
        );
        
        if (focusableElements.length > 0) {
            const firstElement = focusableElements[0];
            const lastElement = focusableElements[focusableElements.length - 1];
            
            modal.addEventListener('keydown', function(e) {
                if (e.key === 'Tab') {
                    if (e.shiftKey && document.activeElement === firstElement) {
                        e.preventDefault();
                        lastElement.focus();
                    } else if (!e.shiftKey && document.activeElement === lastElement) {
                        e.preventDefault();
                        firstElement.focus();
                    }
                }
                
                if (e.key === 'Escape') {
                    // Close modal logic here
                    modal.classList.add('hidden');
                }
            });
        }
    });
});