function sendMessage() {
    const userInput = document.getElementById('user-input').value;
    if (userInput.trim() === '') return;

    // Create user message
    const userMessageDiv = document.createElement('div');
    userMessageDiv.className = 'message user-message';
    userMessageDiv.innerHTML = `<p>${userInput}</p>`;
    document.getElementById('chat-window').appendChild(userMessageDiv);

    // Clear user input
    document.getElementById('user-input').value = '';

    // Simulate bot response
    setTimeout(() => {
        const botMessageDiv = document.createElement('div');
        botMessageDiv.className = 'message bot-message';
        botMessageDiv.innerHTML = `<p>I'm here to help!</p>`;
        document.getElementById('chat-window').appendChild(botMessageDiv);

        // Scroll to the bottom of chat window
        document.getElementById('chat-window').scrollTop = document.getElementById('chat-window').scrollHeight;
    }, 1000);
}

function openSettings() {
    alert('Settings functionality to be implemented.');
}

function openHistory() {
    alert('History functionality to be implemented.');
}

function openRecentChats() {
    alert('Recent Chats functionality to be implemented.');
}

function startNewChat() {
    const chatWindow = document.getElementById('chat-window');
    chatWindow.innerHTML = ''; // Clear the chat window
    const welcomeMessage = document.createElement('div');
    welcomeMessage.className = 'message bot-message';
    welcomeMessage.innerHTML = `<p>Welcome to ChatGPT! How can I help you today?</p>`;
    chatWindow.appendChild(welcomeMessage);
}

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('collapsed');
}

function openAuthModal() {
    document.getElementById('auth-modal').style.display = 'block';
}

function closeAuthModal() {
    document.getElementById('auth-modal').style.display = 'none';
}

function showRegisterForm() {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('register-form').style.display = 'block';
}

function showLoginForm() {
    document.getElementById('login-form').style.display = 'block';
    document.getElementById('register-form').style.display = 'none';
}

async function register() {
    const username = document.getElementById('register-username').value;
    const password = document.getElementById('register-password').value;

    const response = await fetch('http://localhost:5000/register', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ username, password }),
    });

    if (response.ok) {
        alert('Registration successful! Please log in.');
        showLoginForm();
    } else {
        alert('Registration failed.');
    }
}

async function login() {
    const username = document.getElementById('login-username').value;
    const password = document.getElementById('login-password').value;

    const response = await fetch('http://localhost:5000/login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ username, password }),
    });

    if (response.ok) {
        const data = await response.json();
        localStorage.setItem('token', data.token);
        alert('Login successful!');
        closeAuthModal();
        // Load user-specific data here
    } else {
        alert('Login failed.');
    }
}


