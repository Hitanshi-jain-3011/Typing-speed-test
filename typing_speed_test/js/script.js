let paragraph = "";
const paragraphs = [

"Learning web development requires consistent practice with HTML CSS JavaScript PHP and MySQL.",

"Artificial Intelligence is transforming the future by helping computers learn from data and make smart decisions.",

"Typing every day for fifteen minutes can greatly improve your speed accuracy and confidence.",

"Programming is not about memorizing code but understanding logic and solving problems.",

"Practice makes a person perfect and every mistake teaches an important lesson.",

"Technology is growing rapidly and developers must keep learning new skills every day.",

"Success comes from hard work dedication patience and continuous improvement.",

"Web developers create responsive websites using HTML CSS JavaScript PHP and databases.",

"Consistency is more important than perfection because small improvements create big results.",

"Never stop learning because knowledge is the most valuable investment in your career."

];
function loadParagraph() {

    let random = Math.floor(Math.random() * paragraphs.length);

    paragraph = paragraphs[random];

    document.getElementById("paragraph").innerText = paragraph;

}
window.onload = function () {

    loadParagraph();

}
const input = document.getElementById("input");

const timeDisplay = document.getElementById("time");
const wpmDisplay = document.getElementById("wpm");
const accuracyDisplay = document.getElementById("accuracy");
const mistakesDisplay = document.getElementById("mistakes");
const charactersDisplay = document.getElementById("characters");

const restartBtn = document.getElementById("restart");

let timeLeft = 30;
let timerStarted = false;
let timer;
let mistakes = 0;

input.addEventListener("input", function () {

    if (!timerStarted) {
        timerStarted = true;
        startTimer();
    }

    let typedText = input.value;

    let correctCharacters = 0;
    mistakes = 0;

    for (let i = 0; i < typedText.length; i++) {

        if (typedText[i] === paragraph[i]) {
            correctCharacters++;
        } else {
            mistakes++;
        }

    }

    charactersDisplay.innerText = typedText.length;

    mistakesDisplay.innerText = mistakes;

    let accuracy = 100;

    if (typedText.length > 0) {

        accuracy = ((correctCharacters / typedText.length) * 100).toFixed(2);

    }

    accuracyDisplay.innerText = accuracy + "%";

    let words = typedText.trim().split(/\s+/).length;

    if (typedText.trim() === "") {
        words = 0;
    }

    let elapsedMinutes = (60 - timeLeft) / 60;

    let wpm = 0;

    if (elapsedMinutes > 0) {

        wpm = Math.round(words / elapsedMinutes);

    }

    wpmDisplay.innerText = wpm;

});

function startTimer() {

    timer = setInterval(function () {

        timeLeft--;

        timeDisplay.innerText = timeLeft;

        if (timeLeft <= 0) {

            clearInterval(timer);

            input.disabled = true;

            saveResult();

            alert("Test Completed!");

        }

    }, 1000);

}

restartBtn.addEventListener("click", function () {

    clearInterval(timer);

    timeLeft = 30;

    timerStarted = false;

    mistakes = 0;

    input.disabled = false;
    loadParagraph();

    input.value = "";

    timeDisplay.innerText = 30;

    wpmDisplay.innerText = 0;

    accuracyDisplay.innerText = "100%";

    mistakesDisplay.innerText = 0;

    charactersDisplay.innerText = 0;

});

function saveResult() {

    const formData = new FormData();

    formData.append("wpm", wpmDisplay.innerText);
    formData.append("accuracy", accuracyDisplay.innerText.replace("%",""));
    formData.append("mistakes", mistakesDisplay.innerText);
    formData.append("test_time", 30);

    fetch("save_result.php", {

        method: "POST",

        body: formData

    })
    .then(response => response.text())
    .then(data => {

        console.log(data);

    });

}