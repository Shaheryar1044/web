
<style>

    .wrap {
        display: flex;
        justify-content: end;
        position: relative;
        top: 71px;
    }

    .stepper {
        margin-top: 0px;
        margin-left: 0px;
        width: 30px;
        height: 30px;
        background: #1B4251;
        cursor: pointer;
        width: 48px;
        height: 52px;
        border-radius: 6;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-size: 24px;
        position: relative;
        box-shadow: -1px 57px 80px -17px rgba(255, 73, 87, 0.25);
        overflow: hidden;
        z-index: 2;

        span {
            user-select: none;
            position: absolute;
            top: 28px;
            left: 50%;
            transform: translateY(0) translateX(-50%);

            &.active {
                transform: translateY(0) translateX(-50%);
            }

            &.hide {
                opacity: 0;
            }
        }
    }

    .arrow-top {
        position: relative;
        top: -51px;
        left: -23px;
        transform: translateX(-50%);
        user-select: none;
        width: 50px;
    }

    .arrow-bottom {
        position: relative;
        bottom: -45px;
        left: -44px;
        transform: translateX(-50%);
        user-select: none;
    }

    .github {
        width: 40px;
        height: 40px;
        background: url(http://alikinvv.github.io/github.svg) no-repeat center;
        position: fixed;
        bottom: 40px;
        right: 40px;
        animation: github 3s cubic-bezier(0.68, -0.55, 0.27, 1.55) 0s infinite;
    }

    @keyframes github {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.2);
        }
        100% {
            transform: scale(1);
        }
    }

    .desc {
          position: absolute;
        top: 40px;
        left: 40px;
        color: #ffbac1;
    }
    #add1{

                position: absolute;
                bottom: 134px;
                left: 92px;
                height: 19px;
                display: flex;
                border: 0px;
                align-items: center;
                background: transparent;
    }

    #sub1{

            position: absolute;
            border: 0px;
            bottom: 63px;
        left: 92px;
            height: 19px;
            display: flex;
            align-items: center;
            background: transparent;
    }

    #add2{

            position: absolute;
            bottom: 136px;
            left: 147px;
            height: 19px;
            display: flex;
            border: 0px;
            align-items: center;
            background: transparent;
    }

    #sub2{

            position: absolute;
            border: 0px;
            bottom: 62px;
        left: 146px;
            height: 19px;
            display: flex;
            align-items: center;
            background: transparent;
    }


    #add3{

            position: absolute;
            bottom: 135px;
            left: 201px;
            height: 19px;
            display: flex;
            border: 0px;
            align-items: center;
            background: transparent;
    }


    #sub3{

            position: absolute;
            border: 0px;
            bottom: 63px;
            left: 201px;
            height: 19px;
            display: flex;
            align-items: center;
            background: transparent;
    }


    #value1{
        text-align: center;
        border: 0px;
        background: transparent;
        width: 28px;
        z-index: 9999;
        position: absolute;
        left: 88px;
        font-size: 13px;
    }

    #value2{
        text-align: center;
        border: 0px;
        background: transparent;
        width: 28px;
        z-index: 9999;
        font-size: 14px;
        position: absolute;
        left: 144px;
    }

    #add1:focus{
        outline: transparent !important;
    }

    #sub1:focus{
        outline: transparent !important;
    }

    #sub2:focus{
        outline: transparent !important;
    }

    #sub3:focus{
        outline: transparent !important;
    }

    #add3:focus{
        outline: transparent !important;
    }

    #add2:focus{
        outline: transparent !important;
    }
    #value1:focus{
        outline: transparent !important;
    }
    #value2:focus{
        outline: transparent !important;
    }
    #value3:focus{
        outline: transparent !important;
    }
    #value3{
        border: 0px;
        background: transparent;
        width: 28px;
        text-align: center;
        z-index: 9999;
        font-size: 14px;
        position: absolute;
        left: 198px;
    }

    #submitChallenge{
        width: 160px;
        font-weight: 500;
        color: #fff;
        cursor: pointer;
        position: absolute;
        bottom: 1.4rem;
        left: 8rem;
        border-radius: 0px;
    }
    .add, .sub{
        color:#e74218;
        font-weight:800;
        font-size:20px;
        transform:rotate(90deg);
        z-index:auto;
    }
    </style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.js"></script>
<div class="wrap">
    <div class="customBox">
    <img src="{{asset('public/images/loader.png')}}" style="    width: 160px;
    position: absolute;
    bottom: 48px;
    left:80px;
    " class="customSecondImage"/>
    <div class="div1">

            <button type="button" id="add1" class="add">&lt;</button>
            <input type="text" id="value1"
            maxlength="1"
            value=""
            />
        <button type="button" id="sub1" class="sub">&gt;</button>

    </div>
    <div class="div2">
        <button type="button" id="add2" class="add">&lt;</button>
        <input type="text" id="value2"
        maxlength="1"
            value=""
        />
        <button type="button" id="sub2" class="sub">&gt;</button>
    </div>
    <div class="div3">
        <button type="button" id="add3" class="add">&lt;</button>
        <input type="text" id="value3"
        maxlength="1"
        value=""
        />
        <button type="button" id="sub3" class="sub">&gt;</button>
    </div>
</div>
<input type="submit"  id="submitChallenge"  class="btn btn-danger" style="" value="{{__('common.text24')}}">

 </div>
