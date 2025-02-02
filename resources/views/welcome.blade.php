<?php 
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<title>IMAI</title>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />

	<link rel="stylesheet" href="css/style.css" />

	<link rel="shortcut icon" href="favicon.ico" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<script>
		document.addEventListener("DOMContentLoaded", () => {
			const preloader = document.getElementById("preloader");
			const wrapper = document.querySelector(".wrapper");
			const firstBlock = document.querySelector(".first-block");

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
		});

		// Убираем preloader при переходе по ссылкам
		window.addEventListener("beforeunload", () => {
			sessionStorage.setItem("visited", "true"); // Указываем, что страница уже посещалась
		});
	</script>

</head>


<body>
	<div id="preloader"></div>
	<div class="wrapper" style="display: none;">
		<header class="header">
			<div data-scroll="60" data-scroll-show class="header-block">
				<div class="header-block__wrap">
					<a href="index.html" class="logo">
						<div class="logo__pictures">
							<img src="img/icons/logo.svg?_v=1733252911292" alt="pictures">
						</div>
					</a>
					<button class="header-block-search icon">
						<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M22.6425 20.9421L18.7098 16.9474C18.7098 16.9474 18.5907 16.9474 18.5907 16.8263C19.9016 15.0105 20.7358 12.8316 20.7358 10.5316C20.7358 4.72105 16.0881 0 10.3679 0C4.64767 0 0 4.72105 0 10.5316C0 16.3421 4.64767 21.0632 10.3679 21.0632C12.8705 21.0632 15.2539 20.0947 17.0415 18.6421L20.9741 22.6368C21.2124 22.8789 21.57 23 21.8083 23C22.0466 23 22.4041 22.8789 22.6425 22.6368C23.1192 22.1526 23.1192 21.4263 22.6425 20.9421ZM10.3679 18.6421C5.95855 18.6421 2.38342 15.0105 2.38342 10.5316C2.38342 6.05263 5.95855 2.42105 10.3679 2.42105C14.7772 2.42105 18.3523 6.05263 18.3523 10.5316C18.3523 15.0105 14.7772 18.6421 10.3679 18.6421Z" fill="#C7C7C7" />
						</svg>
					</button>
					<button class="burger">
						<div class="burger-item">
							<span></span><span></span><span></span><span></span>
						</div>
						<div class="burger-item">
							<span></span><span></span><span></span><span></span>
						</div>
					</button>
				</div>
			</div>
			<div class="header__inner">
				<div class="sidebar">
					<a href="index.html" class="logo">
						<div class="logo__pictures">
							<img src="img/icons/logo.svg?_v=1733252911292" alt="pictures">
						</div>
					</a>
					<div class="sidebar__list">
						<div class="sidebar__item sidebar__item--page sidebar-item-home active">
							<a href="index.html" class="sidebar__title sidebar__title--page">Главная</a>
						</div>
						<div class="sidebar__item sidebar__item--catalog">
							<div class="sidebar__title sidebar__title--catalog">Каталог <span></span></div>
							<div class="sidebar__body">
								<div class="sidebar__content">
									<a href="catalog-saws.html" class="sidebar__title sidebar__title--item">Пильные центры с ЧПУ</a>
									<a href="catalog-edging.html" class="sidebar__title sidebar__title--item">Кромкооблицовочные станки</a>
									<a href="catalog-drilling.html" class="sidebar__title sidebar__title--item">Сверлильно-присадочные станки с ЧПУ</a>
									<a href="catalog-nesting.html" class="sidebar__title sidebar__title--item">Нестинг</a>
									<a href="catalog-pristanochnaya.html" class="sidebar__title sidebar__title--item">Пристаночная автоматизация и механизация</a>
									<a href="catalog-packaging.html" class="sidebar__title sidebar__title--item">Упаковка</a>
									<a href="catalog-aspiration.html" class="sidebar__title sidebar__title--item">Центральная аспирация</a>
									<a href="catalog-finishing.html" class="sidebar__title sidebar__title--item">Отделка</a>
								</div>
							</div>
						</div>
						<div class="sidebar__item sidebar__item--page">
							<a href="about.html" class="sidebar__title sidebar__title--page">О нас</a>
						</div>
						<div class="sidebar__item sidebar__item--page">
							<a href="news.html" class="sidebar__title sidebar__title--page">Новости</a>
						</div>
						<div class="sidebar__item sidebar__item--page">
							<a href="service.html" class="sidebar__title sidebar__title--page">Сервис</a>
						</div>
						<div class="sidebar__item sidebar__item--page">
							<a href="engineering.html" class="sidebar__title sidebar__title--page">Инжиниринг</a>
						</div>
						<div class="sidebar__item sidebar__item--page">
							<a href="contact.html" class="sidebar__title sidebar__title--page">Контакты</a>
						</div>
					</div>
				</div>
				<div class="header-panel">
					<div class="header-panel__row">
						<a href="tel:+74951010230" class="header-panel__phone">
							<span class="icon">
								<svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5.76757 16.2511C5.78595 16.2818 5.81352 16.3124 5.84415 16.3369C5.91767 16.389 5.98813 16.4441 6.06165 16.4962C6.13211 16.5544 6.20256 16.6126 6.27608 16.6677C6.30672 16.6922 6.34041 16.7106 6.37717 16.7229C9.29041 18.7968 11.8299 19.8996 13.9344 20.0007C13.9957 20.0037 14.057 20.0037 14.1152 20.0037C15.316 20.0037 16.4678 19.4309 17.2275 18.4475L18.1741 17.2222C18.6367 16.6249 18.5264 15.761 17.926 15.2984L15.0679 13.0898C14.7768 12.8661 14.4184 12.7681 14.0539 12.8141C13.6894 12.86 13.3677 13.0469 13.1441 13.3348L12.2098 14.5448C12.2006 14.5571 12.1853 14.5816 12.1791 14.5939C12.1761 14.6 12.075 14.7838 11.7748 14.8389C11.3857 14.9124 10.4667 14.8114 8.6563 13.2828L8.50007 13.1602C6.57629 11.8032 6.24545 10.9393 6.21788 10.5441C6.19644 10.2409 6.34654 10.0969 6.34654 10.0969C6.36492 10.0816 6.38024 10.0662 6.39249 10.0479L7.32681 8.83785C7.78937 8.2405 7.67909 7.37664 7.07868 6.91407L4.17157 4.66864C3.57422 4.20608 2.71036 4.31636 2.24779 4.91677L1.30122 6.14211C0.532324 7.13769 0.296448 8.52232 0.682429 9.75991C1.31654 11.7756 3.02588 13.9567 5.76757 16.2511Z" fill="#838B8B" />
									<path d="M9.29401 5.64144C12.4125 5.24015 15.2736 7.45188 15.6719 10.5704C15.7209 10.9563 16.0517 11.2382 16.4316 11.2382C16.4653 11.2382 16.4959 11.2351 16.5296 11.232C16.9493 11.1769 17.2464 10.794 17.1913 10.3743C16.6828 6.41953 13.0527 3.61351 9.09796 4.12203C8.67828 4.17717 8.38113 4.56009 8.43628 4.97976C8.49142 5.39944 8.87433 5.69658 9.29401 5.64144Z" fill="#838B8B" />
									<path d="M16.9207 2.35823C14.5344 0.514105 11.5721 -0.291553 8.58233 0.0944275C8.16265 0.149568 7.86551 0.532485 7.92065 0.952162C7.97579 1.37184 8.35871 1.66898 8.77838 1.61384C11.3638 1.283 13.9248 1.97838 15.9864 3.57132C18.048 5.16425 19.3683 7.46788 19.6992 10.0533C19.7482 10.4393 20.079 10.7211 20.4589 10.7211C20.4926 10.7211 20.5232 10.7181 20.5569 10.715C20.9766 10.6599 21.2737 10.277 21.2186 9.85729C20.8326 6.86441 19.3071 4.20236 16.9207 2.35823Z" fill="#838B8B" />
								</svg>
							</span>
							<p>+7 (495) 101-02-30</p>
						</a>
						<div class="social">
							<a href="https://t.me/opttorgservis" target="_blank" class="social__item">
								<span class="icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11.944 3.26667e-05C8.77112 0.0148396 5.73324 1.28566 3.4949 3.53449C1.25656 5.78332 -3.4549e-05 8.82711 7.12435e-10 12C7.12441e-10 15.1826 1.26428 18.2349 3.51472 20.4853C5.76516 22.7357 8.8174 24 12 24C15.1826 24 18.2348 22.7357 20.4853 20.4853C22.7357 18.2349 24 15.1826 24 12C24 8.81743 22.7357 5.76519 20.4853 3.51475C18.2348 1.26431 15.1826 3.26667e-05 12 3.26667e-05C11.9813 -1.08889e-05 11.9627 -1.08889e-05 11.944 3.26667e-05ZM16.906 7.22403C17.006 7.22203 17.227 7.24703 17.371 7.36403C17.4667 7.44713 17.5277 7.56311 17.542 7.68903C17.558 7.78203 17.578 7.99503 17.562 8.16103C17.382 10.059 16.6 14.663 16.202 16.788C16.034 17.688 15.703 17.989 15.382 18.018C14.686 18.083 14.157 17.558 13.482 17.116C12.426 16.423 11.829 15.992 10.804 15.316C9.619 14.536 10.387 14.106 11.062 13.406C11.239 13.222 14.309 10.429 14.369 10.176C14.376 10.144 14.383 10.026 14.313 9.96403C14.243 9.90203 14.139 9.92303 14.064 9.94003C13.958 9.96403 12.271 11.08 9.003 13.285C8.523 13.615 8.09 13.775 7.701 13.765C7.273 13.757 6.449 13.524 5.836 13.325C5.084 13.08 4.487 12.951 4.539 12.536C4.566 12.32 4.864 12.099 5.432 11.873C8.93 10.349 11.262 9.34403 12.43 8.85903C15.762 7.47303 16.455 7.23203 16.906 7.22403Z" fill="#838B8B" />
									</svg>
								</span>
							</a>
							<a href="https://wa.me/+79164277026" target="_blank" class="social__item">
								<span class="icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M16.628 0.900838C18.079 1.49957 19.3962 2.37896 20.5033 3.48803C21.6159 4.5907 22.4979 5.90199 23.0981 7.34605C23.6982 8.79011 24.0048 10.3383 23.9999 11.901C23.9969 18.459 18.6354 23.794 12.0502 23.794H12.0452C10.0501 23.7937 8.08697 23.2959 6.33507 22.346L0 24L1.69605 17.837C0.650084 16.034 0.100476 13.988 0.100476 11.892C0.10349 5.33502 5.46393 4.09774e-05 12.0502 4.09774e-05C13.621 -0.00407623 15.177 0.302104 16.628 0.900838ZM17.3912 14.1189C17.0961 13.986 15.6445 13.3457 15.3742 13.2565C15.103 13.1682 14.9063 13.1245 14.7086 13.3902C14.5128 13.6551 13.9465 14.2518 13.7746 14.4284C13.6027 14.6059 13.4298 14.6273 13.1348 14.4953C13.0855 14.473 13.018 14.4466 12.9344 14.4139C12.5171 14.251 11.6997 13.9317 10.7601 13.1798C9.88283 12.477 9.28968 11.6092 9.11779 11.3434C8.94591 11.0785 9.09991 10.9349 9.24695 10.8029C9.33667 10.723 9.43993 10.6102 9.54274 10.498C9.59249 10.4437 9.64213 10.3895 9.69008 10.3391C9.81473 10.2085 9.86894 10.1094 9.94228 9.97544C9.95603 9.9503 9.97047 9.92393 9.98616 9.89589C10.0845 9.7193 10.0358 9.565 9.96132 9.43211C9.91008 9.34073 9.615 8.69518 9.35586 8.12827C9.23816 7.87077 9.12787 7.6295 9.05122 7.46375C8.83937 7.00876 8.62521 7.00936 8.45359 7.00983C8.43042 7.00989 8.40804 7.00996 8.38653 7.00889C8.21465 7.00176 8.01792 6.99998 7.8202 6.99998C7.62348 6.99998 7.30355 7.06598 7.0333 7.33175C7.01598 7.34873 6.99663 7.36726 6.97559 7.38741C6.66836 7.68158 6 8.32154 6 9.54271C6 10.8312 7.03328 12.077 7.1996 12.2776L7.20519 12.2843C7.2151 12.2961 7.23303 12.3192 7.25874 12.3522C7.61693 12.8126 9.48603 15.2152 12.2495 16.2862C12.9539 16.5591 13.5034 16.7223 13.9326 16.8436C14.64 17.046 15.2838 17.0175 15.7915 16.9488C16.3589 16.873 17.5382 16.3076 17.7846 15.6886C18.031 15.0696 18.031 14.539 17.9565 14.4284C17.8972 14.3392 17.7584 14.279 17.5515 14.1893C17.5019 14.1678 17.4484 14.1446 17.3912 14.1189Z" fill="#838B8B" />
									</svg>
								</span>
							</a>
							<a target="_blank" class="social__item social__item--vk">
								<span class="icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M9.489 0.003L10.218 0H13.782L14.512 0.003L15.426 0.013L15.859 0.02L16.277 0.031L16.68 0.045L17.068 0.061L17.442 0.082L17.802 0.107L18.147 0.137L18.48 0.17C20.22 0.366 21.413 0.786 22.313 1.686C23.213 2.586 23.633 3.778 23.829 5.519L23.863 5.852L23.892 6.198L23.917 6.558L23.937 6.931L23.962 7.519L23.974 7.929L23.987 8.573L23.996 9.488L24 10.468L23.999 13.781L23.996 14.511L23.986 15.425L23.979 15.858L23.968 16.276L23.954 16.679L23.938 17.067L23.917 17.441L23.892 17.801L23.862 18.146L23.829 18.479C23.633 20.219 23.213 21.412 22.313 22.312C21.413 23.212 20.221 23.632 18.48 23.828L18.147 23.862L17.801 23.891L17.441 23.916L17.068 23.936L16.48 23.961L16.07 23.973L15.426 23.986L14.511 23.995L13.531 23.999L10.218 23.998L9.488 23.995L8.574 23.985L8.141 23.978L7.723 23.967L7.32 23.953L6.932 23.937L6.558 23.916L6.198 23.891L5.853 23.861L5.52 23.828C3.78 23.632 2.587 23.212 1.687 22.312C0.787 21.412 0.367 20.22 0.171 18.479L0.137 18.146L0.108 17.8L0.083 17.44L0.063 17.067L0.038 16.479L0.026 16.069L0.013 15.425L0.004 14.51L0 13.53L0.001 10.217L0.004 9.487L0.014 8.573L0.021 8.14L0.032 7.722L0.046 7.319L0.062 6.931L0.083 6.557L0.108 6.197L0.138 5.852L0.171 5.519C0.367 3.779 0.787 2.586 1.687 1.686C2.587 0.786 3.779 0.366 5.52 0.17L5.853 0.136L6.199 0.107L6.559 0.082L6.932 0.062L7.52 0.037L7.93 0.025L8.574 0.012L9.489 0.003ZM6.79 7.299H4.05C4.18 13.539 7.3 17.289 12.77 17.289H13.08V13.719C15.09 13.919 16.61 15.389 17.22 17.289H20.06C19.28 14.449 17.23 12.879 15.95 12.279C17.23 11.539 19.03 9.739 19.46 7.299H16.88C16.32 9.279 14.66 11.079 13.08 11.249V7.299H10.5V14.219C8.9 13.819 6.88 11.879 6.79 7.299Z" fill="#838B8B" />
									</svg>
								</span>
								<div class="info-after">
									<span class="icon">
										<svg width="12" height="17" viewBox="0 0 12 17" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M2.18181 16.5C1.60316 16.5 1.04821 16.2701 0.639038 15.8609C0.229869 15.4518 0 14.8968 0 14.3182V13.207C1.32897e-06 12.8766 0.0750527 12.5505 0.21949 12.2533C0.363928 11.9561 0.573979 11.6956 0.833793 11.4914L3.91314 9.07186C3.99975 9.00381 4.06977 8.91697 4.11792 8.81791C4.16607 8.71885 4.19109 8.61014 4.19109 8.5C4.19109 8.38986 4.16607 8.28115 4.11792 8.18209C4.06977 8.08303 3.99975 7.99619 3.91314 7.92814L0.833452 5.50852C0.573744 5.30447 0.363778 5.04409 0.219399 4.74704C0.0750193 4.44999 -7.89151e-07 4.12403 0 3.79375V2.68181C0 2.10316 0.229869 1.54821 0.639038 1.13904C1.04821 0.729869 1.60316 0.5 2.18181 0.5H9.46855C10.0472 0.5 10.6021 0.729869 11.0113 1.13904C11.4205 1.54821 11.6504 2.10316 11.6504 2.68181V3.79378C11.6504 4.12406 11.5753 4.45003 11.431 4.74708C11.2866 5.04413 11.0766 5.3045 10.8169 5.50855L7.73721 7.92818C7.6506 7.99623 7.58058 8.08306 7.53244 8.18212C7.48429 8.28119 7.45927 8.38989 7.45927 8.50003C7.45927 8.61018 7.48429 8.71888 7.53244 8.81795C7.58058 8.91701 7.6506 9.00384 7.73721 9.07189L10.8165 11.4915C11.0764 11.6956 11.2864 11.9561 11.4309 12.2533C11.5753 12.5505 11.6504 12.8766 11.6504 13.207V14.3182C11.6504 14.8968 11.4205 15.4518 11.0113 15.861C10.6021 16.2701 10.0472 16.5 9.46855 16.5L2.18181 16.5Z" fill="#838B8B" />
										</svg>
									</span>
									<p>На стадии разработки</p>
								</div>
							</a>
							<a href="https://www.youtube.com/@opttorgservis1605" target="_blank" class="social__item">
								<span class="icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M23.498 6.641C23.3624 6.13028 23.095 5.66414 22.7226 5.28926C22.3502 4.91439 21.8858 4.64394 21.376 4.505C19.505 4 12 4 12 4C12 4 4.495 4 2.623 4.505C2.11341 4.64419 1.64929 4.91473 1.27708 5.28958C0.904861 5.66443 0.637591 6.13044 0.502 6.641C0 8.525 0 12.455 0 12.455C0 12.455 0 16.385 0.502 18.269C0.637586 18.7797 0.904975 19.2459 1.27739 19.6207C1.64981 19.9956 2.11418 20.2661 2.624 20.405C4.495 20.91 12 20.91 12 20.91C12 20.91 19.505 20.91 21.377 20.405C21.8869 20.2662 22.3513 19.9957 22.7237 19.6208C23.0961 19.246 23.3635 18.7798 23.499 18.269C24 16.385 24 12.455 24 12.455C24 12.455 24 8.525 23.498 6.641ZM9.545 16.023V8.887L15.818 12.455L9.545 16.023Z" fill="#838B8B" />
									</svg>
								</span>
							</a>
						</div>
					</div>
					<button class="open-btn btn-main">
						<p>Оформить заявку</p>
						<span class="icon">
							<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M7.89961 9.18368L0.265804 1.54988C-0.0886005 1.19547 -0.0886016 0.620206 0.265803 0.265802C0.620207 -0.0886019 1.19547 -0.0886002 1.54988 0.265804L9.18368 7.89961L9.18368 0.978358C9.18304 0.476928 9.59009 0.0698736 10.0915 0.0705156C10.593 0.0698736 11 0.476925 10.9994 0.978355L11 10.0768C10.9994 10.0812 10.9994 10.0864 10.9994 10.0915C10.9994 10.3419 10.8979 10.5692 10.7336 10.7336C10.5692 10.8979 10.3419 10.9994 10.0915 10.9994C10.0864 10.9994 10.0812 10.9994 10.0768 11L0.978357 10.9994C0.476927 11 0.0698758 10.5929 0.0705179 10.0915C0.0698758 9.59009 0.476927 9.18304 0.978357 9.18368H7.89961Z" fill="white" />
							</svg>
						</span>
					</button>
				</div>
			</div>
			<form action="" method="get" class="header-search">
				<div class="header-search__wrap">
					<input autocomplete="off" type="search" name="search" data-error="Ошибка" placeholder="Поиск по сайту..." class="search">
					<div class="header-search__buttons">
						<button type="submit" class="header-search__item header-search-submit icon">
							<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M22.6425 20.9421L18.7098 16.9474C18.7098 16.9474 18.5907 16.9474 18.5907 16.8263C19.9016 15.0105 20.7358 12.8316 20.7358 10.5316C20.7358 4.72105 16.0881 0 10.3679 0C4.64767 0 0 4.72105 0 10.5316C0 16.3421 4.64767 21.0632 10.3679 21.0632C12.8705 21.0632 15.2539 20.0947 17.0415 18.6421L20.9741 22.6368C21.2124 22.8789 21.57 23 21.8083 23C22.0466 23 22.4041 22.8789 22.6425 22.6368C23.1192 22.1526 23.1192 21.4263 22.6425 20.9421ZM10.3679 18.6421C5.95855 18.6421 2.38342 15.0105 2.38342 10.5316C2.38342 6.05263 5.95855 2.42105 10.3679 2.42105C14.7772 2.42105 18.3523 6.05263 18.3523 10.5316C18.3523 15.0105 14.7772 18.6421 10.3679 18.6421Z" fill="#C7C7C7" />
							</svg>
						</button>
						<button type="reset" class="header-search__item header-search-reset icon">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
								<path d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5755 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z" fill="white" />
							</svg>
						</button>
					</div>
					<div class="close-search-form"><span></span></div>
				</div>
			</form>
			<div class="overflow-hide"></div>
		</header>


		<main class="mainpage"">
			<div class=" block">
			<section class="section pages-box first-block">
				<video src="files/videoBg.mp4" class="videoPage" autoplay loop muted playsinline preload="auto"></video>
				<div class="pages-box__info">
					<h1 class="pages-box__title">Ваш запрос - Наше решение</h1>
					<p class="pages-box__text text">Наша цель – предложить решения, идеально соответствующие уникальным задачам каждого заказчика. Мы создаем оборудование, которое точно отвечает вашим потребностям, а не пытаемся адаптировать ваши задачи под стандартные предложения. Индивидуальный подход, гибкость и высокое качество – вот принципы, которыми мы руководствуемся, чтобы ваш успех стал нашим общим достижением.</p>
				</div>
				<button class="btn-main pages-box-btn open-btn">
					<p>Оформить заявку</p>
					<span class="icon">
						<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M7.89961 9.18368L0.265804 1.54988C-0.0886005 1.19547 -0.0886016 0.620206 0.265803 0.265802C0.620207 -0.0886019 1.19547 -0.0886002 1.54988 0.265804L9.18368 7.89961L9.18368 0.978358C9.18304 0.476928 9.59009 0.0698736 10.0915 0.0705156C10.593 0.0698736 11 0.476925 10.9994 0.978355L11 10.0768C10.9994 10.0812 10.9994 10.0864 10.9994 10.0915C10.9994 10.3419 10.8979 10.5692 10.7336 10.7336C10.5692 10.8979 10.3419 10.9994 10.0915 10.9994C10.0864 10.9994 10.0812 10.9994 10.0768 11L0.978357 10.9994C0.476927 11 0.0698758 10.5929 0.0705179 10.0915C0.0698758 9.59009 0.476927 9.18304 0.978357 9.18368H7.89961Z" fill="white" />
						</svg>
					</span>
				</button>
				<div class="banner">
					<div class="banner__pictures">
						<picture><source data-srcset="img/pictures/picBanner.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picBanner.jpg?_v=1733252911292" alt="pictures"></picture>
					</div>
				</div>
			</section>
			<section class="section pages-catalog">
				<h2 class="title">Каталог</h2>
				<div class="pages-catalog__wrap">
					<div class="pages-catalog__body">
						<div class="pages-catalog__col active">
							<div class="pages-catalog__item text-con">
								<span>Пильные центры с ЧПУ</span>
								<span class="arrow-catalog"></span>
							</div>
							<div class="pages-catalog__spollers">
								<a href="catalog-saws.html" class="pages-catalog__items">
									<div class="pages-catalog__inner">
										<div class="pages-catalog__img">
											<div class="pages-catalog__pictures">
												<div class="pages-catalog__big-image">
													<picture><source data-srcset="img/pictures/picTab-1.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-1.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
												<div class="pages-catalog__small-image">
													<picture><source data-srcset="img/pictures/picTab-1-1.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-1-1.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
											</div>
										</div>
										<div class="pages-catalog__info">
											<div class="pages-catalog__box">
												<div class="pages-catalog__title">Пильные центры с ЧПУ</div>
												<p class="pages-catalog__text">Какие бы задачи ни стояли перед вами, — изготовление единичных партий, мелкосерийное или крупносерийное производство — наши форматно-раскроечные станки станут для вас идеальным решением в каждом конкретном случае. Наши форматно-раскроечные станки работают быстро, аккуратно и с минимальным количеством отходов.</p>
												<p class="pages-catalog__text">Важнейшими отличительными характеристиками наших систем раскроя являются мощность их агрегатов, экономичность производства, высокая производительность, превосходное качество обработки, возможность автоматизации и (практически полное) отсутствие отходов.</p>
											</div>
											<div class="btn-white">
												<p>Перейти в раздел</p>
												<span class="icon">
													<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M7.89961 9.18368L0.265804 1.54988C-0.0886005 1.19547 -0.0886016 0.620206 0.265803 0.265802C0.620207 -0.0886019 1.19547 -0.0886002 1.54988 0.265804L9.18368 7.89961L9.18368 0.978358C9.18304 0.476928 9.59009 0.0698736 10.0915 0.0705156C10.593 0.0698736 11 0.476925 10.9994 0.978355L11 10.0768C10.9994 10.0812 10.9994 10.0864 10.9994 10.0915C10.9994 10.3419 10.8979 10.5692 10.7336 10.7336C10.5692 10.8979 10.3419 10.9994 10.0915 10.9994C10.0864 10.9994 10.0812 10.9994 10.0768 11L0.978357 10.9994C0.476927 11 0.0698758 10.5929 0.0705179 10.0915C0.0698758 9.59009 0.476927 9.18304 0.978357 9.18368H7.89961Z" fill="white" />
													</svg>
												</span>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="pages-catalog__col">
							<div class="pages-catalog__item text-con">
								<span>Кромкооблицовочные станки</span>
								<span class="arrow-catalog"></span>
							</div>
							<div class="pages-catalog__spollers">
								<a href="catalog-edging.html" class="pages-catalog__items">
									<div class="pages-catalog__inner">
										<div class="pages-catalog__img">
											<div class="pages-catalog__pictures">
												<div class="pages-catalog__big-image">
													<picture><source data-srcset="img/pictures/picTab-2.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-2.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
												<div class="pages-catalog__small-image">
													<picture><source data-srcset="img/pictures/picTab-2-1.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-2-1.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
											</div>
										</div>
										<div class="pages-catalog__info">
											<div class="pages-catalog__box">
												<div class="pages-catalog__title">Кромкооблицовочные станки</div>
												<p class="pages-catalog__text">Автономный станок, круговая установка с системой возврата или несколько станков, объединённых в комплексную линию для изготовления единичных партий или серийного производства, — гибкие станки IMAI, в любом случае, гарантируют профессиональную промышленную обработку кромок.</p>
											</div>
											<div class="btn-white">
												<p>Перейти в раздел</p>
												<span class="icon">
													<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M7.89961 9.18368L0.265804 1.54988C-0.0886005 1.19547 -0.0886016 0.620206 0.265803 0.265802C0.620207 -0.0886019 1.19547 -0.0886002 1.54988 0.265804L9.18368 7.89961L9.18368 0.978358C9.18304 0.476928 9.59009 0.0698736 10.0915 0.0705156C10.593 0.0698736 11 0.476925 10.9994 0.978355L11 10.0768C10.9994 10.0812 10.9994 10.0864 10.9994 10.0915C10.9994 10.3419 10.8979 10.5692 10.7336 10.7336C10.5692 10.8979 10.3419 10.9994 10.0915 10.9994C10.0864 10.9994 10.0812 10.9994 10.0768 11L0.978357 10.9994C0.476927 11 0.0698758 10.5929 0.0705179 10.0915C0.0698758 9.59009 0.476927 9.18304 0.978357 9.18368H7.89961Z" fill="white" />
													</svg>
												</span>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="pages-catalog__col">
							<div class="pages-catalog__item text-con">
								<span>Сверлильно-присадочные станки с ЧПУ</span>
								<span class="arrow-catalog"></span>
							</div>
							<div class="pages-catalog__spollers">
								<a href="catalog-drilling.html" class="pages-catalog__items">
									<div class="pages-catalog__inner">
										<div class="pages-catalog__img">
											<div class="pages-catalog__pictures">
												<div class="pages-catalog__big-image">
													<picture><source data-srcset="img/pictures/picTab-3.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-3.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
												<div class="pages-catalog__small-image">
													<picture><source data-srcset="img/pictures/picTab-3-1.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-3-1.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
											</div>
										</div>
										<div class="pages-catalog__info">
											<div class="pages-catalog__box">
												<div class="pages-catalog__title">Сверлильно-присадочные станки с ЧПУ</div>
												<p class="pages-catalog__text">Сверление и фрезерование в мелкосерийных и крупносерийных партиях без перенастройки, гибкое изменение конфигурации до полностью автоматизированной ячейки, - наши сверлильно-присадочные станки с ЧПУ выполнят задачу с максимальной точностью и производительностью.</p>
											</div>
											<div class="btn-white">
												<p>Перейти в раздел</p>
												<span class="icon">
													<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M7.89961 9.18368L0.265804 1.54988C-0.0886005 1.19547 -0.0886016 0.620206 0.265803 0.265802C0.620207 -0.0886019 1.19547 -0.0886002 1.54988 0.265804L9.18368 7.89961L9.18368 0.978358C9.18304 0.476928 9.59009 0.0698736 10.0915 0.0705156C10.593 0.0698736 11 0.476925 10.9994 0.978355L11 10.0768C10.9994 10.0812 10.9994 10.0864 10.9994 10.0915C10.9994 10.3419 10.8979 10.5692 10.7336 10.7336C10.5692 10.8979 10.3419 10.9994 10.0915 10.9994C10.0864 10.9994 10.0812 10.9994 10.0768 11L0.978357 10.9994C0.476927 11 0.0698758 10.5929 0.0705179 10.0915C0.0698758 9.59009 0.476927 9.18304 0.978357 9.18368H7.89961Z" fill="white" />
													</svg>
												</span>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="pages-catalog__col">
							<div class="pages-catalog__item text-con">
								<span>Нестинг</span>
								<span class="arrow-catalog"></span>
							</div>
							<div class="pages-catalog__spollers">
								<a href="catalog-nesting.html" class="pages-catalog__items">
									<div class="pages-catalog__inner">
										<div class="pages-catalog__img">
											<div class="pages-catalog__pictures">
												<div class="pages-catalog__big-image">
													<picture><source data-srcset="img/pictures/picTab-4.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-4.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
												<div class="pages-catalog__small-image">
													<picture><source data-srcset="img/pictures/picTab-4-1.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-4-1.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
											</div>
										</div>
										<div class="pages-catalog__info">
											<div class="pages-catalog__box">
												<div class="pages-catalog__title">Нестинг</div>
												<p class="pages-catalog__text">Наши станки, работающие по технологии нестинга, помогают снизить отходы при обработке и раскрое плитных материалов. К классическим сферам применения технологии нестинга относится, например, производство корпусов, раскрой и обработка фасадов мебели, производство каркасной мебели, а также обработка современных материалов (например, оргстекла, алюминия, алюкобонда). Различные варианты автоматизации процесса обработки материала обеспечивают высокую экономию времени и повышенную эффективность работы.</p>
											</div>
											<div class="btn-white">
												<p>Перейти в раздел</p>
												<span class="icon">
													<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M7.89961 9.18368L0.265804 1.54988C-0.0886005 1.19547 -0.0886016 0.620206 0.265803 0.265802C0.620207 -0.0886019 1.19547 -0.0886002 1.54988 0.265804L9.18368 7.89961L9.18368 0.978358C9.18304 0.476928 9.59009 0.0698736 10.0915 0.0705156C10.593 0.0698736 11 0.476925 10.9994 0.978355L11 10.0768C10.9994 10.0812 10.9994 10.0864 10.9994 10.0915C10.9994 10.3419 10.8979 10.5692 10.7336 10.7336C10.5692 10.8979 10.3419 10.9994 10.0915 10.9994C10.0864 10.9994 10.0812 10.9994 10.0768 11L0.978357 10.9994C0.476927 11 0.0698758 10.5929 0.0705179 10.0915C0.0698758 9.59009 0.476927 9.18304 0.978357 9.18368H7.89961Z" fill="white" />
													</svg>
												</span>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="pages-catalog__col">
							<div class="pages-catalog__item text-con">
								<span>Пристаночная автоматизация и механизация</span>
								<span class="arrow-catalog"></span>
							</div>
							<div class="pages-catalog__spollers">
								<a href="catalog-pristanochnaya.html" class="pages-catalog__items">
									<div class="pages-catalog__inner">
										<div class="pages-catalog__img">
											<div class="pages-catalog__pictures">
												<div class="pages-catalog__big-image">
													<picture><source data-srcset="img/pictures/picTab-5.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-5.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
												<div class="pages-catalog__small-image">
													<picture><source data-srcset="img/pictures/picTab-5-1.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-5-1.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
											</div>
										</div>
										<div class="pages-catalog__info">
											<div class="pages-catalog__box">
												<div class="pages-catalog__title">Пристаночная автоматизация и механизация</div>
												<p class="pages-catalog__text">Умные склады, сортировщики, системы подачи заготовок, промежуточное хранение, транспортировка и системы возврата заготовок максимально повышают эффективность современного производства.</p>
											</div>
											<div class="btn-white">
												<p>Перейти в раздел</p>
												<span class="icon">
													<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M7.89961 9.18368L0.265804 1.54988C-0.0886005 1.19547 -0.0886016 0.620206 0.265803 0.265802C0.620207 -0.0886019 1.19547 -0.0886002 1.54988 0.265804L9.18368 7.89961L9.18368 0.978358C9.18304 0.476928 9.59009 0.0698736 10.0915 0.0705156C10.593 0.0698736 11 0.476925 10.9994 0.978355L11 10.0768C10.9994 10.0812 10.9994 10.0864 10.9994 10.0915C10.9994 10.3419 10.8979 10.5692 10.7336 10.7336C10.5692 10.8979 10.3419 10.9994 10.0915 10.9994C10.0864 10.9994 10.0812 10.9994 10.0768 11L0.978357 10.9994C0.476927 11 0.0698758 10.5929 0.0705179 10.0915C0.0698758 9.59009 0.476927 9.18304 0.978357 9.18368H7.89961Z" fill="white" />
													</svg>
												</span>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="pages-catalog__col">
							<div class="pages-catalog__item text-con">
								<span>Упаковка</span>
								<span class="arrow-catalog"></span>
							</div>
							<div class="pages-catalog__spollers">
								<a href="catalog-packaging.html" class="pages-catalog__items">
									<div class="pages-catalog__inner">
										<div class="pages-catalog__img">
											<div class="pages-catalog__pictures">
												<div class="pages-catalog__big-image">
													<picture><source data-srcset="img/pictures/picTab-6.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-6.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
												<div class="pages-catalog__small-image">
													<picture><source data-srcset="img/pictures/picTab-6-1.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-6-1.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
											</div>
										</div>
										<div class="pages-catalog__info">
											<div class="pages-catalog__box">
												<div class="pages-catalog__title">Упаковка</div>
												<p class="pages-catalog__text">Оборудование для резки и рилевки картона, линии формирования гофрокоробов и финальной проклейки и упаковки являются неотъемлемой частью каждого успешного производства. Наши решения в сфере упаковки позволяют выполнить любую поставленную задачу.</p>
											</div>
											<div class="btn-white">
												<p>Перейти в раздел</p>
												<span class="icon">
													<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M7.89961 9.18368L0.265804 1.54988C-0.0886005 1.19547 -0.0886016 0.620206 0.265803 0.265802C0.620207 -0.0886019 1.19547 -0.0886002 1.54988 0.265804L9.18368 7.89961L9.18368 0.978358C9.18304 0.476928 9.59009 0.0698736 10.0915 0.0705156C10.593 0.0698736 11 0.476925 10.9994 0.978355L11 10.0768C10.9994 10.0812 10.9994 10.0864 10.9994 10.0915C10.9994 10.3419 10.8979 10.5692 10.7336 10.7336C10.5692 10.8979 10.3419 10.9994 10.0915 10.9994C10.0864 10.9994 10.0812 10.9994 10.0768 11L0.978357 10.9994C0.476927 11 0.0698758 10.5929 0.0705179 10.0915C0.0698758 9.59009 0.476927 9.18304 0.978357 9.18368H7.89961Z" fill="white" />
													</svg>
												</span>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="pages-catalog__col">
							<div class="pages-catalog__item text-con">
								<span>Центральная аспирация</span>
								<span class="arrow-catalog"></span>
							</div>
							<div class="pages-catalog__spollers">
								<a href="catalog-aspiration.html" class="pages-catalog__items">
									<div class="pages-catalog__inner">
										<div class="pages-catalog__img">
											<div class="pages-catalog__pictures">
												<div class="pages-catalog__big-image">
													<picture><source data-srcset="img/pictures/picTab-7.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-7.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
												<div class="pages-catalog__small-image">
													<picture><source data-srcset="img/pictures/picTab-7-1.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-7-1.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
											</div>
										</div>
										<div class="pages-catalog__info">
											<div class="pages-catalog__box">
												<div class="pages-catalog__title">Центральная аспирация</div>
												<p class="pages-catalog__text">Индустриальная центральная аспирация — незаменимое составляющее любого промышленного предприятия, работающего в сфере деревообработки, металлообработки,фармацевтической, бумажной промышленности, производства пластика, строительных материалов, а также, занимающегося утилизацией мусора. Центральная аспирация удаляет многие загрязняющие воздух элементы, такие как: пыль, стружка, дым и вредные газы.</p>
											</div>
											<div class="btn-white">
												<p>Перейти в раздел</p>
												<span class="icon">
													<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M7.89961 9.18368L0.265804 1.54988C-0.0886005 1.19547 -0.0886016 0.620206 0.265803 0.265802C0.620207 -0.0886019 1.19547 -0.0886002 1.54988 0.265804L9.18368 7.89961L9.18368 0.978358C9.18304 0.476928 9.59009 0.0698736 10.0915 0.0705156C10.593 0.0698736 11 0.476925 10.9994 0.978355L11 10.0768C10.9994 10.0812 10.9994 10.0864 10.9994 10.0915C10.9994 10.3419 10.8979 10.5692 10.7336 10.7336C10.5692 10.8979 10.3419 10.9994 10.0915 10.9994C10.0864 10.9994 10.0812 10.9994 10.0768 11L0.978357 10.9994C0.476927 11 0.0698758 10.5929 0.0705179 10.0915C0.0698758 9.59009 0.476927 9.18304 0.978357 9.18368H7.89961Z" fill="white" />
													</svg>
												</span>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="pages-catalog__col">
							<div class="pages-catalog__item text-con">
								<span>Отделка</span>
								<span class="arrow-catalog"></span>
							</div>
							<div class="pages-catalog__spollers">
								<a href="catalog-finishing.html" class="pages-catalog__items">
									<div class="pages-catalog__inner">
										<div class="pages-catalog__img">
											<div class="pages-catalog__pictures">
												<div class="pages-catalog__big-image">
													<picture><source data-srcset="img/pictures/picTab-8.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-8.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
												<div class="pages-catalog__small-image">
													<picture><source data-srcset="img/pictures/picTab-8-1.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/pictures/picTab-8-1.jpg?_v=1733252911292" alt="pictures"></picture>
												</div>
											</div>
										</div>
										<div class="pages-catalog__info">
											<div class="pages-catalog__box">
												<div class="pages-catalog__title">Отделка</div>
												<p class="pages-catalog__text">Оборудование для вакуумного прессования, шлифовки и покраски поможет сделать Вашу мебельную продукцию уникальной. Фасады – это визитная карточка любой мебели! С нашим оборудованием Ваша мебель будет заметно отличаться от конкурентов.</p>
											</div>
											<div class="btn-white">
												<p>Перейти в раздел</p>
												<span class="icon">
													<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M7.89961 9.18368L0.265804 1.54988C-0.0886005 1.19547 -0.0886016 0.620206 0.265803 0.265802C0.620207 -0.0886019 1.19547 -0.0886002 1.54988 0.265804L9.18368 7.89961L9.18368 0.978358C9.18304 0.476928 9.59009 0.0698736 10.0915 0.0705156C10.593 0.0698736 11 0.476925 10.9994 0.978355L11 10.0768C10.9994 10.0812 10.9994 10.0864 10.9994 10.0915C10.9994 10.3419 10.8979 10.5692 10.7336 10.7336C10.5692 10.8979 10.3419 10.9994 10.0915 10.9994C10.0864 10.9994 10.0812 10.9994 10.0768 11L0.978357 10.9994C0.476927 11 0.0698758 10.5929 0.0705179 10.0915C0.0698758 9.59009 0.476927 9.18304 0.978357 9.18368H7.89961Z" fill="white" />
													</svg>
												</span>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="section pages-news">
				<h2 class="title">Новости</h2>
				<div class="news-block">
					<div class="news-block__top">
						<div class="news-block__actions">
							<div class="news-block__inner">
								<div class="arrows">
									<button class="arrows__item arrow-prev news-block-prev icon">
										<svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="35" cy="35" r="34.5" stroke="#D92F30" />
											<path d="M32.375 27.125L40.6875 35.4375L32.375 43.75" stroke="#D92F30" stroke-width="1.5" stroke-linecap="round" />
										</svg>
									</button>
									<button class="arrows__item arrow-next news-block-next icon">
										<svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="35" cy="35" r="34.5" stroke="#D92F30" />
											<path d="M32.375 27.125L40.6875 35.4375L32.375 43.75" stroke="#D92F30" stroke-width="1.5" stroke-linecap="round" />
										</svg>
									</button>
								</div>
								<a href="news.html" class="news-btn">
									<p>Все новости</p>
								</a>
							</div>
						</div>
					</div>
					<div class="news-block__slider">
						<div class="news-block__swiper">
							<div class="news-block__slide">
								<a href="page-news.html" class="card-news">
									<div class="card-news__img">
										<div class="card-news__pictures">
											<picture><source data-srcset="img/news/picNews-1.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/news/picNews-1.jpg?_v=1733252911292" alt="pictures"></picture>
										</div>
									</div>
									<div class="text-con">Рады вам сообщить что мы выходим на ранки России и Беларуси! </div>
									<span class="data">18.10.2024</span>
									<div class="btn-item icon">
										<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M8.61775 10.0186L0.289968 1.69077C-0.0966551 1.30415 -0.0966563 0.676589 0.289966 0.289966C0.676589 -0.0966566 1.30415 -0.0966547 1.69077 0.289968L10.0186 8.61775L10.0186 1.0673C10.0179 0.520285 10.4619 0.0762257 11.0089 0.0769261C11.5559 0.0762257 12 0.520282 11.9993 1.0673L12 10.9928C11.9993 10.9977 11.9993 11.0033 11.9993 11.0089C11.9993 11.2821 11.8886 11.53 11.7093 11.7093C11.53 11.8886 11.2821 11.9993 11.0089 11.9993C11.0033 11.9993 10.9977 11.9993 10.9928 12L1.0673 11.9993C0.520284 12 0.0762282 11.5559 0.0769286 11.0089C0.0762282 10.4619 0.520284 10.0179 1.0673 10.0186H8.61775Z" fill="#D92F30" />
										</svg>
									</div>
								</a>
							</div>
							<div class="news-block__slide">
								<a href="page-news.html" class="card-news">
									<div class="card-news__img">
										<div class="card-news__pictures">
											<picture><source data-srcset="img/news/picNews-2.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/news/picNews-2.jpg?_v=1733252911292" alt="pictures"></picture>
										</div>
									</div>
									<div class="text-con">Рады вам сообщить что мы выходим на ранки России и Беларуси! </div>
									<span class="data">18.10.2024</span>
									<div class="btn-item icon">
										<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M8.61775 10.0186L0.289968 1.69077C-0.0966551 1.30415 -0.0966563 0.676589 0.289966 0.289966C0.676589 -0.0966566 1.30415 -0.0966547 1.69077 0.289968L10.0186 8.61775L10.0186 1.0673C10.0179 0.520285 10.4619 0.0762257 11.0089 0.0769261C11.5559 0.0762257 12 0.520282 11.9993 1.0673L12 10.9928C11.9993 10.9977 11.9993 11.0033 11.9993 11.0089C11.9993 11.2821 11.8886 11.53 11.7093 11.7093C11.53 11.8886 11.2821 11.9993 11.0089 11.9993C11.0033 11.9993 10.9977 11.9993 10.9928 12L1.0673 11.9993C0.520284 12 0.0762282 11.5559 0.0769286 11.0089C0.0762282 10.4619 0.520284 10.0179 1.0673 10.0186H8.61775Z" fill="#D92F30" />
										</svg>
									</div>
								</a>
							</div>
							<div class="news-block__slide">
								<a href="page-news.html" class="card-news">
									<div class="card-news__img">
										<div class="card-news__pictures">
											<picture><source data-srcset="img/news/picNews-3.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/news/picNews-3.jpg?_v=1733252911292" alt="pictures"></picture>
										</div>
									</div>
									<div class="text-con">Рады вам сообщить что мы выходим на ранки России и Беларуси! </div>
									<span class="data">18.10.2024</span>
									<div class="btn-item icon">
										<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M8.61775 10.0186L0.289968 1.69077C-0.0966551 1.30415 -0.0966563 0.676589 0.289966 0.289966C0.676589 -0.0966566 1.30415 -0.0966547 1.69077 0.289968L10.0186 8.61775L10.0186 1.0673C10.0179 0.520285 10.4619 0.0762257 11.0089 0.0769261C11.5559 0.0762257 12 0.520282 11.9993 1.0673L12 10.9928C11.9993 10.9977 11.9993 11.0033 11.9993 11.0089C11.9993 11.2821 11.8886 11.53 11.7093 11.7093C11.53 11.8886 11.2821 11.9993 11.0089 11.9993C11.0033 11.9993 10.9977 11.9993 10.9928 12L1.0673 11.9993C0.520284 12 0.0762282 11.5559 0.0769286 11.0089C0.0762282 10.4619 0.520284 10.0179 1.0673 10.0186H8.61775Z" fill="#D92F30" />
										</svg>
									</div>
								</a>
							</div>
							<div class="news-block__slide">
								<a href="page-news.html" class="card-news">
									<div class="card-news__img">
										<div class="card-news__pictures">
											<picture><source data-srcset="img/news/picNews-4.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/news/picNews-4.jpg?_v=1733252911292" alt="pictures"></picture>
										</div>
									</div>
									<div class="text-con">Рады вам сообщить что мы выходим на ранки России и Беларуси! </div>
									<span class="data">18.10.2024</span>
									<div class="btn-item icon">
										<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M8.61775 10.0186L0.289968 1.69077C-0.0966551 1.30415 -0.0966563 0.676589 0.289966 0.289966C0.676589 -0.0966566 1.30415 -0.0966547 1.69077 0.289968L10.0186 8.61775L10.0186 1.0673C10.0179 0.520285 10.4619 0.0762257 11.0089 0.0769261C11.5559 0.0762257 12 0.520282 11.9993 1.0673L12 10.9928C11.9993 10.9977 11.9993 11.0033 11.9993 11.0089C11.9993 11.2821 11.8886 11.53 11.7093 11.7093C11.53 11.8886 11.2821 11.9993 11.0089 11.9993C11.0033 11.9993 10.9977 11.9993 10.9928 12L1.0673 11.9993C0.520284 12 0.0762282 11.5559 0.0769286 11.0089C0.0762282 10.4619 0.520284 10.0179 1.0673 10.0186H8.61775Z" fill="#D92F30" />
										</svg>
									</div>
								</a>
							</div>
							<div class="news-block__slide">
								<a href="page-news.html" class="card-news">
									<div class="card-news__img">
										<div class="card-news__pictures">
											<picture><source data-srcset="img/news/picNews-5.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/news/picNews-5.jpg?_v=1733252911292" alt="pictures"></picture>
										</div>
									</div>
									<div class="text-con">Рады вам сообщить что мы выходим на ранки России и Беларуси! </div>
									<span class="data">18.10.2024</span>
									<div class="btn-item icon">
										<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M8.61775 10.0186L0.289968 1.69077C-0.0966551 1.30415 -0.0966563 0.676589 0.289966 0.289966C0.676589 -0.0966566 1.30415 -0.0966547 1.69077 0.289968L10.0186 8.61775L10.0186 1.0673C10.0179 0.520285 10.4619 0.0762257 11.0089 0.0769261C11.5559 0.0762257 12 0.520282 11.9993 1.0673L12 10.9928C11.9993 10.9977 11.9993 11.0033 11.9993 11.0089C11.9993 11.2821 11.8886 11.53 11.7093 11.7093C11.53 11.8886 11.2821 11.9993 11.0089 11.9993C11.0033 11.9993 10.9977 11.9993 10.9928 12L1.0673 11.9993C0.520284 12 0.0762282 11.5559 0.0769286 11.0089C0.0762282 10.4619 0.520284 10.0179 1.0673 10.0186H8.61775Z" fill="#D92F30" />
										</svg>
									</div>
								</a>
							</div>
							<div class="news-block__slide">
								<a href="page-news.html" class="card-news">
									<div class="card-news__img">
										<div class="card-news__pictures">
											<picture><source data-srcset="img/news/picNews-6.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/news/picNews-6.jpg?_v=1733252911292" alt="pictures"></picture>
										</div>
									</div>
									<div class="text-con">Рады вам сообщить что мы выходим на ранки России и Беларуси! </div>
									<span class="data">18.10.2024</span>
									<div class="btn-item icon">
										<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M8.61775 10.0186L0.289968 1.69077C-0.0966551 1.30415 -0.0966563 0.676589 0.289966 0.289966C0.676589 -0.0966566 1.30415 -0.0966547 1.69077 0.289968L10.0186 8.61775L10.0186 1.0673C10.0179 0.520285 10.4619 0.0762257 11.0089 0.0769261C11.5559 0.0762257 12 0.520282 11.9993 1.0673L12 10.9928C11.9993 10.9977 11.9993 11.0033 11.9993 11.0089C11.9993 11.2821 11.8886 11.53 11.7093 11.7093C11.53 11.8886 11.2821 11.9993 11.0089 11.9993C11.0033 11.9993 10.9977 11.9993 10.9928 12L1.0673 11.9993C0.520284 12 0.0762282 11.5559 0.0769286 11.0089C0.0762282 10.4619 0.520284 10.0179 1.0673 10.0186H8.61775Z" fill="#D92F30" />
										</svg>
									</div>
								</a>
							</div>
							<div class="news-block__slide">
								<a href="page-news.html" class="card-news">
									<div class="card-news__img">
										<div class="card-news__pictures">
											<picture><source data-srcset="img/news/picNews-7.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/news/picNews-7.jpg?_v=1733252911292" alt="pictures"></picture>
										</div>
									</div>
									<div class="text-con">Рады вам сообщить что мы выходим на ранки России и Беларуси! </div>
									<span class="data">18.10.2024</span>
									<div class="btn-item icon">
										<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M8.61775 10.0186L0.289968 1.69077C-0.0966551 1.30415 -0.0966563 0.676589 0.289966 0.289966C0.676589 -0.0966566 1.30415 -0.0966547 1.69077 0.289968L10.0186 8.61775L10.0186 1.0673C10.0179 0.520285 10.4619 0.0762257 11.0089 0.0769261C11.5559 0.0762257 12 0.520282 11.9993 1.0673L12 10.9928C11.9993 10.9977 11.9993 11.0033 11.9993 11.0089C11.9993 11.2821 11.8886 11.53 11.7093 11.7093C11.53 11.8886 11.2821 11.9993 11.0089 11.9993C11.0033 11.9993 10.9977 11.9993 10.9928 12L1.0673 11.9993C0.520284 12 0.0762282 11.5559 0.0769286 11.0089C0.0762282 10.4619 0.520284 10.0179 1.0673 10.0186H8.61775Z" fill="#D92F30" />
										</svg>
									</div>
								</a>
							</div>
							<div class="news-block__slide">
								<a href="page-news.html" class="card-news">
									<div class="card-news__img">
										<div class="card-news__pictures">
											<picture><source data-srcset="img/news/picNews-8.webp" srcset="img/1x1.webp" type="image/webp"><img  src="img/1x1.png?_v=1733252911292" data-src="img/news/picNews-8.jpg?_v=1733252911292" alt="pictures"></picture>
										</div>
									</div>
									<div class="text-con">Рады вам сообщить что мы выходим на ранки России и Беларуси! </div>
									<span class="data">18.10.2024</span>
									<div class="btn-item icon">
										<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M8.61775 10.0186L0.289968 1.69077C-0.0966551 1.30415 -0.0966563 0.676589 0.289966 0.289966C0.676589 -0.0966566 1.30415 -0.0966547 1.69077 0.289968L10.0186 8.61775L10.0186 1.0673C10.0179 0.520285 10.4619 0.0762257 11.0089 0.0769261C11.5559 0.0762257 12 0.520282 11.9993 1.0673L12 10.9928C11.9993 10.9977 11.9993 11.0033 11.9993 11.0089C11.9993 11.2821 11.8886 11.53 11.7093 11.7093C11.53 11.8886 11.2821 11.9993 11.0089 11.9993C11.0033 11.9993 10.9977 11.9993 10.9928 12L1.0673 11.9993C0.520284 12 0.0762282 11.5559 0.0769286 11.0089C0.0762282 10.4619 0.520284 10.0179 1.0673 10.0186H8.61775Z" fill="#D92F30" />
										</svg>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="block-form">
				<h2 class="title">Контакты</h2>
				<div class="block-form__body">
					<div class="content-form">
						<div class="subtitle-form">Если у Вас остались вопросы оставьте свои данные и мы вам перезвоним</div>
					</div>
					<form action="" method="post" class="form-list">
						<div class="form-list__item">
							<label class="label">ФИО</label>
							<input autocomplete="off" type="text" name="fullname" data-error="Ошибка" placeholder="" class="input" required>
							<button type="button" class="reset-button icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
									<path d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5755 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z" fill="white" />
								</svg>
							</button>
						</div>
						<div class="form-list__item">
							<label class="label">Компания</label>
							<input autocomplete="off" type="text" name="company" data-error="Ошибка" placeholder="" class="input" required>
							<button type="button" class="reset-button icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
									<path d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5755 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z" fill="white" />
								</svg>
							</button>
						</div>
						<div class="form-list__item">
							<label class="label">Город</label>
							<input autocomplete="off" type="text" name="city" data-error="Ошибка" placeholder="" class="input" required>
							<button type="button" class="reset-button icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
									<path d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5755 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z" fill="white" />
								</svg>
							</button>
						</div>
						<div class="form-list__item">
							<label class="label">Email</label>
							<input autocomplete="off" type="email" name="email" data-error="Ошибка" placeholder="" class="input" required>
							<button type="button" class="reset-button icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
									<path d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5755 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z" fill="white" />
								</svg>
							</button>
						</div>
						<div class="form-list__item">
							<label class="label">Телефон</label>
							<input autocomplete="off" type="tel" name="phone" data-error="Ошибка" placeholder="" class="input" required>
							<button type="button" class="reset-button icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
									<path d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5755 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z" fill="white" />
								</svg>
							</button>
						</div>
						<div class="form-list__item">
							<label class="label">Комментарий</label>
							<textarea autocomplete="off" name="comment" placeholder="" data-error="Ошибка" class="input"></textarea>
							<button type="button" class="reset-button icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
									<path d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5755 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z" fill="white" />
								</svg>
							</button>
						</div>
						<div class="agreement">
							<input type="checkbox" name="agreement" class="agreement__input" required>
							<label class="agreement__label">Даю согласие на обработку <a href="files/policy.pdf" target="_blank">персональных данных</a></label>
						</div>
						<button type="submit" class="btn">
							<p>Оформить заявку</p>
							<span class="icon">
								<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M7.89961 9.18368L0.265804 1.54988C-0.0886005 1.19547 -0.0886016 0.620206 0.265803 0.265802C0.620207 -0.0886019 1.19547 -0.0886002 1.54988 0.265804L9.18368 7.89961L9.18368 0.978358C9.18304 0.476928 9.59009 0.0698736 10.0915 0.0705156C10.593 0.0698736 11 0.476925 10.9994 0.978355L11 10.0768C10.9994 10.0812 10.9994 10.0864 10.9994 10.0915C10.9994 10.3419 10.8979 10.5692 10.7336 10.7336C10.5692 10.8979 10.3419 10.9994 10.0915 10.9994C10.0864 10.9994 10.0812 10.9994 10.0768 11L0.978357 10.9994C0.476927 11 0.0698758 10.5929 0.0705179 10.0915C0.0698758 9.59009 0.476927 9.18304 0.978357 9.18368H7.89961Z" fill="white" />
								</svg>
							</span>
						</button>
					</form>
					<div class="info-form">
						<div class="form-actions">
							<div class="form-actions__item form-actions__item--top">
								<div class="form-actions__label">Адрес:</div>
								<p class="form-actions__text">119361, г. Москва, вн.тер.г. муниципальный округ Очаково-Матвеевское, ул. Озёрная, д. 9, помещ. 20/2П</p>
							</div>
							<div class="form-actions__item">
								<div class="form-actions__label">Телефоны для связи:</div>
								<a href="tel:+74955177232" class="form-actions__text form-actions__text--link">+7 (495) 101-02-30</a>
							</div>
							<div class="form-actions__item">
								<div class="form-actions__label">Электронная почта:</div>
								<a href="mailto:info@imaigroup.ru" class="form-actions__text form-actions__text--link">info@imaigroup.ru</a>
							</div>
						</div>
						<div class="protected">
							<span class="icon">
								<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip0_4425_3397)">
										<path d="M6.378 8.34C5.706 8.34 5.18333 8.13467 4.81 7.724C4.43667 7.31333 4.25 6.744 4.25 6.016C4.25 5.26933 4.44133 4.69533 4.824 4.294C5.216 3.88333 5.75267 3.678 6.434 3.678C6.658 3.678 6.87267 3.70133 7.078 3.748C7.29267 3.78533 7.50267 3.85067 7.708 3.944L7.47 4.644C7.29267 4.56933 7.11533 4.51333 6.938 4.476C6.77 4.43867 6.59733 4.42 6.42 4.42C6.00933 4.42 5.69667 4.55533 5.482 4.826C5.27667 5.08733 5.174 5.484 5.174 6.016C5.174 6.52 5.27667 6.912 5.482 7.192C5.68733 7.46267 5.986 7.598 6.378 7.598C6.56467 7.598 6.76067 7.57467 6.966 7.528C7.18067 7.472 7.40467 7.39733 7.638 7.304V8.06C7.414 8.15333 7.19933 8.22333 6.994 8.27C6.78867 8.31667 6.58333 8.34 6.378 8.34ZM6 11.77C5.20667 11.77 4.46 11.6207 3.76 11.322C3.06 11.0233 2.444 10.6127 1.912 10.09C1.38933 9.558 0.978667 8.942 0.68 8.242C0.381333 7.542 0.232 6.79533 0.232 6.002C0.232 5.19933 0.381333 4.45267 0.68 3.762C0.978667 3.062 1.38933 2.45067 1.912 1.928C2.444 1.396 3.06 0.980666 3.76 0.681999C4.46 0.383333 5.20667 0.233999 6 0.233999C6.80267 0.233999 7.54933 0.383333 8.24 0.681999C8.94 0.980666 9.55133 1.396 10.074 1.928C10.606 2.45067 11.0213 3.062 11.32 3.762C11.6187 4.45267 11.768 5.19933 11.768 6.002C11.768 6.79533 11.6187 7.542 11.32 8.242C11.0213 8.942 10.606 9.558 10.074 10.09C9.55133 10.6127 8.94 11.0233 8.24 11.322C7.54933 11.6207 6.80267 11.77 6 11.77ZM6 10.986C6.69067 10.986 7.33467 10.86 7.932 10.608C8.53867 10.3467 9.07067 9.98733 9.528 9.53C9.98533 9.07267 10.34 8.54533 10.592 7.948C10.8533 7.34133 10.984 6.69267 10.984 6.002C10.984 5.31133 10.8533 4.66733 10.592 4.07C10.34 3.46333 9.98533 2.93133 9.528 2.474C9.07067 2.01667 8.53867 1.662 7.932 1.41C7.33467 1.14867 6.69067 1.018 6 1.018C5.30933 1.018 4.66067 1.14867 4.054 1.41C3.45667 1.662 2.92933 2.01667 2.472 2.474C2.01467 2.93133 1.65533 3.46333 1.394 4.07C1.142 4.66733 1.016 5.31133 1.016 6.002C1.016 6.69267 1.142 7.34133 1.394 7.948C1.65533 8.54533 2.01467 9.07267 2.472 9.53C2.92933 9.98733 3.45667 10.3467 4.054 10.608C4.66067 10.86 5.30933 10.986 6 10.986Z" fill="#838B8B" />
									</g>
									<defs>
										<clipPath id="clip0_4425_3397">
											<rect width="12" height="12" fill="white" />
										</clipPath>
									</defs>
								</svg>
							</span>
							<span class="current-year"></span> IMAI Group. Все права защищены
							<a href="files/policy.pdf" target="_blank">Пользовательское соглашение</a>
						</div>
					</div>
				</div>
			</section>
	</div>
	</main>



	<div id="popup-formalize" class="popup">
		<div class="popup__wrap">
			<div class="popup__inner">
				<div class="popup__content">
					<div class="popup__info">
						<h3 class="popup__title">оформить заявку</h3>
						<p class="popup__text text">Если у Вас остались вопросы оставьте свои данные и мы вам перезвоним</p>
					</div>
					<form action="" method="post" class="form-list">
						<div class="form-list__item">
							<label class="label">ФИО</label>
							<input autocomplete="off" type="text" name="fullname" data-error="Ошибка" placeholder="" class="input" required>
							<button type="button" class="reset-button icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
									<path d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5755 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z" fill="white" />
								</svg>
							</button>
						</div>
						<div class="form-list__item">
							<label class="label">Компания</label>
							<input autocomplete="off" type="text" name="company" data-error="Ошибка" placeholder="" class="input" required>
							<button type="button" class="reset-button icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
									<path d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5755 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z" fill="white" />
								</svg>
							</button>
						</div>
						<div class="form-list__item">
							<label class="label">Город</label>
							<input autocomplete="off" type="text" name="city" data-error="Ошибка" placeholder="" class="input" required>
							<button type="button" class="reset-button icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
									<path d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5755 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z" fill="white" />
								</svg>
							</button>
						</div>
						<div class="form-list__item">
							<label class="label">Email</label>
							<input autocomplete="off" type="email" name="email" data-error="Ошибка" placeholder="" class="input" required>
							<button type="button" class="reset-button icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
									<path d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5755 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z" fill="white" />
								</svg>
							</button>
						</div>
						<div class="form-list__item">
							<label class="label">Телефон</label>
							<input autocomplete="off" type="tel" name="phone" data-error="Ошибка" placeholder="" class="input" required>
							<button type="button" class="reset-button icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
									<path d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5755 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z" fill="white" />
								</svg>
							</button>
						</div>
						<div class="form-list__item">
							<label class="label">Комментарий</label>
							<textarea autocomplete="off" name="comment" placeholder="" data-error="Ошибка" class="input"></textarea>
							<button type="button" class="reset-button icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
									<path d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5755 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z" fill="white" />
								</svg>
							</button>
						</div>
						<div class="agreement">
							<input type="checkbox" name="agreement" class="agreement__input" required>
							<label class="agreement__label">Даю согласие на обработку <a href="files/policy.pdf" target="_blank">персональных данных</a></label>
						</div>
						<button type="submit" class="btn">
							<p>Оформить заявку</p>
							<span class="icon">
								<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M7.89961 9.18368L0.265804 1.54988C-0.0886005 1.19547 -0.0886016 0.620206 0.265803 0.265802C0.620207 -0.0886019 1.19547 -0.0886002 1.54988 0.265804L9.18368 7.89961L9.18368 0.978358C9.18304 0.476928 9.59009 0.0698736 10.0915 0.0705156C10.593 0.0698736 11 0.476925 10.9994 0.978355L11 10.0768C10.9994 10.0812 10.9994 10.0864 10.9994 10.0915C10.9994 10.3419 10.8979 10.5692 10.7336 10.7336C10.5692 10.8979 10.3419 10.9994 10.0915 10.9994C10.0864 10.9994 10.0812 10.9994 10.0768 11L0.978357 10.9994C0.476927 11 0.0698758 10.5929 0.0705179 10.0915C0.0698758 9.59009 0.476927 9.18304 0.978357 9.18368H7.89961Z" fill="white" />
								</svg>
							</span>
						</button>
					</form>
				</div>
			</div>
			<button class="close-btn icon">
				<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.83 11.5248C10.6981 11.6568 10.5463 11.7294 10.3747 11.7426C10.2031 11.7294 10.0513 11.6568 9.91929 11.5248L5.8011 7.40662L1.74231 11.4654C1.61032 11.5974 1.45853 11.67 1.28693 11.6832C1.11534 11.67 0.963551 11.5974 0.831558 11.4654L0.19799 10.8318C0.0659965 10.6999 -1.96685e-07 10.5547 0 10.3963C4.91713e-08 10.2115 0.0659967 10.0531 0.19799 9.92109L4.25678 5.8623L0.257387 1.8629C0.125394 1.73091 0.0593971 1.58572 0.0593975 1.42733C0.0593971 1.24254 0.125394 1.08414 0.257387 0.952151L0.950351 0.259187C1.08234 0.127193 1.23414 0.0677962 1.40573 0.0809962C1.57732 0.0677966 1.72911 0.127193 1.8611 0.259187L5.8605 4.25858L9.93909 0.17999C10.0711 0.0479973 10.2229 -0.0113995 10.3945 0.00180007C10.5661 -0.0113999 10.7179 0.0479969 10.8498 0.17999L11.4834 0.813558C11.6154 0.945551 11.6814 1.10394 11.6814 1.28873C11.6814 1.44713 11.6154 1.59232 11.4834 1.72431L7.40482 5.8029L11.523 9.92109C11.655 10.0531 11.721 10.2115 11.721 10.3963C11.721 10.5547 11.655 10.6999 11.523 10.8318L10.83 11.5248Z" fill="#D92F30" />
				</svg>
			</button>
		</div>
	</div>
	</div>




	<script src="https://unpkg.com/preload-it"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>

	<script defer src="js/app.min.js?_v=20241203220831"></script>


</body>


</html>