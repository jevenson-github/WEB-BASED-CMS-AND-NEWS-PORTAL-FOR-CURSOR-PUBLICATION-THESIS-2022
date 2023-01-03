<div class="h-16 bg-amber-500"></div>

<div class="w-full py-8 bg-amber-500">
    <div class="block w-full max-w-screen-xl mx-auto">

        <div class="w-full px-8 mx-auto">
            <h5 class="mb-2 font-semibold tracking-widest text-amber-100"><?= strtoupper($section) ?></h5>
            <h1 class="max-w-screen-lg text-4xl font-bold text-white md:text-5xl"><?= $title ?></h1>
            <div class="flex flex-col justify-between mt-4 md:flex-row">
                <div class="flex flex-row gap-x-3">
                    <div>
                        <img src="./../../resources/uploads/editorial-board/<?= ($image) ?>" class="w-10 h-10 rounded-full"></img>
                    </div>
                    <div>
                        <h5 class="text-sm font-medium text-gray-200"><a href="" class="font-semibold text-amber-50"><?= $author ?></a></h5>
                        <h5 class="mt-0.5 text-sm text-gray-100"><?= date("F j Y", strtotime($timestamp)) ?> at <?= date("g:i A", strtotime($timestamp)) ?></h5>
                    </div>
                </div>
                <div class="flex flex-row mt-4 md:mt-0 gap-x-2">
                    <button id="btn_shareFB" type="button" class="items-center w-10 h-10 p-1 transition bg-gray-100 border border-transparent rounded-full text-amber-600 hover:bg-amber-600 hover:text-white">
                        <svg width="30" height="30" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="m18.393 16.258.355-2.335H16.53v-1.515c0-.639.31-1.262 1.303-1.262h1.01V9.158S17.926 9 17.051 9c-1.827 0-3.021 1.118-3.021 3.143v1.78H12v2.335h2.031v5.644a7.944 7.944 0 0 0 2.499 0v-5.644h1.863Z"></path>
                        </svg>
                    </button>
                    <button id="btn_shareTW" type="button" class="items-center w-10 h-10 p-1 transition bg-gray-100 border border-transparent rounded-full text-amber-600 hover:bg-amber-600 hover:text-white">
                        <svg width="30" height="30" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.608 13.49c.008.108.008.216.008.326 0 3.336-2.44 7.184-6.9 7.184v-.002A6.667 6.667 0 0 1 10 19.866c.192.024.384.036.577.037a4.747 4.747 0 0 0 3.011-1.083c-1.037-.02-1.947-.725-2.265-1.754.364.073.738.058 1.095-.043-1.131-.238-1.945-1.273-1.945-2.475v-.032c.337.195.714.304 1.1.316-1.065-.742-1.393-2.218-.75-3.371 1.231 1.577 3.047 2.536 4.997 2.637a2.594 2.594 0 0 1 .701-2.412 2.36 2.36 0 0 1 3.431.11 4.75 4.75 0 0 0 1.54-.613 2.518 2.518 0 0 1-1.066 1.396c.48-.059.95-.193 1.392-.397-.325.508-.735.95-1.21 1.307Z"></path>
                        </svg>
                    </button>
                    <button id="btn_shareCL" type="button" class="items-center w-10 h-10 p-1 transition bg-gray-100 border border-transparent rounded-full text-amber-600 hover:bg-amber-600 hover:text-white">
                        <svg width="30" height="30" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.187 21.112a3.044 3.044 0 0 1-4.299 0 3.044 3.044 0 0 1 0-4.299l2.388-2.388a3.044 3.044 0 0 1 4.299 0 .507.507 0 1 1-.717.717c-.8-.8-2.065-.8-2.865 0l-2.388 2.388c-.8.8-.8 2.065 0 2.865.8.8 2.065.8 2.865 0l2.269-2.268a.507.507 0 1 1 .716.716l-2.268 2.269Zm4.537-4.537a3.044 3.044 0 0 1-4.299 0 .506.506 0 1 1 .717-.717c.8.8 2.065.8 2.865 0l2.388-2.388c.8-.8.8-2.065 0-2.865-.8-.8-2.065-.8-2.865 0l-2.269 2.268a.507.507 0 1 1-.716-.716l2.268-2.269a3.044 3.044 0 0 1 4.299 0 3.044 3.044 0 0 1 0 4.299l-2.388 2.388Z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>


        <div class="flex flex-col-reverse gap-8 px-8 mt-8 xl:flex-row">
            <article class="prose prose-lead:text-white prose-lead:font-medium h-fit max-w-prose prose-lead:text-2xl md:prose-lead:3xl prose-lead:leading-snug">
                <h2 class="lead"><?= $leadText ?></h2>
            </article>
            <div class="flex flex-col w-full max-w-screen-xl">
                <div class="block w-full bg-center bg-cover rounded-lg h-60 sm:h-64 md:h-72 lg:h-80 xl:h-full " style="background-image: url('./../../resources/uploads/contents/<?= ($leadVisual) ?>');">

                </div>
            </div>
        </div>

    </div>
</div>