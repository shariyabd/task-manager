@include('backend.includes.head')

<body class="nk-body bg-white npc-default pg-error">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle wide-xs mx-auto">
                        <div class="nk-block-content nk-error-ld text-center">
                            <h1 class="nk-error-head">403</h1>
                            <h3 class="nk-error-title">Oops! Unauthorized User</h3>
                            <p class="nk-error-text">We are very sorry for inconvenience. It looks like you’re try to access a page that you don't have permission to visit.</p>
                            <a href="{{route('login.form')}}" class="btn btn-lg btn-primary mt-2">Back To Home</a>
                        </div>
                    </div><!-- .nk-block -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
@include('backend.includes.script')