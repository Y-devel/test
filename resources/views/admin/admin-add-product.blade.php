<?php
$activeNews = "";
$activeProduct = "active";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<title>IMAI</title>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />

	<link rel="stylesheet" href="/css/style.min.css?_v=20241210155104" />

	<link rel="shortcut icon" href="favicon.ico" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<script>
		document.addEventListener("DOMContentLoaded", () => {
			const preloader = document.getElementById("preloader");
			const wrapper = document.querySelector(".wrapper");
			const firstBlock = document.querySelector(".first-block");

			if (preloader) {

				// Проверяем, загружается ли страница впервые
				const isFirstLoad = !sessionStorage.getItem("visited");

				// Проверяем, открыта ли страница в новой вкладке
				const isNewTab = !window.opener;

				if (isFirstLoad && !isNewTab) {
					sessionStorage.setItem("visited", "true"); // Отмечаем, что пользователь посетил страницу
				} else {
					// Скрываем preloader, если это не первое посещение или страница открыта в новой вкладке
					preloader.style.display = "none";
					wrapper.style.display = "flex";
					return;
				}

				// Функция для проверки загрузки первого блока и всех его ресурсов
				const checkFirstBlockLoaded = () => {
					if (firstBlock.complete) {
						preloader.style.display = "none";
						wrapper.style.display = "flex";
					} else {
						setTimeout(checkFirstBlockLoaded, 100); // Проверяем каждые 100 мс
					}
				};

				// Добавляем обработчик события load для первого блока
				firstBlock.addEventListener("load", checkFirstBlockLoaded);
				// Проверяем, загружен ли первый блок уже сейчас
				checkFirstBlockLoaded();
			}


		});

		// Убираем preloader при переходе по ссылкам
		window.addEventListener("beforeunload", () => {
			sessionStorage.setItem("visited", "true"); // Указываем, что страница уже посещалась
		});
	</script>

</head>


<body>


	<div class="wrapper">
		@include('admin.admin-header')
		<main class="mainpage admin-mainpage">
			<div class="mainpage__admin-container">
				<div class="mainpage-admin-inner">
					@include('admin.admin-product-edit')
				</div>
			</div>
		</main>

	</div>

	<div class="popup-admin popup-admin-product">
		<div class="popup-admin__wrap">
			<div class="popup-admin__inner">
				<div class="popup-admin__content">
					<div class="popup-admin__top">
						<div class="popup-admin__title">Отменить все действия? </div>
						<div class="popup-admin__subtitle">Все введенные данные будут утеряны</div>
					</div>
					<div class="popup-admin__choice">
						<button type="button" class="popup-admin__btn close-admin-btn">Нет, оставить</button>
						<button type="button" class="popup-admin__btn">Да, отменить</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://unpkg.com/preload-it"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

	<script defer src="/js/script.js"></script>


</body>


</html>