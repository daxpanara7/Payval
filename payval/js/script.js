let currentQuestion = 0;

function showQuestion() {
    const questionElement = document.getElementById("question");
    const optionsElement = document.getElementById("options");

    questionElement.textContent = questions[currentQuestion].question;

    optionsElement.innerHTML = "";
    questions[currentQuestion].options.forEach((option, index) => {
        const optionElement = document.createElement("div");
        optionElement.className = "option";
        optionElement.innerHTML = `<input type="radio" name="answer" value="${index}">${option}`;
        optionsElement.appendChild(optionElement);
    });

    updateButtons();
}

function updateButtons() {
    const prevButton = document.getElementById("prev-button");
    const nextButton = document.getElementById("next-button");
    const skipButton = document.getElementById("skip-button");

    prevButton.disabled = currentQuestion === 0;
    nextButton.disabled = currentQuestion === questions.length - 1;
    skipButton.disabled = false;
}

function goToQuestion(questionIndex) {
    currentQuestion = questionIndex;
    showQuestion();
}

function goToPreviousQuestion() {
    if (currentQuestion > 0) {
        currentQuestion--;
        showQuestion();
    }
}

function goToNextQuestion() {
    if (currentQuestion < questions.length - 1) {
        currentQuestion++;
        showQuestion();
    }
}

function goToNextUnansweredQuestion() {
    let nextUnansweredIndex = currentQuestion + 1;
    while (nextUnansweredIndex < questions.length && questions[nextUnansweredIndex].selectedOption !== undefined) {
        nextUnansweredIndex++;
    }
    if (nextUnansweredIndex < questions.length) {
        currentQuestion = nextUnansweredIndex;
        showQuestion();
    }
}

function submitquestoin() {
    
    }
}



window.onload = function() {
    showQuestion();

    const prevButton = document.getElementById("prev-button");
    const nextButton = document.getElementById("next-button");
    const skipButton = document.getElementById("skip-button");
    const submitButton = document.getElementById("submit-button");

    prevButton.addEventListener("click", goToPreviousQuestion);
    nextButton.addEventListener("click", goToNextQuestion);
    skipButton.addEventListener("click", goToNextUnansweredQuestion);
    submitButton.addEventListener("click", );

};

