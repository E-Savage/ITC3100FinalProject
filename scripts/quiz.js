let correct = [1, 2, 1, 2, 3];

let user_choices = [];

let correct_answers = 0;

function answer(questionNum, userChoice){
    user_choices[questionNum] = userChoice.value;
}

function submitQuiz(){
    correct_answers = 0;
    for(i = 0; i < correct.length; i++){
        if(correct[i]==user_choices[i]){
            correct_answers++;
        }
    }

    document.getElementById("results").innerHTML = correct_answers;
}