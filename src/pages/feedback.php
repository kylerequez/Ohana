<!DOCTYPE html>
<html lang="en">

<head>
    <title> ORDER SUMMARY </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
    <link rel="stylesheet" href="/Ohana/src/css/pawcart.css">
    <?php include_once 'stylesheets.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

        .card {
            border-style: solid;
            border-color: #db6551;
            border-width: 2px;
            width: 420px;
            display: flex;
            align-items: center;
            padding: 30px;
            margin-left: auto;
            margin-right: auto;
        }

        #welcome {
            margin-top: 10%;
            color: #db6551;
            font-family: 'Acme', sans-serif;
            font-weight: 800;
            font-size: 80px;
        }

        #tell {
            font-size: 20px;
            color: black;
            font-style: oblique;
        }

        #comment {
            font-size: 20px;
            color: black;
        }

        #feedback {
            margin-bottom: 20px;
            height: 150px;
            width: 340px;
        }

        #ohanafooter {
            margin-top: 10%;
        }

        #full-stars-example {
            /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
            /* make hover effect work properly in IE */
            /* hide radio inputs */
            /* set icon padding and size */
            /* set default star color */
            /* set color of none icon when unchecked */
            /* if none icon is checked, make it red */
            /* if any input is checked, make its following siblings grey */
            /* make all stars orange on rating group hover */
            /* make hovered input's following siblings grey on hover */
            /* make none icon grey on rating group hover */
            /* make none icon red on hover */
        }

        #full-stars-example .rating-group {
            display: inline-flex;
        }

        #full-stars-example .rating__icon {
            pointer-events: none;
        }

        #full-stars-example .rating__input {
            position: absolute !important;
            left: -9999px !important;
        }

        #full-stars-example .rating__label {
            cursor: pointer;
            padding: 0 0.1em;
            font-size: 2rem;
        }

        #full-stars-example .rating__icon--star {
            color: orange;
        }

        #full-stars-example .rating__icon--none {
            color: #eee;
        }

        #full-stars-example .rating__input--none:checked+.rating__label .rating__icon--none {
            color: red;
        }

        #full-stars-example .rating__input:checked~.rating__label .rating__icon--star {
            color: #ddd;
        }

        #full-stars-example .rating-group:hover .rating__label .rating__icon--star {
            color: orange;
        }

        #full-stars-example .rating__input:hover~.rating__label .rating__icon--star {
            color: #ddd;
        }

        #full-stars-example .rating-group:hover .rating__input--none:not(:hover)+.rating__label .rating__icon--none {
            color: #eee;
        }

        #full-stars-example .rating__input--none:hover+.rating__label .rating__icon--none {
            color: red;
        }

        #half-stars-example {
            /* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
            /* make hover effect work properly in IE */
            /* hide radio inputs */
            /* set icon padding and size */
            /* add padding and positioning to half star labels */
            /* set default star color */
            /* set color of none icon when unchecked */
            /* if none icon is checked, make it red */
            /* if any input is checked, make its following siblings grey */
            /* make all stars orange on rating group hover */
            /* make hovered input's following siblings grey on hover */
            /* make none icon grey on rating group hover */
            /* make none icon red on hover */
        }

        #half-stars-example .rating-group {
            display: inline-flex;
        }

        #half-stars-example .rating__icon {
            pointer-events: none;
        }

        #half-stars-example .rating__input {
            position: absolute !important;
            left: -9999px !important;
        }

        #half-stars-example .rating__label {
            cursor: pointer;
            /* if you change the left/right padding, update the margin-right property of .rating__label--half as well. */
            padding: 0 0.1em;
            font-size: 2rem;
        }

        #half-stars-example .rating__label--half {
            padding-right: 0;
            margin-right: -0.6em;
            z-index: 2;
        }

        #half-stars-example .rating__icon--star {
            color: orange;
        }

        #half-stars-example .rating__icon--none {
            color: #eee;
        }

        #half-stars-example .rating__input--none:checked+.rating__label .rating__icon--none {
            color: red;
        }

        #half-stars-example .rating__input:checked~.rating__label .rating__icon--star {
            color: #ddd;
        }

        #half-stars-example .rating-group:hover .rating__label .rating__icon--star,
        #half-stars-example .rating-group:hover .rating__label--half .rating__icon--star {
            color: orange;
        }

        #half-stars-example .rating__input:hover~.rating__label .rating__icon--star,
        #half-stars-example .rating__input:hover~.rating__label--half .rating__icon--star {
            color: #ddd;
        }

        #half-stars-example .rating-group:hover .rating__input--none:not(:hover)+.rating__label .rating__icon--none {
            color: #eee;
        }

        #half-stars-example .rating__input--none:hover+.rating__label .rating__icon--none {
            color: red;
        }

        #full-stars-example-two {
            display: inline-flex;
            /* make hover effect work properly in IE */
            /* hide radio inputs */
            /* hide 'none' input from screenreaders */
            /* set icon padding and size */
            /* set default star color */
            /* if any input is checked, make its following siblings grey */
            /* make all stars orange on rating group hover */
            /* make hovered input's following siblings grey on hover */
        }

        #full-stars-example-two .rating-group {
            display: inline-flex;
        }

        #full-stars-example-two .rating__icon {
            pointer-events: none;
        }

        #full-stars-example-two .rating__input {
            position: absolute !important;
            left: -9999px !important;
        }

        #full-stars-example-two .rating__input--none {
            display: none;
        }

        #full-stars-example-two .rating__label {
            cursor: pointer;
            padding: 0 0.1em;
            font-size: 2rem;
        }

        #full-stars-example-two .rating__icon--star {
            color: orange;
        }

        #full-stars-example-two .rating__input:checked~.rating__label .rating__icon--star {
            color: #ddd;
        }

        #full-stars-example-two .rating-group:hover .rating__label .rating__icon--star {
            color: orange;
        }

        #full-stars-example-two .rating__input:hover~.rating__label .rating__icon--star {
            color: #ddd;
        }

        @media (max-width: 1280px) {
            #welcome {
                margin-top: 20%;
            }
        }

        @media (max-width: 1090px) {
            #welcome {
                margin-top: 25%;
            }
        }

        @media (max-width: 1090px) {
            #welcome {
                margin-top: 35%;
                font-size: 40px;
            }
        }

        @media screen and (min-width: 1100px) and (max-width: 1366px) {}
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <?php include_once 'navigationbar.php'; ?>
    <main>
        <div class="container-fluid">
            <center>
                <h1 class="text-center" id="welcome"> Tell us your experience! </h1>
                <form class="mt-5" id="feedbackform" method="POST" action="/feedback/add">
                    <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">
                    <div class="card text-center">
                        <p class="fs-4">Rating</p>
                        <div id="full-stars-example-two">
                            <div class="rating-group my-2">
                                <input disabled checked class="rating__input rating__input--none" name="rating" id="rating-none" value="0" type="radio" />
                                <label aria-label="1 star" class="rating__label" for="rating-1"> <i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating-1" value="1" type="radio" />
                                <label aria-label="2 stars" class="rating__label" for="rating-2"> <i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating-2" value="2" type="radio" />
                                <label aria-label="3 stars" class="rating__label" for="rating-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating-3" value="3" type="radio" />
                                <label aria-label="4 stars" class="rating__label" for="rating-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating-4" value="4" type="radio" />
                                <label aria-label="5 stars" class="rating__label" for="rating-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating-5" value="5" type="radio" />
                            </div>
                        </div>
                        <h2 class="my-3" id="comment">Comments and suggestion</h2>
                        <textarea id="feedback" name="message" rows="4" cols="50"></textarea>
                        <div class="d-flex justify-content-end">
                            <?php if (str_contains($_SERVER['HTTP_REFERER'], 'set-appointment')) { ?>
                                <a href="/transactions"><button class="btn btn-outline-dark mx-2" type="button">Skip</button></a>
                            <?php } ?>
                            <button class="btn mx-2" style="background-color: #c0b65a; color: #ffffff" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </center>
        </div>
    </main>

    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>