<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="display-4 pt-5">
                    {{__('ui.login')}}
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center height-custom">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{route('login')}}" class="shadow rounded-2 p-5">
                    @csrf
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">{{__('ui.emailAddress')}}</label>
                        <input type="email" class="form-control" id="loginEmail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{__('ui.password')}}</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark">{{__('ui.login')}}</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <img src="/img/image_1.jpg" alt="fashion style girl" class="login-girls-img img-fluid">
            </div>
        </div>
    </div>    
</x-layout>