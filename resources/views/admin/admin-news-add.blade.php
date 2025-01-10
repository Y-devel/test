<?php
$activeNews = "active";
$activeProduct = "";

try {
	if ($newsItem) {
		$id = $newsItem->id;
		$title = $newsItem->name;
		$path = asset($newsItem->img_path);
		$body = $newsItem->body;
		$date = $newsItem->created_at->toDateString();
	}
} catch (Exception $e) {
	$title = "";
	$path = "";
	$body = "";
	$date = "";
	$id  = "";
}


?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<title>IMAI</title>
	<meta charset="UTF-8" />
	<meta name="format-detection" content="telephone=no" />

	<link rel="stylesheet" href="/css/style.css" />

	<link rel="shortcut icon" href="/favicon.ico" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />


</head>


<body>


	<div class="wrapper">
		@include('admin.admin-header')
		<main class="mainpage admin-mainpage">
			<div class="mainpage__admin-container">
				<div class="mainpage-admin-inner">
					<form method="post" class="admin-wrap admin-wrap-news" enctype="multipart/form-data">
						@csrf
						<input value="{{$id}}" autocomplete="off" type="text" name="id" hidden>
						<div class="admin-wrap__items admin-wrap__items--top">
							<div class="admin-wrap__box">
								<h2 class="admin-top-title">Новость</h2>
							</div>
							<div class="admin-wrap-list">
								<div class="admin-wrap-item">
									<div class="admin-wrap-box">
										<label class="admin-wrap-label">Заголовок</label>
										<input value="{{$title}}" autocomplete="off" type="text" name="name"
											data-error="Ошибка" class="admin-wrap-input" required>
									</div>
									<button type="button" class="admin-button admin-icon">
										<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
											<path
												d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5754 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z"
												fill="white" />
										</svg>
									</button>
								</div>
								<div class="admin-wrap-item">
									<div class="admin-wrap-box">
										<label class="admin-wrap-label"><span class="admin-wrap-label-pub">Дата
												публикации</span> <span id="selected-date"
												class="admin-wrap-label-date"></span></label>
										<input value="{{$date}}" autocomplete="off" type="date" name="created_at"
											data-error="Ошибка" class="admin-wrap-input admin-wrap-input-date" required>
									</div>
								</div>
							</div>
						</div>
						<div class="admin-wrap__items">
							<div class="admin-wrap__title">изображение новости</div>
							<div class="admin-wrap-list">
								@if($path)
								<div class="admin-wrap-item admin-wrap-item-file active act-item act-file">
										<div class="admin-wrap-box">
											<label class="admin-wrap-label-file" for="add-3">
												<span class="admin-wrap-label-text">{{$path}}</span>
												<span class="admin-wrap-label-btn">
													Добавить файл
													<span class="admin-icon">
														<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path fill-rule="evenodd" clip-rule="evenodd" d="M6.57377 12.359L6.57377 1.42002C6.57377 0.912171 6.98872 0.5 7.5 0.5C8.01128 0.5 8.42623 0.912171 8.42623 1.42002V12.359L13.4187 7.40007C13.7799 7.04034 14.3672 7.04034 14.7284 7.40007C15.0905 7.75888 15.0905 8.34217 14.7284 8.70098L8.16596 15.2203C8.16225 15.2231 8.15855 15.2268 8.15484 15.2304C7.97423 15.4098 7.73711 15.5 7.5 15.5C7.26288 15.5 7.02577 15.4098 6.84515 15.2304C6.84145 15.2268 6.83774 15.2231 6.83404 15.2203L0.271617 8.70098C-0.0905394 8.34217 -0.0905389 7.75888 0.271618 7.40007C0.632848 7.04034 1.22008 7.04034 1.58131 7.40007L6.57377 12.359Z" fill="white"></path>
														</svg>
													</span>
												</span>
											</label>
											<input value = "{{$path}}" autocomplete="off" type="file" name="img_path" data-error="Ошибка" class="admin-wrap-file" id="add-3">
										</div>
										<button type="button" class="admin-button admin-icon">
											<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
												<circle cx="10" cy="10" r="10" fill="#C7C7C7"></circle>
												<path d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5754 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z" fill="white"></path>
											</svg>
										</button>
									</div>
								@else
									<div class="admin-wrap-item admin-wrap-item-file">
										<div class="admin-wrap-box">
											<label class="admin-wrap-label-file">
												<span class="admin-wrap-label-text">Загрузите изображение станка</span>
												<span class="admin-wrap-label-btn">
													Добавить файл
													<span class="admin-icon">
														<svg width="15" height="16" viewBox="0 0 15 16" fill="none"
															xmlns="http://www.w3.org/2000/svg">
															<path fill-rule="evenodd" clip-rule="evenodd"
																d="M6.57377 12.359L6.57377 1.42002C6.57377 0.912171 6.98872 0.5 7.5 0.5C8.01128 0.5 8.42623 0.912171 8.42623 1.42002V12.359L13.4187 7.40007C13.7799 7.04034 14.3672 7.04034 14.7284 7.40007C15.0905 7.75888 15.0905 8.34217 14.7284 8.70098L8.16596 15.2203C8.16225 15.2231 8.15855 15.2268 8.15484 15.2304C7.97423 15.4098 7.73711 15.5 7.5 15.5C7.26288 15.5 7.02577 15.4098 6.84515 15.2304C6.84145 15.2268 6.83774 15.2231 6.83404 15.2203L0.271617 8.70098C-0.0905394 8.34217 -0.0905389 7.75888 0.271618 7.40007C0.632848 7.04034 1.22008 7.04034 1.58131 7.40007L6.57377 12.359Z"
																fill="white" />
														</svg>
													</span>
												</span>
											</label>
											<input autocomplete="off" type="file" name="img_path"
												data-error="Ошибка" class="admin-wrap-file" required>
										</div>
										<button type="button" class="admin-button admin-icon">
											<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
												<path
													d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5754 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z"
													fill="white" />
											</svg>
										</button>
									</div>
								@endif

							</div>
						</div>

						<div class="admin-wrap__items">
							<div class="admin-wrap__title">Описание</div>
							<div class="admin-wrap-list">
								<div class="admin-wrap-item">
									<div class="admin-wrap-box">
										<label class="admin-wrap-label">Текст</label>
										<textarea required autocomplete="off" name="body" data-error="Ошибка"
											class="admin-wrap-input admin-wrap-input-textarea">{{$body}}</textarea>
									</div>
									<button type="button" class="admin-button admin-icon">
										<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<circle cx="10" cy="10" r="10" fill="#C7C7C7" />
											<path
												d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5754 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z"
												fill="white" />
										</svg>
									</button>
								</div>
							</div>
						</div>

						<div class="actions-buttoms">
							<a href="/news-admin" style="width: 100%"><button type="button"
									class="actions-buttom actions-buttom--reset open-admin-btn">Отменить и вернуться
									назад</button></a>

							<button type="submit"
								class="actions-buttom actions-buttom--save">Сохранить и добавить станок на сайт</button>
						</div>

					</form>
				</div>
			</div>
		</main>

	</div>


	<script defer src="/js/script.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>


</body>


</html>