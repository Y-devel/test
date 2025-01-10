<?php 

?>
<form method="POST" class="admin-wrap" enctype="multipart/form-data">
    @csrf
    <div class="admin-wrap__items admin-wrap__items--top">
        <div class="admin-wrap__box">
            <h2 class="admin-top-title">Станок</h2>
            <div class="admin-top-subtitle"><span>Раздел:</span> <span class="subtitle-info">{{$category->name}}</span>
            </div>
            <input hidden value="{{$category->id}}" autocomplete="off" type="text" name="category_id"
                data-error="Ошибка" class="admin-wrap-input">
        </div>
        <div class="admin-wrap-list">
            <div class="admin-wrap-item">
                <div class="admin-wrap-box">
                    <label class="admin-wrap-label">Название станка</label>
                    <input value="{{$product->name}}" autocomplete="off" type="text" name="machine_name"
                        data-error="Ошибка" class="admin-wrap-input" required>
                </div>
                <button type="button" class="admin-button admin-icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="10" cy="10" r="10" fill="#C7C7C7" />
                        <path
                            d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5754 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z"
                            fill="white" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="admin-wrap__items">
        <div class="admin-wrap__title">Тезисы (на странице категории)</div>
        <div class="admin-wrap-list admin-wrap-list-counter">
            @foreach ($product->theses as $item)
                <div class="admin-wrap-item">
                    <div class="admin-wrap-box">
                        <label class="admin-wrap-label admin-wrap-label-num">Тезис</label>
                        <input autocomplete="off" type="text" value="{{$item}}" name="theses[]" data-error="Ошибка"
                            class="admin-wrap-input">
                    </div>
                    <button type="button" class="admin-button admin-icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="10" cy="10" r="10" fill="#C7C7C7" />
                            <path
                                d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5754 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z"
                                fill="white" />
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
    <div class="admin-wrap__items">
        <div class="admin-wrap__title">Главное изображение</div>
        <div class="admin-wrap-list">
            <div class="admin-wrap-item admin-wrap-item-file">
                <div class="admin-wrap-box">
                    <label class="admin-wrap-label-file">
                        <span
                            class="admin-wrap-label-text">{{$product->main_img ? asset($product->main_img) : 'Загрузите изображение'}}</span>
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
                    <input autocomplete="off" type="file" name="upload_picture_machine" data-error="Ошибка"
                        class="admin-wrap-file">
                </div>
                <button type="button" class="admin-button admin-icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="10" cy="10" r="10" fill="#C7C7C7" />
                        <path
                            d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5754 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z"
                            fill="white" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="admin-wrap__items">
        <div class="admin-wrap__title">Описание</div>
        <div class="admin-wrap-list">
            <div class="admin-wrap-item">
                <div class="admin-wrap-box">
                    <label class="admin-wrap-label">Текст</label>
                    <textarea autocomplete="off" name="text_description" data-error="Ошибка"
                        class="admin-wrap-input admin-wrap-input-textarea">{{$product->description}}</textarea>
                </div>
                <button type="button" class="admin-button admin-icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="10" cy="10" r="10" fill="#C7C7C7" />
                        <path
                            d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5754 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z"
                            fill="white" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="admin-wrap__items">
        <div class="admin-wrap__title">Обзор станка</div>
        <div class="admin-wrap-list">
            <div class="admin-wrap-item admin-wrap-item-file">
                <div class="admin-wrap-box">
                    <label class="admin-wrap-label-file">
                        <span
                            class="admin-wrap-label-text">{{$product->machine_overview_designation_img ? asset($product->machine_overview_designation_img) : 'Загрузите изображение'}}</span>
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
                    <input autocomplete="off" type="file" name="upload_picture_machine_view" data-error="Ошибка"
                        class="admin-wrap-file">
                </div>
                <button type="button" class="admin-button admin-icon">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="10" cy="10" r="10" fill="#C7C7C7" />
                        <path
                            d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5754 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z"
                            fill="white" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="admin-add">
            <div class="admin-add-list admin-add-list-survey admin-wrap-list-counter">

                @foreach ($product->machine_overview_designation as $item)
                    <div class="admin-wrap-item">
                        <div class="admin-wrap-box">
                            <label class="admin-wrap-label admin-wrap-label-num">Обозначение</label>
                            <input autocomplete="off" value="{{$item}}" type="text" name="machine_overview_designation[]"
                                data-error="Ошибка" class="admin-wrap-input">
                        </div>
                        <button type="button" class="admin-button admin-icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10" cy="10" r="10" fill="#C7C7C7" />
                                <path
                                    d="M14.2399 14.8145C14.1273 14.9269 13.9977 14.9888 13.8514 15C13.705 14.9888 13.5754 14.9269 13.4628 14.8145L9.94932 11.3075L6.48649 14.7639C6.37387 14.8764 6.24437 14.9382 6.09797 14.9494C5.95158 14.9382 5.82207 14.8764 5.70946 14.7639L5.16892 14.2244C5.05631 14.112 5 13.9884 5 13.8535C5 13.6961 5.05631 13.5612 5.16892 13.4488L8.63176 9.99234L5.21959 6.58645C5.10698 6.47404 5.05068 6.3504 5.05068 6.21551C5.05068 6.05814 5.10698 5.92326 5.21959 5.81085L5.81081 5.22072C5.92342 5.10832 6.05293 5.05774 6.19932 5.06898C6.34572 5.05774 6.47523 5.10832 6.58784 5.22072L10 8.62661L13.4797 5.15328C13.5923 5.04087 13.7218 4.99029 13.8682 5.00153C14.0146 4.99029 14.1441 5.04087 14.2568 5.15328L14.7973 5.69283C14.9099 5.80523 14.9662 5.94012 14.9662 6.09749C14.9662 6.23237 14.9099 6.35602 14.7973 6.46842L11.3176 9.94175L14.8311 13.4488C14.9437 13.5612 15 13.6961 15 13.8535C15 13.9884 14.9437 14.112 14.8311 14.2244L14.2399 14.8145Z"
                                    fill="white" />
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn-remove btn-remove-add">Удалить последний пункт</button>
            <button type="button" class="admin-btn-item btn-item-add">
                <p>Добавить пункт</p>
            </button>
        </div>
    </div>
    <div class="admin-wrap__items admin-sections-items-bottom">
        <div class="admin-wrap__title">Преимущества</div>
        <div class="admin-sections" data-section-xml-id="advantages" data-section-title="Преимущество">
            <div class="admin-sections-list admin-sections-list-sec admin-wrap-list-counter">
                @foreach ($product->advantages as $key => $item)
                    <div class="admin-sections-items">
                        @if($item->id)
                            <input hidden autocomplete="off" type="text" value="{{$item->id}}" name="advantages[{{$key}}][id]"
                                data-error="Ошибка" class="admin-wrap-input">
                        @endif

                        <div class="admin-sections-top">
                            <div class="admin-sub-title admin-sub-title-num admin-sub-title-info">
                                Преимущество</div>
                            <button type="button" class="admin-sections-erase-remove">Удалить</button>
                        </div>
                        <div class="admin-sections-row">
                            <div class="admin-wrap-item admin-wrap-item-col admin-wrap-item-file">
                                <div class="admin-wrap-box">
                                    <label class="admin-wrap-label-file">
                                        <span
                                            class="admin-wrap-label-text">{{$item->main_img ? asset($item->main_img) : 'Загрузите изображение'}}</span>
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
                                    <input autocomplete="off" type="file" name="advantages[{{$key}}][file]"
                                        data-error="Ошибка" class="admin-wrap-file">
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
                            <div class="admin-wrap-item admin-wrap-item-col">
                                <div class="admin-wrap-box">
                                    <label class="admin-wrap-label">Заголовок</label>
                                    <input autocomplete="off" type="text" value="{{$item->name}}"
                                        name="advantages[{{$key}}][name]" data-error="Ошибка" class="admin-wrap-input">
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
                            <div class="admin-wrap-item admin-wrap-item-col">
                                <div class="admin-wrap-box">
                                    <label class="admin-wrap-label">Описание</label>
                                    <textarea autocomplete="off" name="advantages[{{$key}}][description]"
                                        data-error="Ошибка"
                                        class="admin-wrap-input admin-wrap-input-text">{{$item->description}}</textarea>
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
                @endforeach
            </div>
            <button type="button" class="admin-btn-item btn-item-section-row">
                <p>Добавить преимущество</p>
            </button>
        </div>
    </div>
    <div class="admin-wrap__items admin-sections-items-bottom">
        <div class="admin-wrap__title">все конструктивные особенности</div>
        <div class="admin-sections" data-section-xml-id="peculiarity" data-section-title="Особенность">
            <div class="admin-sections-list admin-sections-list-sec admin-wrap-list-counter">
                @foreach ($product->peculiarities as $key => $item)
                    <div class="admin-sections-items ">
                        <div class="admin-sections-top">
                            <div class="admin-sub-title admin-sub-title-num admin-sub-title-info">
                                Особенность</div>
                            <button type="button" class="admin-sections-erase-remove">Удалить</button>
                        </div>
                        <div class="admin-sections-row">
                            @if($item->id > 0)
                                <input hidden autocomplete="off" type="text" value="{{$item->id}}"
                                    name="peculiarity[{{$key}}][id]" data-error="Ошибка" class="admin-wrap-input">
                            @endif
                            <div class="admin-wrap-item admin-wrap-item-col admin-wrap-item-file">
                                <div class="admin-wrap-box">
                                    <label class="admin-wrap-label-file">
                                        <span
                                            class="admin-wrap-label-text">{{$item->main_img ? asset($item->main_img) : 'Загрузите изображение'}}</span>
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
                                    <input autocomplete="off" type="file" name="peculiarity[{{$key}}][file]"
                                        data-error="Ошибка" class="admin-wrap-file">
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
                            <div class="admin-wrap-item admin-wrap-item-col">
                                <div class="admin-wrap-box">
                                    <label class="admin-wrap-label">Заголовок</label>
                                    <input autocomplete="off" type="text" value="{{$item->name}}"
                                        name="peculiarity[{{$key}}][name]" data-error="Ошибка" class="admin-wrap-input">
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
                            <div class="admin-wrap-item admin-wrap-item-col">
                                <div class="admin-wrap-box">
                                    <label class="admin-wrap-label">Описание</label>
                                    <textarea autocomplete="off" name="peculiarity[{{$key}}][description]"
                                        data-error="Ошибка"
                                        class="admin-wrap-input admin-wrap-input-text">{{$item->description}}</textarea>
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
                @endforeach
                <div class="admin-wrap__items"></div>
            </div>
            <button type="button" class="admin-btn-item btn-item-section-row">
                <p>Добавить еще одну особенность</p>
            </button>
        </div>
    </div>
    <div class="admin-wrap__items">
        <div class="admin-wrap__title">Технические характеристики</div>
        <div class="admin-sections admin-sections-tech" data-section-xml-id="characteristics">
            <div class=" admin-sections-list admin-sections-list-tech admin-wrap-list-counter">
                <?php $product->characteristics = $product->characteristics ?? [new App\Models\Characteristics()] ?>
                @foreach ($product->characteristics as $key => $item)
                    <?php    $key = $item->id ?? $key?>
                    <div class="admin-sections-items admin-sections-items-bottom"
                        data-section-xml-items-id="characteristics[{{$key}}]">
                        <div class="admin-sections-top">
                            <div class="admin-sub-title admin-sub-title-num">Раздел</div>
                            <button type="button" class="admin-sections-erase-remove">Удалить</button>
                        </div>
                        <div class="admin-wrap-item admin-wrap-item-col">
                            @if($item->id > 0)
                                <input hidden autocomplete="off" type="text" value="{{$item->id}}"
                                    name="characteristics[{{$key}}][id]" data-error="Ошибка" class="admin-wrap-input">
                            @endif
                            <div class="admin-wrap-box">
                                <label class="admin-wrap-label">Название раздела (пример Станок,
                                    Кромочный материал)</label>
                                <input autocomplete="off" type="text" value="{{$item->name}}"
                                    name="characteristics[{{$key}}][name]" data-error="Ошибка" class="admin-wrap-input">
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
                        <div class="admin-add admin-add-section">
                            <div class="admin-add-list admin-add-list-grid">
                                <?php    $item->parameters = ($item->parameters->count()) ? $item->parameters : [new App\Models\Parameters()] ?>
                                @foreach ($item->parameters as $keyParameter => $parameter)
                                    @if($parameter->id > 0)
                                        <input hidden autocomplete="off" type="text" value="{{$parameter->id}}"
                                            name="characteristics[{{$key}}][parameters][{{$parameter->id ?? $keyParameter}}][id]"
                                            data-error="Ошибка" class="admin-wrap-input">
                                    @endif
                                    <div class="admin-wrap-items">
                                        <div class="admin-wrap-item">
                                            <div class="admin-wrap-box">
                                                <label class="admin-wrap-label">Параметр</label>
                                                <input
                                                    name="characteristics[{{$key}}][parameters][{{$parameter->id ?? $keyParameter}}][name]"
                                                    value="{{$parameter->name}}" autocomplete="off" type="text" name="parameter"
                                                    data-error="Ошибка" class="admin-wrap-input">
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
                                                <label class="admin-wrap-label">Значение</label>
                                                <input
                                                    name="characteristics[{{$key}}][parameters][{{$parameter->id ?? $keyParameter}}][value]"
                                                    value="{{$parameter->value}}" autocomplete="off" type="text" name="meaning"
                                                    data-error="Ошибка" class="admin-wrap-input">
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
                                @endforeach
                            </div>
                            <button type="button" class="btn-remove btn-remove-parameter">Удалить
                                последний пункт</button>
                            <button type="button" class="admin-btn-item btn-item-parameter">
                                <p>Добавить параметр +</p>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="admin-btn-item btn-item-section">
                <p>Добавить раздел</p>
            </button>
        </div>
    </div>
    @include('admin.automatisation')
    <div class="actions-buttoms">
        <button type="button" class="actions-buttom actions-buttom--reset open-admin-btn">Отменить и
            вернуться назад</button>
        <button type="submit" class="actions-buttom actions-buttom--save">Сохранить и
            добавить
            станок на сайт</button>
    </div>
</form>