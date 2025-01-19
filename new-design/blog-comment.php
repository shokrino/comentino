<?php
defined('ABSPATH') || exit;

function comentino_show_blog_comment()
{

?>
<style>
    /* ------------------------------- first style ------------------------------ */
    .comentino-user {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
    gap: 20px;
}

img.comentino-avatar {
    display: block;
    vertical-align: middle;
    height: auto;
    max-width: 100%;
    border-radius: 30%;
    aspect-ratio: 1;
}

.comentino-user>div {
    display: flex;
    flex-direction: column;
    width: 100%;
}

p.comentino-user-name {
    margin: 0;
}

.comentino-user {
    margin: 0;
    display: flex;
}

.comentino-info {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.comentino-reply-section {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 5px;
}

span.comentino-reply svg {
    width: 25px;
}

span.comentino-reply {
    display: flex;
    justify-content: center;
    align-items: center;
}
.comentino-comment-body {
    padding: 30px;
    background-color: #dbdbdb;
    border-radius: 35px;
}

.comentino-replies-user {
    margin-top: 20px;
    padding: 20px;
    background-color: white;
    border-radius: 30px;
}
</style>

<div class="comentino-main">

<!-- بصورت حلقه کامنت هارا بگیرد  -->
    <div class="comentino-comment-body">


        <!-- کامنت کاربر بگیرد-->
        <div class="comentino-user">

            <!--  سورس تصویر از گراواتار کاربر-->
            <img loading="lazy" src="http://localhost/nias/wp-content/uploads/2023/07/Elementor-Logo-Symbol-Red.webp" width="70" class="comentino-avatar">

            <div>
                <div>

                    <!-- نمایش نام کاربر-->
                    <p class="comentino-user-name">متین</p>

                </div>

                    <!--نمایش کامنت کاربر -->
                    <p class="comentino-user-comment">خدا قوت. مفید و کاربردی بود
تشکر</p>

            </div>
        </div>

        <div class="comentino-info">

            <span class="comentino-date">10 آذر 1403</span>

            <div class="comentino-reply-section">

                <!-- نمایش متن در صورتی که پاسخی وجود داشته باشد-->
                <span class="comentino-toggle-reply"> پنهان کردن پاسخ ها </span>
                <span class="comentino-divider"></span>
                <span class="comentino-reply">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 15" fill="" stroke="" class="">
                        <path d="M8.84936 3.95857V4.58397H9.47476C15.6094 4.58397 18.8461 8.58265 20.5001 11.9613C20.5177 11.9973 20.5212 12.0176 20.5214 12.0265C20.5181 12.0321 20.5036 12.0537 20.459 12.078C20.3379 12.1439 20.1445 12.1477 19.9931 12.0289C17.1536 9.801 13.6779 9.55396 9.47476 9.55396H8.84936V10.1794V13.8295C8.84936 13.9956 8.65537 14.086 8.52822 13.9792L1.21881 7.83926L0.8315 8.30035L1.21881 7.83926C1.1279 7.7629 1.12552 7.62378 1.21377 7.54435L8.52318 0.965879C8.64895 0.852688 8.84936 0.941942 8.84936 1.11115V3.95857ZM20.5208 12.0319C20.5205 12.032 20.5204 12.0303 20.5214 12.0272C20.5214 12.0303 20.521 12.0318 20.5208 12.0319Z" stroke-width="1.2508"></path>
                    </svg>
                </span>
            </div>
        </div>

        <div class="comentino-replies-user">
            <!--  کامنت پاسخ هارا بگیرد-->

            <div class="comentino-user">

                <!--  سورس تصویر از گراواتار کاربر-->
                <img loading="lazy" src="http://localhost/nias/wp-content/uploads/2023/07/Elementor-Logo-Symbol-Red.webp" width="70" class="comentino-avatar">

                <div>
                    <div>

                        <!-- نمایش نام کاربر-->
                        <p class="comentino-user-name">متین</p>

                    </div>

        <!--نمایش کامنت کاربر -->
        <p class="comentino-user-comment">خواهش میکنم</p>

                </div>
            </div>

            <div class="comentino-info">

<span class="comentino-date">10 آذر 1403</span>

<div class="comentino-reply-section">

    <!-- نمایش متن در صورتی که پاسخی وجود داشته باشد-->
    <span class="comentino-toggle-reply"> پنهان کردن پاسخ ها </span>
    <span class="comentino-divider"></span>
    <span class="comentino-reply">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 15" fill="" stroke="" class="">
            <path d="M8.84936 3.95857V4.58397H9.47476C15.6094 4.58397 18.8461 8.58265 20.5001 11.9613C20.5177 11.9973 20.5212 12.0176 20.5214 12.0265C20.5181 12.0321 20.5036 12.0537 20.459 12.078C20.3379 12.1439 20.1445 12.1477 19.9931 12.0289C17.1536 9.801 13.6779 9.55396 9.47476 9.55396H8.84936V10.1794V13.8295C8.84936 13.9956 8.65537 14.086 8.52822 13.9792L1.21881 7.83926L0.8315 8.30035L1.21881 7.83926C1.1279 7.7629 1.12552 7.62378 1.21377 7.54435L8.52318 0.965879C8.64895 0.852688 8.84936 0.941942 8.84936 1.11115V3.95857ZM20.5208 12.0319C20.5205 12.032 20.5204 12.0303 20.5214 12.0272C20.5214 12.0303 20.521 12.0318 20.5208 12.0319Z" stroke-width="1.2508"></path>
        </svg>
    </span>
</div>
</div>

        </div>
    </div>

    </div>






<?php

}


add_shortcode('comentino_show_blog_comment_shortcode', 'comentino_show_blog_comment');