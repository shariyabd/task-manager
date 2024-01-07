@include('backend.includes.head')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow p-5 text-center">
                <h1>Reset Password Mail</h1>
               <p> Please Reset your password with bellow link:</p>
                <a href="{{route('user.password.reset', $token)}}" class="btn btn-dark mt-2">Reset Password</a>
            </div>
        </div>
    </div>
</div>
@include('backend.includes.script')