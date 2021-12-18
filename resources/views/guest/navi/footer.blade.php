<footer class="mt-4 p-2">
    <div class="container">
        <div class="row no-gutters m-0 p-0">
            <!--Contact-->
            <div class="col-md-3 mt-2 ">
                <p class="m-0 mb-2 font-weight-bold text-white">Contact</p>
                <a href="tel:09799990088" class="text-white">09799990088</a><br>
                <a href="mailto:aungshine194@gmail.com" class="mt-3 text-white">mmcovid@gmial.com</a><br>
                <a href="" class="text-white">Yangon</a><br>
            </div>
            <!--About-->
            <div class="col-md-4 text-info ">
                <p class="m-0 mb-2 text-white">About</p>
                <p class="p-2 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
            </div>
            <!--Navigation-->
            <div class="col-md-3 ">
                <p class="m-0 mb-2 text-white">Navigation</p>
                <a href="{{ url('/') }}" class="text-white">Home</a><br>
                <a href="{{ url('situation') }} " class="text-white" >Situation</a><br>
                <a href="{{ url('about') }} " class="text-white" >About</a><br>
                <a href="{{ url('news')  }}" class="text-white">News</a><br>
                <a href="{{ route('knowledge.index')}}" class="text-white">Knowledge</a><br>
                <a href="{{ url('feedback') }}" class="text-white">Feedback</a>
            </div>
            <!--Social Links-->
            <div class="col-md-2 text-info mt-2 ">
                <p class="m-0 mb-2 text-white">Social</p>
                <a class="text-white" href="#">Facebook</a><br>
                <a class="text-white" href="#">Youtube</a><br>
                <a class="text-white" href="#">Twitter</a><br>
            </div>

        </div>
        <div class="text-white">
            Copyright © Mmcovid . All Rights Reserved <br>
            <a href="https://facebook.com/1011AlanWalker" target="_blank">Contact Developer</a>
        </div>
    </div>
</footer>