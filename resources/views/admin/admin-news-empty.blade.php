<?php
$activeNews = "active";
$activeProduct = "";
?>

<head>
	<title>IMAI</title>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />

	<link rel="stylesheet" href="css/style.min.css?_v=20241210155104" />

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
					<form action="" class="admin-wrap-news">
						<div class="admin-wrap-news-top">
							<h2 class="admin-top-title">Все новости</h2>
							<a href="/news-add" class="admin-btn">
								<p>Добавить новость +</p>
							</a>
						</div>
						@if($news->count() > 0)
						<div class="admin-news-list">
						@foreach ($news as $item)
							<div class="admin-news-items">
								<div class="admin-news-block">
									<div class="admin-news__img">
										<div class="admin-news__pictures">
											<picture><source data-srcset="{{ $item->img_path}}" srcset="img/1x1.webp" type="image/webp"><img  src="{{ asset($item->img_path)}}" data-src="{{ asset($item->img_path)}}" alt="pictures"></picture>
										</div>
									</div>
									<div class="admin-news__info">
										<div class="admin-news__title">{{ $item->name }}</div>
										<div class="admin-news__value">{{ $item->created_at->toDateString()}}</div>
									</div>
								</div>
								<div class="actions-box-wrap">
									<a href="/news-add/{{$item->id}}" class="actions-box-wrap__edit">
										<p>Редактировать</p>
										<span class="admin-icon">
											<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M0.94157 14.2808H16.1329C16.6013 14.2808 16.9817 14.6653 16.9817 15.1404C16.9817 15.6148 16.6013 16 16.1329 16H0.94157C0.473182 16 0.0927734 15.6148 0.0927734 15.1404C0.0927734 14.6661 0.473182 14.2808 0.94157 14.2808ZM15.403 4.63476L9.40847 10.7393C8.75355 11.4067 8.02287 11.8356 7.12753 12.079L4.66662 12.7464C4.02635 12.9254 3.44882 12.3355 3.61744 11.6979L4.28133 9.18752C4.51756 8.29575 4.94603 7.54011 5.59117 6.88667L11.607 0.794413C12.6529 -0.264804 14.3546 -0.264804 15.4021 0.794413C16.4456 1.85281 16.4456 3.57044 15.4021 4.63459L15.403 4.63476Z" fill="#838B8B" />
											</svg>
										</span>
									</a>
									<button type="button" data-news-id = "{{ $item->id }}" class="actions-box-wrap__remove open-admin-btn">
										<p>Удалить</p>
										<span class="admin-icon">
											<svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M4.30382 16H10.678C11.832 16 12.7659 15.0641 12.7659 13.9121V5.44995H2.21583V13.9121C2.21583 15.0632 3.14987 16 4.30382 16Z" fill="white" />
												<path d="M14 3.30738C14 2.89958 13.6694 2.56904 13.2616 2.56904L10.0373 2.56807V0.921222C10.0373 0.412706 9.62466 0 9.11612 0H5.86654C5.35803 0 4.94532 0.412681 4.94532 0.921222V2.56807H1.72003C1.31223 2.56807 0.981689 2.89861 0.981689 3.3064V4.57089H14L14 3.30738Z" fill="white" />
											</svg>
										</span>
									</button>
								</div>
							</div>
							@endforeach
						</div>
						@else
							<div class="block-empty">
								<div class="admin-icon icon-empty">
									<svg width="60" height="60" viewBox="0 0 60 60" fill="none"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M12.5067 0C5.62667 0 0 5.61384 0 12.4962V47.4842C0 54.3666 5.62667 60 12.5067 60H47.4884C54.3685 60 60 54.3665 60 47.4842V12.4962C60 5.61393 54.3685 0 47.4884 0H12.5067ZM45.648 11.7344C46.3376 11.7345 46.9995 12.0095 47.4884 12.4962C48.5108 13.5163 48.5108 15.1727 47.4884 16.1927L16.1826 47.5087C15.1629 48.5315 13.5069 48.5315 12.4872 47.5087C11.4749 46.4905 11.4749 44.85 12.4872 43.8316L43.8125 12.4962C44.3018 12.0095 44.9583 11.7344 45.648 11.7344Z"
											fill="#C7C7C7" />
									</svg>
								</div>
								<p>Пока нет новостей</p>
							</div>
						@endif
					</form>
				</div>
			</div>
		</main>

	</div>

	<div id = "news-id-delete" class="popup-admin popup-admin-product">
		<form action="{{ route('delete-news')}}" method="post">
		<input hidden autocomplete="off" id ="input-form-news-delete-id" type="string" name="id">
		@csrf
		<div class="popup-admin__wrap">
			<div class="popup-admin__inner">
				<div class="popup-admin__content">
					<div class="popup-admin__top">
						<div class="popup-admin__title">Удалить эту новость?</div>
						<div class="popup-admin__subtitle">Подтвердите действие</div>
					</div>
					<div class="popup-admin__choice">
						<button type="button" class="popup-admin__btn close-admin-btn">Отмена</button>
						
						<button type="submit" class="popup-admin__btn">Да, удалить</button>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
	<script src="https://unpkg.com/preload-it"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

	<script defer src="js/script.js"></script>


</body>


</html>