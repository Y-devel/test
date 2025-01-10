<?php
?>
<header class="admin-header">
	<div class="admin-header__admin-container">
		<div class="admin-header__inner">
			<div class="admin-logo">
				<div class="admin-logo__pictures">
					<img src="/img/icons/logo.svg?_v=1733835064495" alt="pictures">
				</div>
			</div>
			<ul class="admin-header__list">
				<li class="admin-header__item {{$activeProduct}}"><a href="/home" class="admin-header__link">Продукты</a></li>
				<li class="admin-header__item {{$activeNews}}"><a href="/news-admin" class="admin-header__link">Новости</a></li>
			</ul>
			<button class="admin-header__exit admin-btn open-admin-btn-exit">
				<p>Выход</p>
			</button>
		</div>
	</div>
</header>
<div class="popup-admin popup-admin-exit">
	<div class="popup-admin__wrap">
		<div class="popup-admin__inner">
			<div class="popup-admin__content">
				<div class="popup-admin__top">
					<div class="popup-admin__title">Выход </div>
					<div class="popup-admin__subtitle">Для повторного входа потребуется логин и пароль</div>
				</div>
				<form action="{{ route('destroy')}}" method="post">
				@csrf
				<div class="popup-admin__choice">
					<button type="button" class="popup-admin__btn close-admin-btn">Отмена</button>
					<button type="submit" class="popup-admin__btn">Да, выйти</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>