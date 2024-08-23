 const typingForm = document.querySelector(".typing-form");
 const chatList = document.querySelector(".chat-list");
 const toogleThemeButton = document.querySelector("#toggle-theme-button");
 const suggestions = document.querySelectorAll(".suggestion-list .suggestion");
 let userMessage = null;

//API configuration
const API_KEY = "AIzaSyCMm6QgMtR-pEg8xiTCNTeEVkOI5Ldw4-U";
 const API_URL = `https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=${API_KEY}`;

 const loadLocalstorageData = () => {
    document.body.classList.add("hide-header")
 }

 const createMessageElement = (content, ...classes) => {
    const div = document.createElement("div");
    div.classList.add("message", ...classes);
    div.innerHTML = content;
    return div;
 }

 const showTypingEfffect = (text, textElement) => {
    const words = text.split (' ');
    let currentWordIndex = 0;

    const typingInterval = setInterval(() => {
        //Append each word to the text element with a space
        textElement.innerHTML +=(currentWordIndex === 0 ? '' : ' ') + words[currentWordIndex++]; 

        //if all words are displayed
        if(currentWordIndex === words.length){
            clearInterval(typingInterval);
        }
    }, 75);
 }


 //Fetch response from the API based on user massage
 const generateAPIResponse = async (incomingMessageDiv) => {
    const textElement = incomingMessageDiv.querySelector(".text");//get text element

    //Send a POST request to the API with the user's message
    try {
        const response = await fetch(API_URL, {
            method: "post",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({
                contents:[{
                    role: "user",
                    parts: [{text: userMessage}]
                }]
            })
        });
        const data = await response.json();
        //get the API response text
        const apiResponse = data?.candidates[0].content.parts[0].text;
       showTypingEfffect(apiResponse, textElement);
    } catch (error) {
        console.log(error);
    } finally{
        incomingMessageDiv.classList.remove("loading");
    }
}

 // show a loading animation while waiting for api response

 const showloadingAnimation = () => {
    const html = `<div class="message-content">
                <img src="images/gemini.svg"  alt="User image" class="avatar">
                <p class="text"></p>
                <div class="loading-indicator">
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                    <div class="loading-bar"></div>
                </div>
            </div>
            <span onclick= "copyMessage(this)" class="icon material-symbols-outlined">
                content_copy
                </span>`;

    const incomingMessageDiv = createMessageElement(html, "incoming", "loading");

    chatList.appendChild(incomingMessageDiv);

    generateAPIResponse(incomingMessageDiv);
 }

 //copy message text to the clipboard
 const copyMessage = (copyIcon) =>{
    const messageText = copyIcon.parentElement.querySelector(".text").innerText;

    navigator.clipboard.writeText(messageText);
    copyIcon.innerHTML ="done" //show tick icon
    setTimeout(() => copyIcon.innerText ="content_copy", 1000); // revert icon after 1 second
 }

const handleOutgoingChat = () => {
    userMessage = typingForm.querySelector(".typing-input").value.trim() || userMessage;
    if(!userMessage) return; // Exit if there is no message

    const html = ` <div class="message-content">
                <img src="images/user.jpg"  alt="User image" class="avatar">
                <p class="text"></p>
            </div>
        </div>`;

    const outgoingMessageDiv = createMessageElement(html, "outgoing");
    outgoingMessageDiv.querySelector(".text").innerHTML = userMessage;

    chatList.appendChild(outgoingMessageDiv);

    typingForm.reset();
    document.body.classList.add("hide-header")//hide the header once chat start
    setTimeout(showloadingAnimation,500);
}

//set usermessage and handle outgoing chat when a suggestion is clicked
suggestions.forEach(suggestion => {
    suggestion.addEventListener("click" ,() => {
        userMessage = suggestion.querySelector(".text").innerText;
        handleOutgoingChat();
    })
})

//toggle between light and dark theme
toogleThemeButton.addEventListener("click", () => {
    const isLightMode = document.body.classList.toggle("light_mode");
    localStorage.setItem("themeColor", isLightMode ? "light_mode " : "dark_mode")
    toogleThemeButton.innerHTML = isLightMode ? "dark_mode": "light_mode";
})

// prevent default form submission and handle outgoing that
 typingForm.addEventListener("submit",(e) =>{
    e.preventDefault();

    handleOutgoingChat();
 });

 