document.addEventListener("DOMContentLoaded", () => {
  const messagesDiv = document.getElementById("messages");
  const inputField = document.getElementById("userInput");

  let awaitingOption = false;
  appendMessage("bot", "👋 Hi, How can I help you?");

  function sendMessage() {
    const userMessage = inputField.value.trim();
    if (!userMessage) return;

    appendMessage("user", userMessage);
    inputField.value = "";

    if (awaitingOption) {
      handleOption(userMessage.toLowerCase());
    } else {
      showMainMenu();
      awaitingOption = true;
    }
  }

  function appendMessage(sender, text) {
    const msg = document.createElement("div");
    msg.classList.add("message", sender);
    msg.innerHTML = text;
    messagesDiv.appendChild(msg);
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
  }

  function showMainMenu() {
    const menuText = `Hello! Welcome to Raj Business Hub<br><br>
      What would you like to know about?<br>
      1️⃣ Raj Business Hub<br>
      2️⃣ Corporate Training<br>
      3️⃣ Consulting<br>
      4️⃣ Software Products<br>
      5️⃣ Inquiry Form<br><br>
      Please enter either the serial number or the name of the services.`;
    appendMessage("bot", menuText);
  }

  function handleOption(input) {
    input = input.toLowerCase();
    let response = null;

    if (
      ["1", "raj", "raj biz hub", "Raj Business Hub", "hub"].includes(input)
    ) {
      response = `🏢 Raj Business Hub is a dynamic platform for IT consulting, corporate training, and custom software products.<br>👉 Visit: <a href='raj-business-hub.html' target='_blank'>/Raj Business Hub</a><br><br>Type <b>menu</b> to go back to the main options.`;
    } else if (input === "2" || input.includes("training")) {
      response = `✅ We provide corporate training in modern technologies for teams and professionals.<br>👉 Visit: <a href='training.html' target='_blank'>/corporate-training</a><br><br>Type <b>menu</b> to go back to the main options.`;
    } else if (input === "3" || input.includes("consulting")) {
      response = `✅ We offer IT consulting to streamline operations and help you adopt the right technologies.<br>👉 Visit: <a href='consult.html' target='_blank'>/consulting</a><br><br>Type <b>menu</b> to go back to the main options.`;
    } else if (input === "4" || input.includes("software")) {
      response = `✅ We build custom software products tailored to your business needs.<br>👉 Visit: <a href='/software_products.html' target='_blank'>/software-products</a><br><br>Type <b>menu</b> to go back to the main options.`;
    } else if (input === "contact") {
      response = `📞 For more information, contact us here:<br>👉 <a href='contact_us.html' target='_blank'>Contact Us</a><br><br>Type <b>menu</b> to go back to the main options.`;
    } else if (
      ["contect", "form", "5", "feedback", "inquiry"].includes(input)
    ) {
      const response = `
        📝 Please fill out this form:<br><br>
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfNDFk0x0AQnFgI1LO4yFoLveP4aj1ZsN-u4q_5If3g1MoxkA/viewform?embedded=true" width="260" height="821" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
        <br><br>Type <b>menu</b> to go back.`;
      appendMessage("bot", response);
    } else if (["menu", "hi", "hello"].includes(input)) {
      showMainMenu();
      awaitingOption = true;
      return;
    } else {
      response =
        "❗ Please type 1, 2, 3, 4 or one of the topics: Raj Business Hub, Corporate Training, Consulting, or Software Products.";
    }

    if (response) {
      appendMessage("bot", response);
    }
  }

  window.sendMessage = sendMessage;
});
