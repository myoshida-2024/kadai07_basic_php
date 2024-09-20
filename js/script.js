// Get HTML elements
const startScreen = document.getElementById('start-screen');
const newScreen = document.getElementById('new-screen');
const showScreen = document.getElementById('show-screen');
const newButton = document.getElementById('new-button');
const showButton = document.getElementById('show-button');
const initialMessage = document.getElementById('initial-message');


// New button event listener
newButton.addEventListener('click', () => {
    startScreen.style.display = 'none';
    newScreen.style.display = 'block';
    newScreen.style.animation = 'slide-up 1s forwards';
    
    setTimeout(() => {
        initialMessage.style.display = 'none';
        
});
})

// Show button event listener
showButton.addEventListener('click', () => {
    startScreen.style.display = 'none';
    showScreen.style.display = 'block';
    showScreen.style.animation = 'slide-up 1s forwards';
    
    setTimeout(() => {
        initialMessage.style.display = 'none';
        
});
})




// ESC key event listener for reset
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        resetGame();
    }
});

const resetGame = () => {
    startScreen.style.display = 'flex';
    gameScreen.style.display = 'none';
    result.style.display = 'none';
    initialMessage.style.display = 'block';
    jankenMessage.style.display = 'none';
};
