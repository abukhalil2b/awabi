<!DOCTYPE html>
<html dir="rtl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('js/numbers.js') }}"></script>
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
	</div>
	
	<script>
		

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


		$(document).ready(function () {

			withdraw = function () {
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
</body>

</html>