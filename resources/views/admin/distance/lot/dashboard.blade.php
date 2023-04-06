<!DOCTYPE html>
<html dir="rtl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<title>withdraw</title>
</head>

<body background="{{ asset('winner-bg.gif') }}">

	<div class="h4-container">

		<h6>
			المسابقة الرمضانية 1444هـ
		</h6>
		<h6>
			السحب الإلكتروني (الأسبوع الأول)
		</h6>
	</div>

	<div class="hflex">
		<h1 id="firstWinner">00000000 </h1>
		<h1 id="">المركز الأول</h1>
		<span class="span show-hide-span"></span>
	</div>
	<div class="hflex">
		<h1 id="secondWinner">00000000</h1>
		<h1 id="">المركز الثاني</h1>
		<span class="span show-hide-span"></span>
	</div>
	<div class="hflex">
		<h1 id="thirdWinner">00000000</h1>
		<h1 id="">المركز الثالث</h1>
		<span class="span show-hide-span"></span>
	</div>
	<div class="hflex">
		<h1 id="fourthWinner">00000000</h1>
		<h1 id="">المركز الرابع</h1>
		<span class="span show-hide-span"></span>
	</div>
	<div class="hflex">
		<h1 id="fifthWinner">00000000</h1>
		<h1 id="">المركز الخامس</h1>
		<span class="span show-hide-span"></span>
	</div>
	<div class="hflex">
		<h1 id="sixthWinner">00000000 </h1>
		<h1 id="">المركز السادس</h1>
		<span class="span show-hide-span"></span>
	</div>
	<div class="hflex">
		<h1 id="seventhWinner">00000000</h1>
		<h1 id="">المركز السابع</h1>
		<span class="span show-hide-span"></span>
	</div>
	<div class="hflex">
		<h1 id="eighthWinner">00000000</h1>
		<h1 id="">المركز الثامن</h1>
		<span class="span show-hide-span"></span>
	</div>
	<div class="hflex">
		<h1 id="ninethWinner">00000000</h1>
		<h1 id="">المركز التاسع</h1>
		<span class="span show-hide-span"></span>
	</div>
	<div class="hflex">
		<h1 id="tenthWinner">00000000</h1>
		<h1 id="">المركز العاشر</h1>
		<span class="span show-hide-span"></span>
	</div>
	<div class="note">
		يتم إخفاء جزء من الرقم
	</div>

	<pre id="showWinners" onclick="selectText('showWinners')" class="showWinnersContainer"></pre>

	<div class="btn-container">
		<button onclick="hideNumbers()">
			إخفاء
		</button>
		<button onclick="showNumbers()">
			إظهار
		</button>
		<button onclick="withdraw()">
			سحب
		</button>
		<button onclick="showWinners()">
			عرض الفائزين
		</button>
	</div>

	<script>
		function showWinners() {
			var winners = document.getElementsByClassName('hflex');

			var phones = '';

			for (let index = 0; index < winners.length; index++) {
				const element = winners[index];
				phones = phones + element.firstElementChild.innerHTML + "\n"
			}


			var showWinnersContainer = document.getElementById('showWinners');

			showWinnersContainer.style.display = 'block';

			showWinnersContainer.innerHTML = phones;

		}

		function showNumbers() {
			var element = document.querySelectorAll(".show-hide-span");
			element.forEach(e => e.classList.remove("span"))
		}

		function hideNumbers() {
			var element = document.querySelectorAll(".show-hide-span");
			element.forEach(e => e.classList.add("span"))
		}

		function getRandomNumber(min, max) {
			max = max + 1;
			return Math.floor(Math.random() * (max - min) + min)
		}


		$(document).ready(function() {

			var phoneNumbers = removeElementsFromArray('{{ $correctAnswers }}', '{{ $prevWinners }}');

			withdraw = function() {
				var min = 0;

				var max = phoneNumbers.length;

				var loop = 300;

				var timeOut = null;


				function countDown() {

					timeOut = setTimeout(countDown, 20);

					loop--;

					if (loop == 0) {
						clearTimeout(timeOut);
					}

					$('#firstWinner').text(phoneNumbers[getRandomNumber(min, max)])
					$('#secondWinner').text(phoneNumbers[getRandomNumber(min, max)])
					$('#thirdWinner').text(phoneNumbers[getRandomNumber(min, max)])
					$('#fourthWinner').text(phoneNumbers[getRandomNumber(min, max)])
					$('#fifthWinner').text(phoneNumbers[getRandomNumber(min, max)])
					$('#sixthWinner').text(phoneNumbers[getRandomNumber(min, max)])
					$('#seventhWinner').text(phoneNumbers[getRandomNumber(min, max)])
					$('#eighthWinner').text(phoneNumbers[getRandomNumber(min, max)])
					$('#ninethWinner').text(phoneNumbers[getRandomNumber(min, max)])
					$('#tenthWinner').text(phoneNumbers[getRandomNumber(min, max)])
				}
				countDown()

			}
		})
	</script>


	<script>

		function selectText(containerid) {
			if (document.selection) { // IE
				var range = document.body.createTextRange();
				range.moveToElementText(document.getElementById(containerid));
				range.select();
			} else if (window.getSelection) {
				var range = document.createRange();
				range.selectNode(document.getElementById(containerid));
				window.getSelection().removeAllRanges();
				window.getSelection().addRange(range);
			}
		}

		var removeElementsFromArray = (baseArray, elements) => {

			var baseArray = JSON.parse(baseArray);

			var elements = JSON.parse(elements);

			var tempArray = [];

			baseArray.filter((el, i) => {
				if (!elements.includes(el)) {
					tempArray.push(el)
				}
			})

			return tempArray;
		}
	</script>

</body>

</html>