<?php  $product->autoproducts = ($product->autoproducts->count()) ? $product->autoproducts : [new App\Models\AutoProducts()] ?>
<div class="admin-wrap__items">
    <div class="admin-wrap__title">Автоматизация и механизация</div>
    <div class="admin-wrap-block">
        <div class="admin-wrap-block-row admin-wrap-list-counter" data-section-xml-id="autoproducts">
            @foreach ($product->autoproducts as $key => $autoproduct)
                <?    $key = ($autoproduct->id) ? $autoproduct->id : $key ?>
                <div class="admin-wrap-block-items admin-wrap-block-items-last"
                    data-section-xml-items-id="autoproducts[{{$key}}][parameters]">
                    <div class="admin-wrap-block-top">
                        <div class="admin-sub-title admin-sub-title-num">Продукт</div>
                        <button type="button" onclick="deleteBlock()" class="admin-sections-erase-remove">Удалить</button>
                    </div>
                    <div class="admin-wrap-col">
                        @if($autoproduct->id > 0)
                            <input hidden autocomplete="off" type="text" value="{{$autoproduct->id}}"
                                name="autoproducts[{{$key}}][id]" data-error="Ошибка" class="admin-wrap-input">
                        @endif
                        <div class="admin-wrap-col-items">
                            <div class="admin-sections-row">
                                <div class="admin-wrap-item admin-wrap-item-file">
                                    <div class="admin-wrap-box">
                                        <label class="admin-wrap-label-file">
                                            <span
                                                class="admin-wrap-label-text">{{$autoproduct->main_img ? asset($autoproduct->main_img) : 'Загрузите изображение'}}</span>
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
                                        <input autocomplete="off" type="file" name="autoproducts[{{$key}}][main_img]"
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
                                <div class="admin-wrap-item">
                                    <div class="admin-wrap-box">
                                        <label class="admin-wrap-label">Название продукта</label>
                                        <input autocomplete="off" type="text" value="{{$autoproduct->name}}"
                                            name="autoproducts[{{$key}}][name]" data-error="Ошибка"
                                            class="admin-wrap-input">
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
                        <div class="admin-wrap-col-items">
                            <div class="admin-sub-title">Тезисы (Для карточки)</div>
                            <div class="admin-wrap-list admin-wrap-list-count">
                                <?$autoproduct->theses = $autoproduct->theses ?? array_fill(0, 3, "");?>
                                @foreach ($autoproduct->theses as $item)
                                    <div class="admin-wrap-list admin-wrap-list-count">
                                        <div class="admin-wrap-item">
                                            <div class="admin-wrap-box">
                                                <label class="admin-wrap-label admin-wrap-label-num">Тезис</label>
                                                <input autocomplete="off" type="text" value="{{$item}}"
                                                    name="autoproducts[{{$key}}][theses][]" data-error="Ошибка"
                                                    class="admin-wrap-input">
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
                            <div class="admin-wrap-col-items admin-wrap-col-items-bot">
                                <div class="admin-sub-title">На странице продукта</div>
                                <div class="admin-wrap-item">
                                    <div class="admin-wrap-box">
                                        <label class="admin-wrap-label">Описание</label>
                                        <textarea autocomplete="off" name="autoproducts[{{$key}}][description]"
                                            data-error="Ошибка"
                                            class="admin-wrap-input admin-wrap-input-text">{{$autoproduct->description}}</textarea>
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
                    </div>
                    <div class="admin-sections admin-sections-tech"
                        data-section-xml-id="autoproducts[{{$key}}][autocharacteristics]">
                        <div class="admin-sub-title">Технические характеристики</div>
                        <div class="admin-sections-list admin-sections-list-tech admin-block-list-tech admin-wrap-list-counter"
                            data-section-xml-id="autocharacteristics">
                            <?php    $autoproduct->autocharacteristics = ($autoproduct->autocharacteristics->count()) ? $autoproduct->autocharacteristics : [new App\Models\AutoCharacteristics()] ?>
                            @foreach ($autoproduct->autocharacteristics as $autoKey => $autocharacteristic)
                                <?$autoKey = ($autocharacteristic->id) ? $autocharacteristic->id : $autoKey ?>
                                @if($autocharacteristic->id > 0)
                                    <input hidden autocomplete="off" type="text" value="{{$autocharacteristic->id}}"
                                        name="autoproducts[{{$key}}][autocharacteristics][{{$autoKey}}][id]" data-error="Ошибка"
                                        class="admin-wrap-input">
                                @endif
                                <div class="admin-sections-items"
                                    data-section-xml-items-id="autoproducts[{{$key}}][autocharacteristics][{{$autoKey}}][parameters]">
                                    <div class="admin-sections-top">
                                        <div class="admin-sub-title admin-sub-title-num">Раздел</div>
                                    </div>
                                    <div class="admin-wrap-item admin-wrap-item-col">
                                        <div class="admin-wrap-box">
                                            <label class="admin-wrap-label">Название раздела (пример Станок, Кромочный
                                                материал)</label>
                                            <input value="{{$autocharacteristic->name}}" autocomplete="off" type="text"
                                                name="autoproducts[{{$key}}][autocharacteristics][{{$autoKey}}][name]"
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
                                    <div class="admin-add admin-add-section">
                                        <div class="admin-add-list admin-add-list-grid">
                                            <?php        $autocharacteristic->autoparameters = ($autocharacteristic->autoparameters->count()) ? $autocharacteristic->autoparameters : [new App\Models\AutoParameters()] ?>
                                            @foreach ($autocharacteristic->autoparameters as $autoParametersKey => $autoparameter)
                                                <div class="admin-wrap-items">
                                                    <?$autoParametersKey = ($autoparameter->id) ? $autoparameter->id : $autoParametersKey ?>
                                                    @if($autoparameter->id > 0)
                                                        <input hidden autocomplete="off" type="text" value="{{$autoparameter->id}}"
                                                            name="autoproducts[{{$key}}][autocharacteristics][{{$autoKey}}][parameters][{{$autoParametersKey}}][id]"
                                                            data-error="Ошибка" class="admin-wrap-input">
                                                    @endif
                                                    <div class="admin-wrap-item">
                                                        <div class="admin-wrap-box">
                                                            <label class="admin-wrap-label">Параметр</label>
                                                            <input autocomplete="off" type="text" value="{{$autoparameter->name}}"
                                                                name="autoproducts[{{$key}}][autocharacteristics][{{$autoKey}}][parameters][{{$autoParametersKey}}][name]"
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
                                                            <input value="{{$autoparameter->value}}"
                                                                name="autoproducts[{{$key}}][autocharacteristics][{{$autoKey}}][parameters][{{$autoParametersKey}}][value]"
                                                                autocomplete="off" type="text" name="meaning" data-error="Ошибка"
                                                                class="admin-wrap-input">
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
                                        <button type="button" class="btn-remove btn-remove-parameter">Удалить последний
                                            пункт</button>
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
            @endforeach
        </div>
        <button type="button" class="admin-btn-item btn-item-block">Добавить продукт</button>
    </div>
</div>