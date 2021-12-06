var quiz_content = [
	{
		number1: {
			question: "1. What do you do for fun?",
			choiceA: "Exercise",
			choiceB: "Nap :P",
			choiceC: "Spend time with friends"
		}
	},
	{
		number2: {
			question: "2. What's your dream vacation?",
			choiceA: " Somewhere with hiking trails",
			choiceB: "A relaxing day at a spa resort",
			choiceC: "Paris"
		}
	},
	{
		number3: {
			question: "3. What's your favorite way to celebrate holidays?",
			choiceA: "Hanging decorations in festive outfits",
			choiceB: "Watching a festive movie at home",
			choiceC: "With my loved ones"
		}
	},
	{
		number4: {
			question: "4. What's your favorite sport?",
			choiceA: "Football",
			choiceB: "Golf",
			choiceC: "Figure skating"
		}
	},
	{
		number5: {
			question: "5. What's your favorite holiday?",
			choiceA: "New Year's Eve",
			choiceB: "Christmas",
			choiceC: "Valentine's Day"
		}
	},
	{
		number6: {
			question: "6. Which zodiac sign do you like the most?",
			choiceA: "Aries (Ambitious, brave, adventurous)",
			choiceB: "Virgo (Quiet, intelligent, practical)",
			choiceC: "Pisces (Sensitive, friendly, imaginative)"
		}
	},
	{
		number7: {
			question: "7. Do you want a pet that likes to cuddle a lot?",
			choiceA: "No",
			choiceB: "Sometimes, but not a lot",
			choiceC: "Duh!"
		}
	}
] // quiz_content

function generate_quiz() {
	document.getElementById('question1').innerHTML = quiz_content[0].number1.question;
	document.getElementById('question1-A').innerHTML = quiz_content[0].number1.choiceA;
	document.getElementById('question1-B').innerHTML = quiz_content[0].number1.choiceB;
	document.getElementById('question1-C').innerHTML = quiz_content[0].number1.choiceC;

	document.getElementById('question2').innerHTML = quiz_content[1].number2.question;
	document.getElementById('question2-A').innerHTML = quiz_content[1].number2.choiceA;
	document.getElementById('question2-B').innerHTML = quiz_content[1].number2.choiceB;
	document.getElementById('question2-C').innerHTML = quiz_content[1].number2.choiceC;

	document.getElementById('question3').innerHTML = quiz_content[2].number3.question;
	document.getElementById('question3-A').innerHTML = quiz_content[2].number3.choiceA;
	document.getElementById('question3-B').innerHTML = quiz_content[2].number3.choiceB;
	document.getElementById('question3-C').innerHTML = quiz_content[2].number3.choiceC;

	document.getElementById('question4').innerHTML = quiz_content[3].number4.question;
	document.getElementById('question4-A').innerHTML = quiz_content[3].number4.choiceA;
	document.getElementById('question4-B').innerHTML = quiz_content[3].number4.choiceB;
	document.getElementById('question4-C').innerHTML = quiz_content[3].number4.choiceC;

	document.getElementById('question5').innerHTML = quiz_content[4].number5.question;
	document.getElementById('question5-A').innerHTML = quiz_content[4].number5.choiceA;
	document.getElementById('question5-B').innerHTML = quiz_content[4].number5.choiceB;
	document.getElementById('question5-C').innerHTML = quiz_content[4].number5.choiceC;

	document.getElementById('question6').innerHTML = quiz_content[5].number6.question;
	document.getElementById('question6-A').innerHTML = quiz_content[5].number6.choiceA;
	document.getElementById('question6-B').innerHTML = quiz_content[5].number6.choiceB;
	document.getElementById('question6-C').innerHTML = quiz_content[5].number6.choiceC;

	document.getElementById('question7').innerHTML = quiz_content[6].number7.question;
	document.getElementById('question7-A').innerHTML = quiz_content[6].number7.choiceA;
	document.getElementById('question7-B').innerHTML = quiz_content[6].number7.choiceB;
	document.getElementById('question7-C').innerHTML = quiz_content[6].number7.choiceC;
}

