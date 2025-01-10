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


</head>


<body>
	<div class="wrapper">

		<div class="admin-log">
			<div class="admin-log__container">
				<div class="admin-log__inner">
					<div class="admin-log__img">
						<div class="admin-log__pictures">
							<img src="img/icons/logo.svg" alt="pictures">
						</div>
					</div>
					<form action="{{ route('login')}}" method="post" class="admin-log-block">
						@csrf
						<div class="admin-log-block__wrap">
							<div class="admin-log-block__top">
								<div class="admin-log-block__title">Вход</div>
								<div class="admin-log-block__subtitle">Введите данные для входа в систему</div>
							</div>
							<div class="admin-log-block__list">
								<div class="admin-log-block__item">
									<label for="log_in" class="admin-log-block__label">Логин</label>
									<input id="email" autocomplete="off" type="text" name="email" data-error="Ошибка"
										class="admin-log-block__input" required>
								</div>
								<div class="admin-log-block__item">
									<label for="password" class="admin-log-block__label">Пароль</label>
									<div class="admin-log-block__password">
										<input id="password" autocomplete="off" type="password" name="password"
											data-error="Ошибка"
											class="admin-log-block__input admin-log-block__input--password" required>
										<div class="admin-log-block__choice">
											<span class="icon icon-show">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M2.06251 12.3481C1.97916 12.1236 1.97916 11.8766 2.06251 11.6521C2.87421 9.68397 4.25202 8.00116 6.02128 6.81701C7.79053 5.63287 9.87155 5.00073 12.0005 5.00073C14.1295 5.00073 16.2105 5.63287 17.9797 6.81701C19.749 8.00116 21.1268 9.68397 21.9385 11.6521C22.0218 11.8766 22.0218 12.1236 21.9385 12.3481C21.1268 14.3163 19.749 15.9991 17.9797 17.1832C16.2105 18.3674 14.1295 18.9995 12.0005 18.9995C9.87155 18.9995 7.79053 18.3674 6.02128 17.1832C4.25202 15.9991 2.87421 14.3163 2.06251 12.3481Z"
														stroke="#838B8B" stroke-width="2" stroke-linecap="round"
														stroke-linejoin="round" />
													<path
														d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
														stroke="#838B8B" stroke-width="2" stroke-linecap="round"
														stroke-linejoin="round" />
												</svg>
											</span>
											<span class="icon icon-hide">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path d="M14.9993 18L14.2773 14.75" stroke="#838B8B"
														stroke-width="2" stroke-linecap="round"
														stroke-linejoin="round" />
													<path
														d="M2 8C2.74835 10.0508 4.10913 11.8219 5.8979 13.0733C7.68667 14.3247 9.81695 14.9959 12 14.9959C14.1831 14.9959 16.3133 14.3247 18.1021 13.0733C19.8909 11.8219 21.2516 10.0508 22 8"
														stroke="#838B8B" stroke-width="2" stroke-linecap="round"
														stroke-linejoin="round" />
													<path d="M19.9994 15L18.2734 12.95" stroke="#838B8B"
														stroke-width="2" stroke-linecap="round"
														stroke-linejoin="round" />
													<path d="M4 15L5.726 12.95" stroke="#838B8B" stroke-width="2"
														stroke-linecap="round" stroke-linejoin="round" />
													<path d="M9 18L9.722 14.75" stroke="#838B8B" stroke-width="2"
														stroke-linecap="round" stroke-linejoin="round" />
												</svg>
											</span>
										</div>
									</div>
								</div>
								<button type="submit" class="btn">
									<p>Вход</p>
									<span class="icon">
										<svg width="11" height="11" viewBox="0 0 11 11" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M7.89961 9.18368L0.265804 1.54988C-0.0886005 1.19547 -0.0886016 0.620206 0.265803 0.265802C0.620207 -0.0886019 1.19547 -0.0886002 1.54988 0.265804L9.18368 7.89961L9.18368 0.978358C9.18304 0.476928 9.59009 0.0698736 10.0915 0.0705156C10.593 0.0698736 11 0.476925 10.9994 0.978355L11 10.0768C10.9994 10.0812 10.9994 10.0864 10.9994 10.0915C10.9994 10.3419 10.8979 10.5692 10.7336 10.7336C10.5692 10.8979 10.3419 10.9994 10.0915 10.9994C10.0864 10.9994 10.0812 10.9994 10.0768 11L0.978357 10.9994C0.476927 11 0.0698758 10.5929 0.0705179 10.0915C0.0698758 9.59009 0.476927 9.18304 0.978357 9.18368H7.89961Z"
												fill="white" />
										</svg>
									</span>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>

	<script defer src="js/app.min.js?_v=20241209192324"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>



</body>


</html>