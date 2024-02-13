
let score = 0;

function startSpawning() {
  intervalId = setInterval(spawnBubble, 1000);
}

function stopSpawning() {
  clearInterval(intervalId); 
}

function spawnBubble() {
  const container = document.getElementById('container');
  const bubble = document.createElement('div');
  bubble.classList.add('bubble');
  bubble.style.top = Math.random() * 370 + 'px'; 
  bubble.style.left = Math.random() * 370 + 'px'; 
  
  bubble.addEventListener('click', function() {
    container.removeChild(bubble); 
    updateScore();
  });

  container.appendChild(bubble);
}

function updateScore() {
  score++;
  document.getElementById('score').textContent = 'Score: ' + score;
}