function get_answers() {
	var calm_counter = 0;
	var energetic_counter = 0;
	var affectionate_counter = 0;
	var unanswered = false;

	if (document.getElementById('1A').checked) {
		energetic_counter++;
	} else if (document.getElementById('1B').checked) {
		calm_counter++;
	} else if (document.getElementById('1C').checked) {
		affectionate_counter++;
	} else {
		unanswered = true;
	}
	if (document.getElementById('2A').checked) {
		energetic_counter++;
	} else if (document.getElementById('2B').checked) {
		calm_counter++;
	} else if (document.getElementById('2C').checked) {
		affectionate_counter++;
	} else {
		unanswered = true;
	}

	if (document.getElementById('3A').checked) {
		energetic_counter++;
	} else if (document.getElementById('3B').checked) {
		calm_counter++;
	} else if (document.getElementById('3C').checked) {
		affectionate_counter++;
	} else {
		unanswered = true;
	}

	if (document.getElementById('4A').checked) {
		energetic_counter++;
	} else if (document.getElementById('4B').checked) {
		calm_counter++;
	} else if (document.getElementById('4C').checked) {
		affectionate_counter++;
	} else {
		unanswered = true;
	}

	if (document.getElementById('5A').checked) {
		energetic_counter++;
	} else if (document.getElementById('5B').checked) {
		calm_counter++;
	} else if (document.getElementById('5C').checked) {
		affectionate_counter++;
	} else {
		unanswered = true;
	}

	if (document.getElementById('6A').checked) {
		energetic_counter++;
	} else if (document.getElementById('6B').checked) {
		calm_counter++;
	} else if (document.getElementById('6C').checked) {
		affectionate_counter++;
	} else {
		unanswered = true;
	}

	if (document.getElementById('7A').checked) {
		energetic_counter++;
	} else if (document.getElementById('7B').checked) {
		calm_counter++;
	} else if (document.getElementById('7C').checked) {
		affectionate_counter++;
	} else {
		unanswered = true;
	}
	if (!unanswered) {
		compare_scores(energetic_counter, calm_counter, affectionate_counter);
	} else {
		alert("Hey! Please go back and make sure all questions are answered before submitting.");
		document.getElementById('result').innerHTML = "Answer all 7 questions to get your result.";
	}
} // get_answers()

function sort_nums(a, b) {
	return a - b;
} // sort_nums()

function compare_scores(calm, energetic, affectionate) {
	var results = [calm, energetic, affectionate];
	var message;
	results.sort(sort_nums);
	if (results[0] == results[2]) {
		console.log("Something is wrong");
	} else if (results[1] == results[2]) {
		switch (results[1]) {
			case calm:
				switch (results[2]) {
					case energetic:
						message = "You have two ideal pet types: calm and energetic";
					// console.log("You have two ideal pet types: calm and energetic");
					case affectionate:
						message = "You have two ideal pet types: calm and affectionate";
					// console.log("You have two ideal pet types: calm and affectionate");
					default:
						break;
				} // switch
			case energetic:
				switch (results[2]) {
					case calm:
						message = "You have two ideal pet types: energetic and calm";
					// console.log("You have two ideal pet types: energetic and calm");
					case affectionate:
						message = "You have two ideal pet types: energetic and affectionate";
					// console.log("You have two ideal pet types: energetic and affectionate");
					default:
						break;
				} // switch
			case affectionate:
				switch (results[2]) {
					case calm:
						message = "You have two ideal pet types: affectionate and calm";
					// console.log("You have two ideal pet types: affectionate and calm");
					case energetic:
						message = "You have two ideal pet types: affectionate and energetic";
					// console.log("You have two ideal pet types: affectionate and energetic");
					default:
						break;
				} // switch
			default:
				break;
		} //switch
	} else {
		switch (results[2]) {
			case calm:
				message = "Your ideal pet type is: calm";
				// console.log("Your ideal pet type is: calm");
				break;
			case energetic:
				message = "Your ideal pet type is: energetic";
				// console.log("Your ideal pet type is: energetic");
				break;
			case affectionate:
				message = "Your ideal pet type is: affectionate";
				// console.log("Your ideal pet type is: affectionate");
				break;
			default:
				break;
		} // switch
		document.getElementById('result').innerHTML = message;
		return;
	} // if
} // compare_scores()

document.addEventListener('DOMContentLoaded', init, false);
function init(){
  function message () {
    alert("Hello!");
  }
  document.querySelector('#submit').addEventListener('click', get_answers)
};
