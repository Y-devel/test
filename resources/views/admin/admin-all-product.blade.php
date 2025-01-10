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
					<form action="" class="admin-all-product">
						<h2 class="admin-top-title">Все продукты</h2>
						<div data-spollers-admin data-one-spoller-admin class="spollers-admin">
							@foreach ($categories as $category)
								<div class="spollers-admin__items" data-categories-id="{{$category->id}}">
									<button type="button" data-spoller-admin class="spollers-admin__title">
										<span>{{$category->name}}</span>
										<div class="spollers-admin__box">
											<a href="{{route("add-product", ["type" => $category->id])}}"
												class="spollers-admin__link">Добавить
												<span>+</span></a>
											<div class="spollers-admin__arrows admin-icon">
												<svg width="28" height="28" viewBox="0 0 28 28" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<circle cx="14" cy="14" r="14" fill="#D92F30" />
													<path class="one" d="M8 14H20" stroke="white" stroke-width="2"
														stroke-linecap="round" />
													<path class="two" d="M14 8L14 20" stroke="white" stroke-width="2"
														stroke-linecap="round" />
												</svg>
											</div>
										</div>
									</button>
									<div class="spollers-admin__body">
										<div class="spollers-admin__content">
											@if(count($category->products) > 0)
												@foreach ($category->products as $product)
													<div class="spollers-admin__item">
														<div class="spollers-admin__info">
															<span class="admin-icon">
																<svg width="20" height="8" viewBox="0 0 20 8" fill="none"
																	xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.5" width="20" height="2" rx="1"
																		fill="#838B8B" />
																	<rect opacity="0.5" y="6" width="20" height="2" rx="1"
																		fill="#838B8B" />
																</svg>
															</span>
															<div class="spollers-admin__label">
																{{$product->name}}
															</div>
														</div>
														<div class="actions-box-wrap">
															<a href="/product-add/{{$product->id}}" class="actions-box-wrap__edit">
																<p>Редактировать</p>
																<span class="admin-icon">
																	<svg width="17" height="16" viewBox="0 0 17 16" fill="none"
																		xmlns="http://www.w3.org/2000/svg">
																		<path fill-rule="evenodd" clip-rule="evenodd"
																			d="M0.94157 14.2808H16.1329C16.6013 14.2808 16.9817 14.6653 16.9817 15.1404C16.9817 15.6148 16.6013 16 16.1329 16H0.94157C0.473182 16 0.0927734 15.6148 0.0927734 15.1404C0.0927734 14.6661 0.473182 14.2808 0.94157 14.2808ZM15.403 4.63476L9.40847 10.7393C8.75355 11.4067 8.02287 11.8356 7.12753 12.079L4.66662 12.7464C4.02635 12.9254 3.44882 12.3355 3.61744 11.6979L4.28133 9.18752C4.51756 8.29575 4.94603 7.54011 5.59117 6.88667L11.607 0.794413C12.6529 -0.264804 14.3546 -0.264804 15.4021 0.794413C16.4456 1.85281 16.4456 3.57044 15.4021 4.63459L15.403 4.63476Z"
																			fill="#838B8B" />
																	</svg>
																</span>
															</a>
															<button data-product-id="{{ $product->id }}" type="button"
																class="actions-box-wrap__remove open-admin-btn">
																<p>Удалить</p>
																<span class="admin-icon">
																	<svg width="14" height="16" viewBox="0 0 14 16" fill="none"
																		xmlns="http://www.w3.org/2000/svg">
																		<path
																			d="M4.30382 16H10.678C11.832 16 12.7659 15.0641 12.7659 13.9121V5.44995H2.21583V13.9121C2.21583 15.0632 3.14987 16 4.30382 16Z"
																			fill="white" />
																		<path
																			d="M14 3.30738C14 2.89958 13.6694 2.56904 13.2616 2.56904L10.0373 2.56807V0.921222C10.0373 0.412706 9.62466 0 9.11612 0H5.86654C5.35803 0 4.94532 0.412681 4.94532 0.921222V2.56807H1.72003C1.31223 2.56807 0.981689 2.89861 0.981689 3.3064V4.57089H14L14 3.30738Z"
																			fill="white" />
																	</svg>
																</span>
															</button>
														</div>
													</div>
												@endforeach
											@else
												<div class="spollers-admin__item">
													<span class="no-added">Ничего не добавлено</span>
												</div>
											@endif
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</form>
				</div>
			</div>
		</main>

	</div>

	<div id="product-id-delete" class="popup-admin popup-admin-product">
		<div class="popup-admin__wrap">
			<form action="{{ route('delete-products')}}" method="post">
				@csrf
				<input hidden autocomplete="off" id="input-form-product-delete-id" type="string" name="id">
				<div class="popup-admin__inner">
					<div class="popup-admin__content">
						<div class="popup-admin__top">
							<div class="popup-admin__title">Удалить этот станок?</div>
							<div class="popup-admin__subtitle">Подтвердите действие</div>
						</div>
						<div class="popup-admin__choice">
							<button type="button" class="popup-admin__btn close-admin-btn">Отмена</button>
							<button type="submit" class="popup-admin__btn">Да, удалить</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://unpkg.com/preload-it"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

	<script defer src="js/script.js"></script>
</body>

</html>