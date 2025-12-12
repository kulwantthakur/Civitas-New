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

    <!-- SOCIAL MEDIA -->
    <div class="popup-heading">RéSEAUX SOCIAUX </div>

    <!-- X -->
    <div class="px-3 py-2 px-md-4 py-md-3">
        <h3 class="mb-2 mb-md-3">X</h3>
        <div class="">
            <div class="option-outer d-flex flex-column flex-md-column flex-lg-row justify-content-between gap-2 gap-md-4">
                <div class="">Autorisé – Ce service n’a déposé aucun cookie.<br>En savoir plus -></div>
                <div class="d-flex gap-4 radio-btn-cls">
                    <div>
                        <input class="cursor-pointer" type="radio" name="autoriser_interdire_x" id="autoriser_x" value="autoriser">
                        <label class="cursor-pointer" for="autoriser_x">Autoriser</label>
                    </div>
                    <div>
                        <input type="radio" name="autoriser_interdire_x" id="interdire_x" value="interdire">
                        <label for="interdire_x">Interdire</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- INSTAGRAM -->
    <div class="px-3 py-2 px-md-4 py-md-3">
        <h3 class="mb-2 mb-md-3">Instagram</h3>
        <div class="">
            <div class="option-outer d-flex flex-column flex-md-column flex-lg-row justify-content-between gap-2 gap-md-4">
                <div class="">Autorisé – Ce service n’a déposé aucun cookie.<br>En savoir plus -></div>
                <div class="d-flex gap-4 radio-btn-cls">
                    <div>
                        <input class="cursor-pointer" type="radio" name="autoriser_interdire_instagram" id="autoriser_instagram" value="autoriser">
                        <label class="cursor-pointer" for="autoriser_instagram">Autoriser</label>
                    </div>
                    <div>
                        <input type="radio" name="autoriser_interdire_instagram" id="interdire_instagram" value="interdire">
                        <label for="interdire_instagram">Interdire</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TELEGRAM -->
    <div class="px-3 py-2 px-md-4 py-md-3">
        <h3 class="mb-2 mb-md-3">Telegram</h3>
        <div class="">
            <div class="option-outer d-flex flex-column flex-md-column flex-lg-row justify-content-between gap-2 gap-md-4">
                <div class="">Autorisé – Ce service n’a déposé aucun cookie.<br>En savoir plus -></div>
                <div class="d-flex gap-4 radio-btn-cls">
                    <div>
                        <input class="cursor-pointer" type="radio" name="autoriser_interdire_telegram" id="autoriser_telegram" value="autoriser">
                        <label class="cursor-pointer" for="autoriser_telegram">Autoriser</label>
                    </div>
                    <div>
                        <input type="radio" name="autoriser_interdire_telegram" id="interdire_telegram" value="interdire">
                        <label for="interdire_telegram">Interdire</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- VIDEOS SECTION -->
    <div class="popup-heading">VIDéOS</div>

    <!-- YOUTUBE -->
    <div class="px-3 py-2 px-md-4 py-md-3">
        <h3 class="mb-2 mb-md-3">YouTube</h3>
        <div class="">
            <div class="option-outer d-flex flex-column flex-md-column flex-lg-row justify-content-between gap-2 gap-md-4">
                <div class="">Autorisé – Ce service n’a déposé aucun cookie.<br>En savoir plus -></div>
                <div class="d-flex gap-4 radio-btn-cls">
                    <div>
                        <input class="cursor-pointer" type="radio" name="autoriser_interdire_youtube" id="autoriser_youtube" value="autoriser">
                        <label class="cursor-pointer" for="autoriser_youtube">Autoriser</label>
                    </div>
                    <div>
                        <input type="radio" name="autoriser_interdire_youtube" id="interdire_youtube" value="interdire">
                        <label for="interdire_youtube">Interdire</label>
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
        align-items: center;
    }
    .cookie-btn.active {
        color: #fff;
        background-color: #E10B17;
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const cookieButton = document.querySelector('.cookie-btn');
    const modal = document.getElementById('cookieModal');
    const modalCloseButton = document.querySelector('.btnclose');
    // Add active class when the button is clicked
    cookieButton.addEventListener('click', function() {
        cookieButton.classList.add('active');
    });
    // Remove active class when the modal is closed
    modal.addEventListener('hidden.bs.modal', function () {
        cookieButton.classList.remove('active');
    });
    // Also remove active class if the modal close button is clicked
    modalCloseButton.addEventListener('click', function () {
        cookieButton.classList.remove('active');
    });
});
</script>
