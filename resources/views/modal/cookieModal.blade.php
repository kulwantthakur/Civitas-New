<a href="javascript:(0);" class="cookie-btn" data-bs-toggle="modal" data-bs-target="#cookieModal">PERSONNALISER</a>

<div class="modal fade cookieModal-cls" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="cookieModalLabel">GESTION DES COOKIES</h1>
                <button type="button" class="btnclose" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="height-60px red-bg-slider">

            </div>
            <div class="modal-body p-0">
                <div class="popup-heading">RéSEAUX SOCIAUX </div>
                <div class="px-3 py-2 px-md-4 py-md-3">
                    <h3 class="mb-2 mb-md-3 ">x</h3>
                    <div class="">
                        <div
                            class="option-outer d-flex flex-column flex-md-column flex-lg-row justify-content-between gap-2 gap-md-4">
                            <div class="">Autorisé – Ce service n’a déposé aucun cookie.<br>En savoir plus ->
                            </div>
                            <div class="d-flex gap-4 radio-btn-cls">
                                <div>
                                    <input class="cursor-pointer" type="radio" name="autoriser_interdire"
                                        id="autoriser" value="autoriser">
                                    <label class="cursor-pointer" for="autoriser">Autoriser </label>
                                </div>
                                <div> <input type="radio" name="autoriser_interdire" id="interdire" value="interdire">
                                    <label for="interdire">Interdire</label>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="px-3 py-2 px-md-4 py-md-3">
                    <h3 class="mb-2 mb-md-3 ">Instagram</h3>
                    <div class="">
                        <div
                            class="option-outer d-flex flex-column flex-md-column flex-lg-row justify-content-between gap-2 gap-md-4">
                            <div class="">Autorisé – Ce service n’a déposé aucun cookie.<br>En savoir plus ->
                            </div>
                            <div class="d-flex gap-4 radio-btn-cls">
                                <div>
                                    <input class="cursor-pointer" type="radio" name="autoriser_interdire"
                                        id="autoriser" value="autoriser">
                                    <label class="cursor-pointer" for="autoriser">Autoriser </label>
                                </div>
                                <div> <input type="radio" name="autoriser_interdire" id="interdire" value="interdire">
                                    <label for="interdire">Interdire</label>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="px-3 py-2 px-md-4 py-md-3">
                    <h3 class="mb-2 mb-md-3 ">Telegram</h3>
                    <div class="">
                        <div
                            class="option-outer d-flex flex-column flex-md-column flex-lg-row justify-content-between gap-2 gap-md-4">
                            <div class="">Autorisé – Ce service n’a déposé aucun cookie.<br>En savoir plus ->
                            </div>
                            <div class="d-flex gap-4 radio-btn-cls">
                                <div>
                                    <input class="cursor-pointer" type="radio" name="autoriser_interdire"
                                        id="autoriser" value="autoriser">
                                    <label class="cursor-pointer" for="autoriser">Autoriser </label>
                                </div>
                                <div> <input type="radio" name="autoriser_interdire" id="interdire" value="interdire">
                                    <label for="interdire">Interdire</label>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="popup-heading">VIDéOS </div>
                <div class="px-3 py-2 px-md-4 py-md-3">
                    <h3 class="mb-2 mb-md-3 ">Youtube</h3>
                    <div class="">
                        <div
                            class="option-outer d-flex flex-column flex-md-column flex-lg-row justify-content-between gap-2 gap-md-4">
                            <div class="">Autorisé – Ce service n’a déposé aucun cookie.<br>En savoir plus ->
                            </div>
                            <div class="d-flex gap-4 radio-btn-cls">
                                <div>
                                    <input class="cursor-pointer" type="radio" name="autoriser_interdire"
                                        id="autoriser" value="autoriser">
                                    <label class="cursor-pointer" for="autoriser">Autoriser </label>
                                </div>
                                <div> <input type="radio" name="autoriser_interdire" id="interdire" value="interdire">
                                    <label for="interdire">Interdire</label>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-dialog {
        max-width: 1200px;
    }

    .height-60px {
        height: 60px;
    }

    .modal-title {
        font-family: "SuisseScreenRegular";
        color: #000;
        font-size: 26px;
    }

    .cookieModal-cls .btnclose {
        font-family: "SuisseScreenRegular";
        color: #000;
        background: no-repeat;
        border: none;
        font-size: 25px;
    }

    .popup-heading {
        background-color: #e10d17;
        padding: 0px 15px 0px 24px;
        margin-top: 24px;
        display: inline-block;
        color: #fff;
        text-transform: uppercase;
        line-height: 2;
        font-size: 20px;
        font-family: "SuisseScreenRegular";
        font-weight: 700;
    }

    .cookieModal-cls h3 {
        color: #000;
        font-size: 26px;
        font-family: "SuisseScreenRegular";
    }

    .option-outer {
        font-family: "SuisseScreenRegular";
        color: #000;
        font-size: 26px;
    }

    .option-outer input {
        width: 20px;
        height: 20px;
        margin-right: 5px;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    .option-outer input:checked {
        position: relative;
    }

    .option-outer input:checked:after {
        content: '';
        background-color: #0B3AE1;
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0px;
        top: 0px;
        border-radius: 50%;
    }

    .radio-btn-cls>div {
        display: flex;
    }

    @media only screen and (max-width:991px) {
        .option-outer {
            font-size: 20px;
        }

        .cookieModal-cls h3 {
            font-size: 22px;
        }

        .modal-title {
            font-size: 22px;
        }

        .popup-heading {
            padding: 0px 10px 0px 16px;
            font-size: 18px;
        }
    }
</style>
